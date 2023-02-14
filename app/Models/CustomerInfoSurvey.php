<?php

namespace App\Models;

use App\Traits\MultiTenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInfoSurvey extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use MultiTenantable;
    use HasFactory;

    protected $fillable = [
        'occupation',
        'district',
        'age_group',
        'other'
    ];


    public function business()
    {
        return $this->belongsTo(Business::class);
    }

}
