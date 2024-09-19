<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EmployeesInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id' ,
        'employee_id',
        // 'emp_profile_img',
        'profile_pic',
        'full_name',
        'doj' ,
        'dob' ,
        'mobile_no',
        'gender',
        'permanent_address',
        'current_address',
        'current_address_document',
        'nationality',
        'state',
        'city',
        'religion',
        // 'email',
        'personal_email',
        'marital_status',
        'physically_challenged',
        'relation_name',
        'relation',
        'relation_phone_no' ,
        'relation_phone_no1' ,
        'aadhar_number' ,
        'aadhar_name',
        'upload_aadhar_card',
        'pan_number' ,
        'pan_name',
        'upload_pan_card',
        'qualification_details',
        'degree' ,
        'university' ,
        'degree_from' ,
        'degree_to' ,
        'percentage' ,
        'specialization' ,
        'candidate_type',
        'passport_number',
        'passport_valid_from',
        'passport_valid_to' ,
        'visa_number' ,
        'visa_valid_from' ,
        'visa_valid_to' ,
        'native_country',
        'last_organization_details',
        'organization_name' ,
        'organization_doj' ,
        'reliving_date' ,
        'reason_of_leaving' ,
        'reporting_manager_name' ,
        'reporting_manager_no' ,
        'reporting_manager_email',
        'reporting_hr_no' ,
        'reporting_hr_email' ,
        'pf_number' ,
        'uan_number',
        'father_name',
        'spouse_name',
        'nominee_name',
        'bank_name',
        'bank_acc_no' ,
        'ifsc_code' ,
        'esic_no' ,
        'esic_nominee_name',
        'relation_nominee_name',
        'nominee_residing',
        'nominee_dob' ,
        'nominee_aadhar_no',
        'emp_code',
        'emp_shift',
        'joining_date',
        'department_id' ,
        'designation_id' ,
        'probation_date' ,
        'evaluation_date' ,
        'employee_type',
        'selection_letter' ,
        'certificate_10th',
        'certificate_12th',
        'diploma_certificate' ,
        'graduation_certificate' ,
        'post_certificate' ,
        'aadhar_card' ,
        'pan_card' ,
        'pre_address_proof' ,
        'curr_address_proof' ,
        'passport' ,
        'driving_license' ,
        'voter_id' ,
        'has_offer_letter' ,
        'experience_letter' ,
        'relinige_letter' ,
        'bank_statement' ,
        'salary_slips' ,
        'new_pf_number',
        'new_uan_number',
        'monthly_gross' ,
        'monthly_net' ,
        'annual_ctc' ,
        'appraisal_month' ,
        'appraisal_year' ,
        'candidate_name' ,
        'candidate_sign' ,
        'hr_name' ,
        'hr_sign' ,
        'date',
        'company_stamp',
        'offer_letter',
        'appointment_letter',
    ];

    protected $casts = [
        'qualification_details' => 'array',
        'last_organization_details' => 'object',
    ];

    // to avoid fillable but in cost of security
    protected $gaurded=[];

    protected $table = 'employees_info'; // Specify the correct table name

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

