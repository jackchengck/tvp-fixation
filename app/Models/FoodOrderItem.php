<?php

    namespace App\Models;

    use App\Traits\MultiTenantable;
    use Backpack\CRUD\app\Models\Traits\CrudTrait;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class FoodOrderItem extends Model
    {
        use MultiTenantable;
        use HasFactory;
        use CrudTrait;


        protected $fillable = [
            'business_id',
            'food_order_id',

            'dish_id',
            'quantity',
        ];

        protected $appends = [
            'dishCost'
        ];

        public function business()
        {
            return $this->belongsTo(Business::class);
        }

        public function foodOrder()
        {
            return $this->belongsTo(FoodOrder::class);
        }

        public function dish()
        {
            return $this->belongsTo(Dish::class);
        }

        protected function dishCost(): Attribute
        {
            return new Attribute(
                get: fn() => $this->dish()->cost
            );
        }
    }
