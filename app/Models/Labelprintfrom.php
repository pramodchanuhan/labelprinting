<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Labelprintfrom extends Model
{
    use HasFactory;
    protected $table = 'labelprintfrom';
    protected $fillable = [
       'id',
       'prefix',
       'name',
       'address',
       'local_area',
       'city',
       'district',
       'state',
       'zip_code',
       'date_of_birth',
       'partner_name',
       'anniversary',
       'partner_dob',
       'options',
       'contact_person',
       'std_code',
       'office',
       'office2',
       'resident',
       'fax',
       'mobile_no',
       'mobile_no2',
       'email',
    ];

     // Specify the correct table name
}
