<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class directorform extends Model
{
    use HasFactory;

    protected $fillable = [
        'director', 
        'strengths',
        'weaknesses',
    ];

    protected $table = 'director_form'; // Specify the correct table name
}