<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Select_interviewmode extends Model
{
    use HasFactory;

    protected $fillable = [
        'mode', 
        'name',
        'link',
        'form_id',
       
        
    ];

    public function form()
    {
        return $this->belongsTo(form::class);
    }
    protected $table = 'select_mode'; // Specify the correct table name
}