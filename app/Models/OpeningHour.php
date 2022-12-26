<?php

namespace App\Models;

use App\Traits\MultiTenantable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class OpeningHour extends Model
{
    use MultiTenantable;
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = [
        'day',
        'start',
        'end',
        'business_id',
    ];


    public function business()
    {
        return $this->belongsTo(Business::class);
    }


}
