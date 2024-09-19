<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class interviewerform extends Model
{
    use HasFactory;

    protected $fillable = [
        'ops', 
        'strengths',
        'weaknesses',
        'mock', 
        'strengths1',
        'weaknesses1',
        
    ];

    protected $table = 'interviewer_form'; // Specify the correct table name
}