<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'cost',
        'price',

        'business_id',
    ];


    public function business(){
        return $this->belongsTo(Business::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
