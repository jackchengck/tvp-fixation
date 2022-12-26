<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait MultiTenantable
{

    public static function bootMultiTenantable()
    {
        if (auth()->check()) {
            static::creating(function ($model) {
                if (auth()->user()->isSuperAdmin == false) {
                    $model->business_id = auth()->user()['business_id'];
                }

            });


            static::addGlobalScope('checkBusinessId', function (Builder $builder) {
                if (auth()->check()) {
//                    return $builder->where('business_id', auth()->user()['business_id']);
                    if (auth()->user()->isSuperAdmin == false) {
                        return $builder->where('business_id', backpack_user()->business_id);
                    }
                    return $builder;
                }
            });
        }
    }
}

