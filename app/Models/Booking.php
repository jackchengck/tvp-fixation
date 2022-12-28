<?php

namespace App\Models;

use App\Traits\MultiTenantable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    use MultiTenantable;
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
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


    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }


    public function getBookingCustomerEmailButton()
    {
        return '<a class="btn btn-sm btn-link" target="_blank" href=' . backpack_url("mail/send-booking-customer-email") . "/" . $this->id . ' data-toggle="tooltip" title="Booking Customer Email"><i class="la la-envelope"></i> Booking Confirm Email</a>';
    }
}
