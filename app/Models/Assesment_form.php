<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Assesment_form extends Model
{
    use HasFactory;

    // public $timestamps = false;

    protected $fillable = [
        'candidateName',
        'phone',
        'email',
        'company_id',
        'source',
        'referencename',
        'referencecontact',
        'otherSource',
        'education',
        'position',
        'experienceType',
        'experience',
        'jobprofile',
        'rotationalShifts',
        'callingPreference',
        'emp_status',
        'emp_name',
        'currentdesignation',
        'currentSalary',
        'expectedSalary',
        'emp_reference',
        'emp_reference_no',
        'resume',
        // 'emp_reference1',
        // 'emp_reference_no1',
        // 'emp_reference2',
        // 'emp_reference_no2',
        'stage',
        'status',
        'cur_round',
        'interview_mode',
        'interviewer_name',
        'interview_link',
        'r1_asignedto',
        'r2_asignedto',
        'r3_asignedto',
        'hr_name',
        'strengths',
        'weaknesses',
        'inthr_date',
        'ops_name',
        'ops_strengths',
        'ops_weaknesses',
        'ops_date',
        'mock_name',
        'mock_strengths',
        'mock_weaknesses',
        'mock_date',
        'director_name',
        'director_strengths',
        'director_weaknesses',
        'director_date',

    ];

    protected $casts = [
        'emp_reference' => 'array',
        'emp_reference_no' => 'array',
    ];

    protected $table = 'assesement_form'; // Specify the correct table name
}
