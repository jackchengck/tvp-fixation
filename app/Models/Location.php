<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'business_id',

    ];


    public function business(){
        return $this->belongsTo(Business::class);
    }

    public function inventoryLogs(){
        return $this->hasMany(InventoryLog::class);
    }
}
