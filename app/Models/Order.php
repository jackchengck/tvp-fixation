<?php

    namespace App\Models;

//    use App\Mail\OrderCreatedEmail;
//    use App\Mail\OrderDeliveryStatusChangedEmail;
//    use App\Mail\OrderPaymentStatusChangedEmail;
//    use App\Notifications\OrderCreated;
//    use App\Notifications\OrderPaymentStatusChanged;
//    use App\Notifications\OrderShippingStatusChanged;
    use App\Traits\MultiTenantable;
    use Backpack\CRUD\app\Models\Traits\CrudTrait;
    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\Notification;
    use Venturecraft\Revisionable\RevisionableTrait;

    class Order extends Model
    {
        use HasFactory;
        use MultiTenantable;
        use CrudTrait;

        use RevisionableTrait;


        public function identifiableName()
        {
            return $this->id . " - " . $this->order_num;
        }


        protected $fillable = [
            'order_num',
            'order_date',

            'coupon_id',

            'coupon_code',
            'discount',
            'discount_is_percentage',

            'subtotal',
            'total',

            'remarks',

            'payment_status',
            'payment_uid',
            'payment_method',

            'delivery_method',
            'delivery_status',
            'delivery_address',

            'business_id',
            'customer_id',
        ];


        protected static function boot()
        {
            parent::boot(); // TODO: Change the autogenerated stub

            self::created(
                function ($model) {
                    if ($model->customer_id != null) {
//                        Notification::send($model->customer, new OrderCreated($model));
//                        Mail::to($model->customer->email)->send(new OrderCreatedEmail($model));
                    }
                }
            );

        }

        public function getDeadlineAttribute()
        {
            if ($this->pickup_date) {
                $pDate = new Carbon($this->pickup_date);
                return $pDate->addDays(7)->toDateTimeString();
            }
            return null;
        }

        public function business()
        {
            return $this->belongsTo(Business::class);
        }

        public function customer()
        {
            return $this->belongsTo(Customer::class);
        }
//
//        public function coupon()
//        {
//            return $this->belongsTo(Coupon::class);
//        }

        public function orderItems()
        {
            return $this->hasMany(OrderItem::class);
        }

        public function setDeliveryStatusAttribute($value)
        {
            if ($this->delivery_status && $this->delivery_status !== $value) {
//                Notification::send($this->customer, new OrderShippingStatusChanged($this, $value));
//                Mail::to($this->customer->email)->send(new OrderDeliveryStatusChangedEmail($this, $value));

            }

            $this->attributes['delivery_status'] = $value;

        }

        public function setPaymentStatusAttribute($value)
        {
            if ($this->payment_status && $this->payment_status !== $value) {
//                Notification::send($this->customer, new OrderPaymentStatusChanged($this, $value));
//                Mail::to($this->customer->email)->send(new OrderPaymentStatusChangedEmail($this, $value));
            }
            $this->attributes['payment_status'] = $value;
        }


//        public function getOrderCustomerEmailButton()
//        {
//            return '<a class="btn btn-sm btn-link" target="_blank" href=' . backpack_url("mail/send-order-customer-email") . "/" . $this->id . ' data-toggle="tooltip" title="Order Customer Email"><i class="la la-envelope"></i> Order Confirm Email</a>';
//        }

        public function getOrderInvoiceButton()
        {
            return '<a class="btn btn-sm btn-link" target="_blank" href=' . backpack_url("documents/order-invoice") . "/" . $this->id . ' data-toggle="tooltip" title="Order Invoice Pdf"><i class="la la-file"></i> Invoice</a>';
        }

        public function getOrderReceiptButton()
        {
            return '<a class="btn btn-sm btn-link" target="_blank" href=' . backpack_url("documents/order-receipt") . "/" . $this->id . ' data-toggle="tooltip" title="Order Receipt Pdf"><i class="la la-file"></i> Receipt</a>';
        }

        public function getSendOrderInvoiceButton()
        {
            return '<a class="btn btn-sm btn-link" target="_blank" href=' . backpack_url("mail/send-order-invoice-email") . "/" . $this->id . ' data-toggle="tooltip" title="Send Order Invoice Customer Email"><i class="la la-envelope"></i> Send Invoice</a>';
        }

        public function getSendOrderReceiptButton()
        {
            return '<a class="btn btn-sm btn-link" target="_blank" href=' . backpack_url("mail/send-order-receipt-email") . "/" . $this->id . ' data-toggle="tooltip" title="Send Order Customer Receipt Email"><i class="la la-envelope"></i> Send Receipt</a>';
        }


//        public function getOrderCustomerEmailButton()
//        {
//            return '<a class="btn btn-sm btn-link" target="_blank" href=' . backpack_url("mail/send-order-customer-email") . "/" . $this->id . ' data-toggle="tooltip" title="Order Customer Email"><i class="la la-envelope"></i> Order Confirm Email</a>';
//        }


    }