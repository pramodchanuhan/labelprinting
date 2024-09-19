<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyInfo;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\EmployeesInfo;
use App\Models\User;
use App\Models\Consent_form;
use App\Models\Policyacknowledgementform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function profile(Request $request)
    {
        // \DB::enableQueryLog();
        $emp = null;
        if (auth()->user()->hasRole('hr manager') && $request->emp_id) {
            $emp_id = $request->emp_id;
            $emp = Employee::find($emp_id);
        } else {
            $emp = auth()->user()->employee;
        }

        $emp_info = $emp->join('employees_info as emp_info', 'employees.id', 'emp_info.employee_id')
            ->select('employees.*', 'emp_info.id as emp_info_id', 'emp_info.*', 'employees.id as id')
            ->where('employee_id', $emp->id)
            ->first();


        if($emp_info==null){
            $emp_info=new EmployeesInfo;
        }

        $employees = Employee::get();
        $Department = Department::get();
        $Designation = Designation::get();

        $CompanyInfo = CompanyInfo::find(1);
        $employment_status = json_decode($CompanyInfo->employment_status);

        // dd($request->user()->employee,$emp_info,\DB::getQueryLog());
        return view('profile', compact('emp', 'emp_info', 'employees', "Department", "Designation", 'employment_status'));
    }

    public function profile_info_update(Request $request, EmployeesInfo $emp_info)
    {
        // dd($request->all());
        $employee = $emp_info->employee;
        $user = $employee->user;
        if (isset($request->f_name))
            $request['name'] = "$request->f_name $request->l_name";

        $userFormfields = $request->validate([
            'name' => 'string|max:255',
        ]);

        if ($request->email) {
            $userFormfields += $request->validate([
                'email' => 'string|lowercase|email|max:255|unique:' . User::class,
            ]);
        }

        $employeeFormfields = $request->validate([
            'f_name' => 'string|max:255',
            'l_name' => 'string|max:255',
            'mobile_no' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            // 'company_id'=> 'integer',
            'department_id' => 'numeric',
            'designation_id' => 'numeric',
            'reports_to' => 'numeric',
            'employment_status' => 'numeric',
        ]);

        $employeeFormfields['status'] = $request->status ?? 0;

        // dd($employeeFormfields);
        if ($request->username) {
            $employeeFormfields += $request->validate([
                'username' => 'string|max:255|unique:employees',
            ]);
        }

        $emp_infoFormfields = $request->validate([
            "dob" => "date",
            "mobile_no" => "regex:/^([0-9\s\-\+\(\)]*)$/|min:10",
            "personal_email" => "string|email|max:255",
            "gender" => "string|max:50",
        ]);

        if ($request->has('profile_pic')) {

            $emp_infoFormfields['profile_pic'] = $request->profile_pic->store('profile-pics', 'public');

            $destination = $emp_info->profile_pic;
            if ($destination && Storage::disk('public')->exists($destination)) {
                Storage::disk('public')->delete($destination);
            }
        }


        // The l name field is required. The joining date field must be a valid date. The mobile no field must not be greater than 12.


        // dd($employeeFormfields,$userFormfields,$emp_info,$user,$employee);
        $user->update($userFormfields);
        $employee->update($employeeFormfields);
        $emp_info->update($emp_infoFormfields);

        if ($request->designation_id) {
            $designation = Designation::find($request->designation_id);
            $role = strtolower($designation->name);
            $user->syncRoles(['employee', $role]);
        }

        return back()->with('success', ' Record has been updated successfully !');
    }

    public function my_letters_update(Request $request, EmployeesInfo $id)
    {
        // dd($request->all(), $id,$id->employee,$request->appointment_letter,Storage::disk('public')->exists($id->appointment_letter));
        // dd($request->appointment_letter->store('employee-letters','public'),Storage::disk('public')->put('employee-letters', $request->offer_letter));
        $formfields = [];

        if ($request->has('offer_letter')) {
            $filename = $request->offer_letter->getClientOriginalName();
            $filename = 'employee-letters/' . time() . $filename;
            // $request->offer_letter->move(storage_path('app/public/employee-letters/'),$filename);
            $request->offer_letter->storeAs('public/', $filename); // public/ is path here not disk name and if $filename contains images/ then it will store inside images folder
            // Storage::disk('public')->put($filename, $request->offer_letter); // it will create folder name as $filename but not file , filename act as filepath , returns new path as well
            // $formFields['offer_letter'] = $request->offer_letter->store($filename,'public'); // work same as above

            $formfields['offer_letter'] = $filename;

            $destination = $id->offer_letter;
            if ($destination && Storage::disk('public')->exists($destination)) {
                Storage::disk('public')->delete($destination);
            }
        }

        if ($request->has('appointment_letter')) {

            $formfields['appointment_letter'] = $request->appointment_letter->store('employee-letters', 'public');

            $destination = $id->appointment_letter;
            if ($destination && Storage::disk('public')->exists($destination)) {
                Storage::disk('public')->delete($destination);
            }
        }

        $id->update($formfields);
        return back()->with('success', 'Record updated succesfully');
    }

    public function education_info_update(Request $request, EmployeesInfo $emp_info){
        // dd($request->all(),count($request->degree),$emp_info->qualification_details,count($emp_info->qualification_details));
        $current_qualification_details=$emp_info->qualification_details;

        $qualification_details=[];
        for ($i=0; $i < count($request->degree ?? []) ; $i++) {
            $qualification_detail['university'] = $request->university[$i];
            $qualification_detail['degree'] = $request->degree[$i];
            $qualification_detail['specialization'] = $request->specialization[$i];
            $qualification_detail['percentage'] = $request->percentage[$i];
            $qualification_detail['degree_from'] = $request->degree_from[$i];
            $qualification_detail['degree_to'] = $request->degree_to[$i];

            // $qualification_detail['upload_certificate']='';
            $qualification_detail['upload_certificate']=$current_qualification_details[$i]['upload_certificate'] ?? '';
            if($request->upload_certificate && isset($request->upload_certificate[$i])){
                $qualification_detail['upload_certificate'] = $request->upload_certificate[$i]->store('qualification-certificate','public');

                // to remove all related documents first
                $destination=$current_qualification_details[$i]['upload_certificate'] ?? '';
                if($destination && Storage::disk('public')->exists($destination)) {
                    Storage::disk('public')->delete($destination);
                }
            }

            $qualification_details[$i] = $qualification_detail;
        }

        $emp_info->update(['qualification_details'=>$qualification_details]);

        return back()->with('success','Record updated succesfully');

    }


    public function experience_info_update(Request $request, EmployeesInfo $emp_info){
        // dd($request->all(),count($request->organization_name),$emp_info->last_organization_details);
        $current_last_organization_details=$emp_info->last_organization_details;

        $last_organization_details=[];
        for ($i=0; $i < count($request->organization_name) ; $i++) {
            $last_organization_detail['organization_name'] = $request->organization_name[$i];
            $last_organization_detail['p_o_designation'] = $request->p_o_designation[$i];
            $last_organization_detail['organization_doj'] = $request->organization_doj[$i];
            $last_organization_detail['reliving_date'] = $request->reliving_date[$i];
            $last_organization_detail['p_o_location'] = $request->p_o_location[$i];

            $last_organization_detail['reason_of_leaving'] = $current_last_organization_details[$i]['reason_of_leaving'] ?? '';
            $last_organization_detail['reporting_manager_name'] = $current_last_organization_details[$i]['reporting_manager_name'] ?? '';
            $last_organization_detail['reporting_manager_no'] = $current_last_organization_details[$i]['reporting_manager_no'] ?? '';
            $last_organization_detail['reporting_manager_email'] = $current_last_organization_details[$i]['reporting_manager_email'] ?? '';
            $last_organization_detail['p_o_hr_name'] = $current_last_organization_details[$i]['p_o_hr_name'] ?? '';
            $last_organization_detail['reporting_hr_no'] = $current_last_organization_details[$i]['reporting_hr_no'] ?? '';
            $last_organization_detail['reporting_hr_email'] = $current_last_organization_details[$i]['reporting_hr_email'] ?? '';

            $last_organization_detail['upload_experience_letter'] = $current_last_organization_details[$i]['upload_experience_letter'] ?? '';

            $last_organization_details[$i] = $last_organization_detail;
        }

        $emp_info->update(['last_organization_details'=>$last_organization_details]);

        return back()->with('success','Record updated succesfully');

    }


    public function account_info_update(Request $request, EmployeesInfo $emp_info)
    {
        // dd($request->all());
        $employee = $emp_info->employee;
        $user = $employee->user;

        $emp_infoFormfields = $request->validate([
            "bank_name" => "string|max:50",
            "bank_acc_no" =>"string|max:50" ,
            "ifsc_code" => "string|max:50",
            "pan_number" => "string|max:50",
            "esic_no" => "string|max:50",
            "esic_nominee_name" => "string|max:50",
            "relation_nominee_name" => "string|max:50",
            "nominee_residing" => "string|max:50",
            "nominee_dob" => "date",
            "nominee_aadhar_no" => "string|max:50",
            "pf_number" => "string|max:50",
        ]);

        // if($request->has('profile_pic')){

        //     $emp_infoFormfields['profile_pic'] = $request->profile_pic->store('profile-pics','public');

        //     $destination=$emp_info->profile_pic;
        //     if($destination && Storage::disk('public')->exists($destination)) {
        //         Storage::disk('public')->delete($destination);
        //     }
        //}

        $emp_info->update($emp_infoFormfields);

        return back()->with('success', ' Record has been updated successfully !');
    }

    public function personal_info_update(Request $request, EmployeesInfo $emp_info)
    {
        // dd($request->all());
        $employeeFormfields=$request->validate([
            'permanent_address'=> 'required|string|max:255',
            'state'=> 'required|string|max:255',
            'city'=> 'required|string|max:255',
            'passport_number'=> 'required|string|max:255',
            'passport_valid_to'=> 'required|string|max:255',
            'nationality'=> 'required|string|max:255',
            // 'company_id'=> 'integer',
            'native_country'=> 'required|string|max:255',
            'religion'=> 'required|string|max:255',
            'marital_status'=> 'required|string|max:255',
        ]);
        // dd($emp_info);
        $emp_info->update($employeeFormfields);

        return back()->with('success',' Record has been updated successfully !');

    }

    public function emergency_info_update(Request $request, EmployeesInfo $emp_info){

        $emergencyFormfields = $request->validate([
            'relation_name' => '',
            'relation' => '',
            'relation_phone_no' => '',
            'relation_phone_no1' => '',

        ]);

         $emp_info->update($emergencyFormfields);
         return back()->with('success','Record updated succesfully');
    }
}
