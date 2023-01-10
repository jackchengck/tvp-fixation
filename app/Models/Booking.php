<?php

namespace App\Models;

use App\Traits\MultiTenantable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Venturecraft\Revisionable\RevisionableTrait;

class Booking extends Model
{

    use MultiTenantable;
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use RevisionableTrait;
    use HasFactory;
    use Notifiable;

    public function identifiableName()
    {
        return $this->customer_name;
    }

    // If you are using another bootable trait
    // be sure to override the boot method in your model
    public static function boot()
    {
        parent::boot();
    }

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
        'booking_status',

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

    public function getBookingCustomerSmsButton()
    {
        return '<a class="btn btn-sm btn-link" target="_blank" href=' . backpack_url("sms/send-booking-customer-sms") . "/" . $this->id . ' data-toggle="tooltip" title="Booking Customer SMS"><i class="la la-sms"></i> Booking Confirm SMS</a>';
    }

    public function routeNotificationForSns($notification = null)
    {
        return $this->customer_phone;
    }
}
