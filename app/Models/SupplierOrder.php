<?php

    namespace App\Models;

    use App\Traits\MultiTenantable;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Venturecraft\Revisionable\RevisionableTrait;

    class SupplierOrder extends Model
    {
        use MultiTenantable;
        use \Backpack\CRUD\app\Models\Traits\CrudTrait;
        use HasFactory;
        use RevisionableTrait;

        public function identifiableName()
        {
            return $this->id;
        }

        // If you are using another bootable trait
        // be sure to override the boot method in your model
        public static function boot()
        {
            parent::boot();
        }

        protected $fillable = [
            'supplier_id',
            'user_id',
            'business_id'
        ];


        protected $appends = [
            'total_cost',
        ];


        public function business()
        {
            return $this->belongsTo(Business::class);
        }

        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function supplier()
        {
            return $this->belongsTo(Supplier::class);
        }

        public function supplierOrderItems()
        {
            return $this->hasMany(SupplierOrderItem::class);
        }

        public function getSupplierOrderEmailButton()
        {
            return '<a class="btn btn-sm btn-link" target="_blank" href=' . backpack_url("mail/send-supplier-order-email") . "/" . $this->id . ' data-toggle="tooltip" title="Supplier Order Email"><i class="la la-envelope"></i> Supplier Order Email</a>';
        }

        public function getTotalCostAttribute()
        {
            $items = $this->supplierOrderItems;
            $totalCost = 0;
            foreach ($items as $item) {
                $totalCost += $item->quantity * $item->product->cost;
            }

            return $totalCost;
        }

    }
