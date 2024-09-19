<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class hrform extends Model
{
    use HasFactory;

    protected $fillable = [
        'hr', 
        'strengths',
        'weaknesses',
    ];

    protected $table = 'hr_form'; // Specify the correct table name
}