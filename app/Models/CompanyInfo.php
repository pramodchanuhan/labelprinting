<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;

    //   trnsform array to json
    protected $casts=[
        'company_name'=>'array',
        'designation'=>'array',
        'department'=>'array',
    ];

    // no need to add column name for fillable but not secure
    protected $guarded=[];
}
