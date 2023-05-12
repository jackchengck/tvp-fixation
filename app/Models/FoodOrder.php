<?php

    namespace App\Models;

    use App\Traits\MultiTenantable;
    use Backpack\CRUD\app\Models\Traits\CrudTrait;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class FoodOrder extends Model
    {
        use MultiTenantable;
        use HasFactory;
        use CrudTrait;


        protected $fillable = [
            'business_id',
            'table_id',
            'status',
            'payment_method'
        ];

        public function business()
        {
            return $this->belongsTo(Business::class);
        }

        public function table()
        {
            return $this->belongsTo(Table::class);
        }

        public function foodOrderItems()
        {
            return $this->hasMany(FoodOrderItem::class);
        }

        public function getSetStatusDeliveredButton(){
            return '<a class="btn btn-sm btn-link" target="_blank" href=' . backpack_url("food-order/set-delivered") . "/" . $this->id . ' data-toggle="tooltip" title="Set Food Order Delivered"><i class="la la-envelope"></i> 設為已出餐</a>';
        }

        public function getSetStatusPaidButton(){
            return '<a class="btn btn-sm btn-link" target="_blank" href=' . backpack_url("food-order/set-paid") . "/" . $this->id . ' data-toggle="tooltip" title="Set Food Order Paid"><i class="la la-envelope"></i> 設為已結帳</a>';
        }

    }
