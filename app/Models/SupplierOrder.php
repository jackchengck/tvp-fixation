<?php

namespace App\Models;

use App\Traits\MultiTenantable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierOrder extends Model
{
    use MultiTenantable;
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'user_id',
        'business_id'
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


}
