<?php

    namespace App\Models;

    use App\Traits\MultiTenantable;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Coupon extends Model
    {
        use \Backpack\CRUD\app\Models\Traits\CrudTrait;
        use HasFactory;
        use MultiTenantable;

        protected $fillable = [
            'title',
            'code',
            'expiry_date',
            'show_owner_only'
        ];

        public function business()
        {
            return $this->belongsTo(Business::class);
        }

        public function couponOwners()
        {
            return $this->hasMany(CouponOwner::class);
        }

    }
