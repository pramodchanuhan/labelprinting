<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class registerfrom extends Model
{
    use HasFactory;

    // public $timestamps = false;

    protected $fillable = [
        'id',
        'receipt_no',
        'name',
        'mobile',
        'from_city',
        'to_city',
        'journey_date',
        'bus_name',
        'reporting_time',
        'departure_time',
        'seat_no',
        'starting_point',
        'amount',  
        'remark',
    ];
    
    protected $table = 'bus_tickets'; // Specify the correct table name

    public static function generateReceiptNo()
        {
            // Get the last record's receipt number
            $lastReceiptNo = self::orderBy('id', 'desc')->pluck('receipt_no')->first();
    
            // If no receipt number exists, start from 1
            $newReceiptNo = $lastReceiptNo ? $lastReceiptNo + 1 : 1;
    
            // If the number exceeds 1000, reset to 1 (optional logic)
            if ($newReceiptNo > 1000) {
                $newReceiptNo = 1;
            }
    
            // Format receipt number with leading zeros (e.g., 001, 010, 100)
            return str_pad($newReceiptNo, STR_PAD_LEFT);
        }
}
