<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'cost',
        'price',

        'minimum_inventory_quantity',
        'alert_quantity',

        'business_id',
        'supplier_id',
    ];


    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function inventoryLogs()
    {
        return $this->hasMany(InventoryLog::class);
    }

    public function supplierOrderItems()
    {
        return $this->hasMany(SupplierOrderItem::class);
    }
}
