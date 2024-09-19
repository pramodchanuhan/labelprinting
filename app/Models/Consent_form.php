<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Consent_form extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id ',
        'relation',
        'contactNumber',
        'name',
        'date',
        'sign',
        'employeeSign',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
