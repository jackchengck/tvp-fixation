<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierOrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_order_id',
        'product_id',
        'quantity',
    ];


    public function supplierOrder()
    {
        return $this->belongsTo(SupplierOrder::class);

    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
