<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanyInfo as ModelsCompanyInfo;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ModelsCompanyInfo::firstOrCreate(['id'=>1],[
            'company_name'=>["EXR Tech Solutions","Exelcior Research","ECS Consultancy Services"],
            'department'=>["IT","HR","Operations","Digital Marketing","Sales","Other"],
            'designation'=>[
                "Owner"=>"CEO",
                "HR"=>"HR",
                "HR"=>"HR Manager",
                "IT"=>"IT Manger",
                "IT"=>"Software Developer",
            ],
        ]);

        $company_name=["EXR Tech Solutions","Exelcior Research","ECS Consultancy Services"];
        $department=["HR","IT","Software Development","Operations","Digital Marketing","Sales","Other"];
        $designation=[
            "1"=>["HR Manager","HR"],
            "2"=>["IT Manager"],
            "3"=>["SD Manager","Tech Lead","Senior Software Developer","Software Developer"],
            "7"=>["CEO"],
        ];



        foreach ($company_name as $key => $value) {
            Company::firstOrCreate(['name'=>$value]);
        }

        foreach ($department as $key => $value) {
            Department::firstOrCreate(['name'=>$value]);
        }

        foreach ($designation as $key => $value) {
            foreach ($value as $v_key => $v_value) {
                Designation::firstOrCreate(['department_id'=>$key,'name'=>$v_value]);
            }
        }

    }
}
