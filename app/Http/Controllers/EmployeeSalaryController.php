<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Employee;
use App\Models\Employeesalary;
use App\Models\EmployeesInfo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class EmployeeSalaryController extends Controller
{

    public function salary_index(Request $request)
    {
        $employees = Employee::all();
        // $employeesalaries = Employeesalary::all();
        $employeesalaries = Employeesalary::join('employees','employees.id','employee_salary.employee_id')
        ->join('employees_info','employees_info.employee_id','employees.id');
        // ->select('employee_salary.*','employees_info.doj','employees_info.designation_id','employees.f_name','employees.l_name','employees.joining_date')->get();

        // $eligibeDate = Carbon::now()->subYear();
        // dd($eligibeDate);
        $eligibeDate = Carbon::now()->subMonths(11);

        if($request->filter == "eligible_for_appraisal"){
            $employeesalaries->where('employee_salary.appraisalDate', '<=', $eligibeDate);
        }
       $employeesalaries = $employeesalaries->select('employee_salary.*','employees.designation_id','employees.f_name','employees.l_name','employees.joining_date','employees_info.id as emp_info_id', 'employees_info.profile_pic')->get();

       $designation = Designation::pluck('name','id');

        // dd($employeesalaries);
        return view('salarydetails.salary',compact('employees','employeesalaries','designation'));
    }

    public function salary_store(Request $request)
    {
        $emp = Employee::find($request->employeeId);
        // dd($request->employeeId);
        $salaryStore = New Employeesalary;
        $salaryStore->employee_id = $request->employeeId;
        $salaryStore->grossSalary = $request->grossSalary;
        $salaryStore->providentfund = $request->providentfund;
        $salaryStore->esic = $request->esic;
        $salaryStore->professionaltax = $request->professionaltax;
        $salaryStore->deposit = $request->deposit;
        $salaryStore->netSalary= $request->netSalary;
        $salaryStore->appraisalDate= $emp->joining_date;
        // dd($salaryStore);
        $salaryStore->save();

        return redirect('salarydetails/salary')->with('success');
    }

    public function salary_update(Request $request, EmployeesInfo $employeeId)
    {
        // dd($request->all());
        // dd($request->employee_id);
        $emp_id = $request->employee_id;
        $salaryStore = Employeesalary::find($emp_id);
        // dd($salaryStore);
        $salaryStore->employee_id = $request->employeeId ;
        $salaryStore->grossSalary = $request->grossSalary;
        $salaryStore->providentfund = $request->providentfund;
        $salaryStore->esic = $request->esic;
        $salaryStore->professionaltax = $request->professionaltax;
        $salaryStore->deposit = $request->deposit;
        $salaryStore->netSalary= $request->netSalary;
        // $salaryStore->documents= $request->documents;
        $salaryStore->comment= $request->comment;
        if($request->documents){
             // to remove all related documents first
             $destination=$salaryStore->documents ?? '';
             if($destination && Storage::disk('public')->exists($destination)) {
                 Storage::disk('public')->delete($destination);
             }
            $salaryStore->documents = $request->documents->store('appraisal-documents','public');
        }
        if($request->ifAppraisal == 'Yes'){
            // $salaryStore->ifAppraisal= $request->ifAppraisal;
            $salaryStore->appraisalDate= Carbon::now()->format('Y-m-d');
        }
        $salaryStore->save();

        return redirect('salarydetails/salary')->with('success');
    }
}
