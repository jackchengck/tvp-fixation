<?php

namespace App\Models;

use App\Traits\MultiTenantable;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use MultiTenantable;
    use HasFactory;
    use CrudTrait;

    protected $fillable = [
        'question',
        'answer',
    ];
}
