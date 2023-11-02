<?php

    namespace App\Models;

    use App\Mail\BookingCreatedEmail;
    use App\Mail\BookingCreatedToBusiness;
    use App\Mail\BookingCreatedToCustomer;
    use App\Traits\MultiTenantable;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Notifications\Notifiable;
    use Illuminate\Support\Facades\Mail;
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
            return $this->customer_name ?? $this->customer->name;
        }

        // If you are using another bootable trait
        // be sure to override the boot method in your model
        public static function boot()
        {
            parent::boot();
            self::created(
                function ($model) {

                    if ($model->service->products) {
                        foreach ($model->service->products as $product) {
                            $newInventoryLog = new InventoryLog();
                            $newInventoryLog->quantity = $product->pivot->quantity;
                            $newInventoryLog->type = 'consume';
                            $newInventoryLog->product_id = $product->id;
                            $newInventoryLog->business_id = $model->business->id;
                            $newInventoryLog->remark = "Booking ID: " . $model->order_num;
                            $newInventoryLog->save();
                        }

                    }

                    if($model->customer_email){
                        Mail::to($model->customer_email)->send(new BookingCreatedToCustomer($model));
                    }
                    if($model->business->on_booking_email_notification && $model->business->email){
                        Mail::to($model->business->email)->send(new BookingCreatedToBusiness($model));
                    }

                }
            );
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

            'customer_id'

        ];


        public function service()
        {
            return $this->belongsTo(Service::class);
        }

        public function business()
        {
            return $this->belongsTo(Business::class);
        }

        public function customer()
        {
            return $this->belongsTo(Customer::class);
        }


        public function getBookingCustomerEmailButton()
        {
            return '<a class="btn btn-sm btn-link" target="_blank" href=' . backpack_url("mail/send-booking-customer-email") . "/" . $this->id . ' data-toggle="tooltip" title="Booking Customer Email"><i class="la la-envelope"></i> Booking Confirm Email</a>';
        }

//        public function getBookingBusinessEmailButton()
//        {
//            return '<a class="btn btn-sm btn-link" target="_blank" href=' . backpack_url("mail/send-booking-customer-email") . "/" . $this->id . ' data-toggle="tooltip" title="Booking Customer Email"><i class="la la-envelope"></i> Booking Confirm Email</a>';
//        }

        public function getBookingCustomerSmsButton()
        {
            return '<a class="btn btn-sm btn-link" target="_blank" href=' . backpack_url("sms/send-booking-customer-sms") . "/" . $this->id . ' data-toggle="tooltip" title="Booking Customer SMS"><i class="la la-sms"></i> Booking Confirm SMS</a>';
        }


        public function getBookingDueCustomerSmsButton()
        {
            return '<a class="btn btn-sm btn-link" target="_blank" href=' . backpack_url("sms/send-booking-due-customer-sms") . "/" . $this->id . ' data-toggle="tooltip" title="Booking Due Customer SMS"><i class="la la-sms"></i> Booking Due SMS</a>';
        }

        public function routeNotificationForSns($notification = null)
        {
            return $this->customer_phone ?? $this->customer->phone;
        }
    }
