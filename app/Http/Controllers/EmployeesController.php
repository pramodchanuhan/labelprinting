<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Company;
use App\Models\CompanyInfo;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\EmployeesInfo;
use App\Models\EmployeesLeave;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;



use function Laravel\Prompts\password;

class EmployeesController extends Controller
{
    //
    public function employees()
    {
        // DB::enableQueryLog();


        $employees = Employee::with('employees_info')->get();
        $Company = Company::get();
        $employees_in_comp = DB::table('employees')
            ->select('company_id', DB::raw('count(*) as total'))->groupBy('company_id')->get();

        foreach ($employees_in_comp as $key => $value) {
            $acronym = Company::find($value->company_id)->acronym;
            $num = $value->total + 1;
            $len = strlen($num);
            for ($i = $len; $i < 4; $i++) {
                $num = '0' . $num;
            }
            $value->nxt_emp_id = "$acronym-$num";
        }

        // dd($employees,$employees_in_comp[0],DB::getQueryLog());
        $CompanyInfo = CompanyInfo::get();
        $Department = Department::get();
        $Designation = Designation::get();
        $User = User::select('users.id', 'users.name', 'users.l_name', 'users.username', 'users.email', 'users.mobile_no', 'roles.name as role_name')
        ->join('roles', 'users.role', '=', 'roles.id')
        ->get();
        // dd($CompanyInfo,$CompanyInfo[0]->designation,$Company,$Designation);
        return view('employees', compact('employees', 'employees_in_comp', 'Company', "Department", "Designation", 'User'));
    }

    public function empcreate()
    {
        $roles = DB::table('roles')->get();
        return view('empcreate', compact('roles'));
    }
    

    //    public function employees_store(Request $request){
    //         if(isset($request->f_name))
    //             $request['name']="$request->f_name $request->l_name" ;

    //         $userFormfields=$request->validate([
    //             'name' => 'required|string|max:255',
    //             'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
    //             'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //         ]);

    //         $employeeFormfields=$request->validate([
    //             'emp_id'=> 'required|string|max:15',
    //             'f_name'=> 'required|string|max:255',
    //             'l_name'=> 'required|string|max:255',
    //             'username'=> 'required|string|max:255|unique:employees',
    //             'joining_date'=> 'nullable|date',
    //             // 'joining_date'=> 'nullable',
    //             'mobile_no'=> 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
    //             // 'company_id'=> 'required|integer',
    //             // 'department_id'=> 'required|numeric',
    //             // 'designation_id'=> 'required|numeric',
    //             // 'reports_to'=> 'numeric',
    //         ]);


    //         // The l name field is required. The joining date field must be a valid date. The mobile no field must not be greater than 12.

    //         $user = User::create($userFormfields);

    //         event(new Registered($user));

    //         $employeeFormfields['user_id']=$user->id;

    //         $employee=Employee::create($employeeFormfields);
    //         // Attendance::create(['employee_id' => $employee->id]);
    //         EmployeesInfo::create(['employee_id' => $employee->id]);

    //         // $user->assignRole('employee');

    //         // $designation=Designation::find($request->designation_id);
    //         // $role=strtolower($designation->name);
    //         // $user->assignRole($role);

    //         return back()->with('success',' Employee has been created successfully !');

    //     }

    public function employees_store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([]);

        // Create a new instance of the User model
        $user = new User;
        $user->name = $request->name;
        $user->l_name = $request->l_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->mobile_no = $request->mobile_no;
        $user->password = bcrypt($request->password); // Hash the password
        $user->role = $request->role;

        // Save the user
        $user->save();

        // Redirect to the employees page with a success message
        return back()->with('success',' Employee has been created successfully !');
    }



    public function users()
    {
        return view('users');
    }
}
