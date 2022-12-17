<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'address',
        'phone',
        'info',
        'email',
        'user_id',
        'solution_integrator_id',

    ];

    public function solutionIntegrator(){
        return $this->belongsTo(SolutionIntegrator::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }

    public function inventoryLogs(){
        return $this->hasMany(InventoryLog::class);
    }

    public function locations(){
        return $this->hasMany(Location::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function services(){
        return $this->hasMany(Service::class);
    }

    public function supplierOrders(){
        return $this->hasMany(SupplierOrder::class);
    }
}
