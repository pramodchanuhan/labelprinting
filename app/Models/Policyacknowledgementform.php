<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Policyacknowledgementform extends Model
{
    use HasFactory;

    protected $fillable = [
        'employees_id ',
        // 'employeecode',
        // 'designation',
        // 'department',
        'emergencycontact',
        'name',
        'relation',
        'employeeSign',
        'date',

    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
