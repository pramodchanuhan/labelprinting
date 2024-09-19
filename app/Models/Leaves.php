<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'no_days',
        'from_date',
        'to_date',
        'leave_type',
        'leave_reason_subject',
        'leave_reason_body',
        'status',
        'approved_by',
        'assigned_to',
    ];

    protected $appends = [
        'approved_by_name',
    ];


    public function getApprovedByNameAttribute(): string
    {
        $emp=Employee::find($this->approved_by);
        return "$emp->f_name $emp->l_name";
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
