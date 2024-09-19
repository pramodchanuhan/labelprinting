<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'month_year',
        'd1',
        'd2',
        'd3',
        'd4',
        'd5',
        'd6',
        'd7',
        'd8',
        'd9',
        'd10',
        'd11',
        'd12',
        'd13',
        'd14',
        'd15',
        'd16',
        'd17',
        'd18',
        'd19',
        'd20',
        'd21',
        'd22',
        'd23',
        'd24',
        'd25',
        'd26',
        'd27',
        'd28',
        'd29',
        'd30',
        'd31',
    ];

    protected $casts=[
        'd1'=>'object',
        'd2'=>'object',
        'd3'=>'object',
        'd4'=>'object',
        'd5'=>'object',
        'd6'=>'object',
        'd7'=>'object',
        'd8'=>'object',
        'd9'=>'object',
        'd10'=>'object',
        'd11'=>'object',
        'd12'=>'object',
        'd13'=>'object',
        'd14'=>'object',
        'd15'=>'object',
        'd16'=>'object',
        'd17'=>'object',
        'd18'=>'object',
        'd19'=>'object',
        'd20'=>'object',
        'd21'=>'object',
        'd22'=>'object',
        'd23'=>'object',
        'd24'=>'object',
        'd25'=>'object',
        'd26'=>'object',
        'd27'=>'object',
        'd28'=>'object',
        'd29'=>'object',
        'd30'=>'object',
        'd31'=>'object',
    ];

    protected $table = 'attendance';

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}

