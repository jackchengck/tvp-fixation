<?php

    namespace App\Models;

    use App\Traits\MultiTenantable;
    use Backpack\CRUD\app\Models\Traits\CrudTrait;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Customer extends Model
    {
        use HasFactory;
        use CrudTrait;
        use MultiTenantable;

        protected $fillable = [
            'name',
            'email',
            'password',
            'phone',
        ];

        public function identifiableName()
        {
            return $this->name;
        }

        public function business()
        {
            return $this->belongsTo(Business::class);
        }

        public function bookings()
        {
            return $this->hasMany(Booking::class);
        }

    }
