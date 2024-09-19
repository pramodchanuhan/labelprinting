<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'emp_id',
        'f_name',
        'l_name',
        'username',
        'joining_date',
        'mobile_no',
        'status',
        'employment_status',
        'company_id',
        'department_id',
        'designation_id',
        'reports_to',
    ];

    protected $appends = [
        'company_name',
        'department_name',
        'designation_name',
        'reports_to_name',
        'email',
    ];

    // protected $hidden = [
    //     'designation',
    // ];

    // to avoid fillable but in cost of security
    // protected $gaurded=[];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }


    public function designation(): BelongsTo
    {
        return $this->belongsTo(Designation::class);
    }

    public  function reportsTo(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'reports_to');
    }


    public function reportingEmps(): HasMany
    {
        return $this->hasMany(Employee::class, 'reports_to');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function employees_info(): HasOne
    {
        return $this->hasOne(EmployeesInfo::class);
    }

    public function employee_leave(): HasOne
    {
        return $this->hasOne(EmployeesLeave::class);
    }

    public function employee_leave_req(): HasMany
    {
        // return $this->hasMany(Leaves::class)->orderBy('created_at', 'desc');
        return $this->hasMany(Leaves::class)->latest();
    }

    public function employee_attendance(): HasOne
    {
        return $this->hasOne(Attendance::class);
    }

    public function getCompanyNameAttribute(): string
    {
        return $this->company->name;
    }
    public function getDepartmentNameAttribute(): string
    {
        return $this->department->name;
    }
    public function getDesignationNameAttribute(): string
    {
        return $this->designation->name;
    }

    public function getReportsToNameAttribute(): string
    {
        if($this->reportsTo)
            return $this->reportsTo->f_name . ' ' . $this->reportsTo->l_name;
        return '';
    }
    public function getEmailAttribute(): string
    {
        return $this->user->email;
    }

    public function consent_form()
    {
        return $this->hasOne(Consent_form::class);
    }


    public function  policyacknowledgementform()
    {
        return $this->hasOne(Policyacknowledgementform::class);
    }
}
