<?php

namespace App\Models;

use App\Traits\MultiTenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrequentlyAskedQuestion extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    use MultiTenantable;

    protected $fillable = [
        'question',
        'answer',
        'business_id',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
