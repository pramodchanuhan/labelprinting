<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeesLeave extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'recharge_count',
        'remaining_leaves',
        'PL',
        'SL',
        'ALWP',
        'total_PL',
        'total_ALWP',
    ];

    protected $table = 'employees_leave'; // Specify the correct table name

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
