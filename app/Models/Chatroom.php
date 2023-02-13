<?php

namespace App\Models;

use App\Traits\MultiTenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    use MultiTenantable;


    protected $fillable = [
        'business_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_password',
        'chatroom_token'
    ];

    public function instantMessages()
    {
        return $this->hasMany(InstantMessage::class);
    }

    public function createToken($token)
    {

    }

}
