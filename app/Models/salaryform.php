<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class salaryform extends Model
{
    use HasFactory;

    protected $fillable = [
       'designation' ,
       'grossSalary',
       'providentfund',
       'esic',
       'professionaltax' ,
       'deposit', 
       'netSalary',
       'doj',
    ];

    protected $table = 'salarydetails_form'; // Specify the correct table name
}