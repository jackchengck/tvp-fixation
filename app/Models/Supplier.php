<?php

namespace App\Models;

use App\Traits\MultiTenantable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use MultiTenantable;
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'info',
        'business_id',
    ];



    public function business(){
        return $this->belongsTo(Business::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function supplierOrders(){
        return $this->hasMany(SupplierOrder::class);
    }
}
