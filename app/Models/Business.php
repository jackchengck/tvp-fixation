<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Business extends Model
    {
        use \Backpack\CRUD\app\Models\Traits\CrudTrait;
        use HasFactory;

        protected static function boot()
        {
            parent::boot(); // TODO: Change the autogenerated stub

            if (auth()->check()) {

                static::addGlobalScope(
                    'checkBusinessId', function (Builder $builder) {
                    if (auth()->check()) {
//                    return $builder->where('business_id', auth()->user()['business_id']);
                        if (auth()->user()->isSuperAdmin == false) {
                            return $builder->where('id', backpack_user()->business_id);
                        }
                        return $builder;
                    }
                }
                );
            }
        }

        protected $fillable = [
            'title',
            'address',
            'phone',
            'info',
            'email',
            'admin_id',
            'solution_integrator_id',
            'payme_code',
            'alipay_code',
            'wechatpay_code',

        ];

        public function solutionIntegrator()
        {
            return $this->belongsTo(SolutionIntegrator::class);
        }

        public function bookings()
        {
            return $this->hasMany(Booking::class);
        }

        public function inventoryLogs()
        {
            return $this->hasMany(InventoryLog::class);
        }

        public function locations()
        {
            return $this->hasMany(Location::class);
        }

        public function products()
        {
            return $this->hasMany(Product::class);
        }

        public function services()
        {
            return $this->hasMany(Service::class);
        }

        public function supplierOrders()
        {
            return $this->hasMany(SupplierOrder::class);
        }

        public function users()
        {
            return $this->hasMany(User::class);
        }

        public function admin()
        {
            return $this->belongsTo(User::class, 'admin_id');
        }

        public function openingHours()
        {
            return $this->hasMany(OpeningHour::class);
        }

        public function holidays()
        {
            return $this->hasMany(Holiday::class);
        }

        public function chatrooms()
        {
            return $this->hasMany(Chatroom::class);
        }

        public function instantMessages()
        {
            return $this->hasMany(InstantMessage::class);
        }

        public function faqs()
        {
            return $this->hasMany(FAQ::class);
        }

        public function customerInfoSurveys()
        {
            return $this->hasMany(CustomerInfoSurvey::class);
        }

        public function coupons()
        {
            return $this->hasMany(Coupon::class);
        }

    }
