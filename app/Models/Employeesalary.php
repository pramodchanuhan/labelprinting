<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Employeesalary extends Model
{
    use HasFactory;

    protected $fillable = [
       'employee_id' ,
       'grossSalary',
       'providentfund',
       'esic',
       'professionaltax' ,
       'deposit',
       'netSalary',
       'documents',
       'comment',
    ];

    protected $table = 'employee_salary'; // Specify the correct table name
}
