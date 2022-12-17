<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',

        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_password',
        'order_num',

        'booking_date',
        'booking_time',

        'business_id',

    ];

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function business(){
        return $this->belongsTo(Business::class);
    }
}
