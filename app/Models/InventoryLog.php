<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'quantity',
        'remark',
        'location_id',
        'product_id',
        'business_id',
        'user_id',

    ];


    public function business(){
        return $this->belongsTo(Business::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
