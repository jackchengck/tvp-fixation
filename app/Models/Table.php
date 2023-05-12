<?php

    namespace App\Models;

    use App\Traits\MultiTenantable;
    use Backpack\CRUD\app\Models\Traits\CrudTrait;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Table extends Model
    {
        use MultiTenantable;
        use HasFactory;
        use CrudTrait;


        protected $fillable = [
            'title',
            'business_id'
        ];


        public function business()
        {
            return $this->belongsTo(Business::class);
        }


    }
