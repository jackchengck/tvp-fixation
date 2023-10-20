<?php

    namespace App\Models;

    use App\Traits\MultiTenantable;
    use Backpack\CRUD\app\Models\Traits\CrudTrait;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class CouponOwner extends Model
    {
        use HasFactory;
        use MultiTenantable, CrudTrait;


        protected $fillable = [
            'business_id',
            'email',
            'coupon_id',
        ];


        public function identifiableName()
        {
            return $this->email;
        }

        public function business()
        {
            return $this->belongsTo(Business::class);
        }

        public function coupon()
        {
            return $this->belongsTo(Coupon::class);
        }
    }
