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
        'chatroom_token',
        'title'
    ];

    public function instantMessages()
    {
        return $this->hasMany(InstantMessage::class);
    }

    public function createToken($token)
    {

    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }


    public function getChatroomLinkButton()
    {
        return '<a class="btn btn-sm btn-link" target="_blank" href="https://message.' . $this->business->solutionIntegrator->domain . '/' . $this->business->subdomain . '/' . $this->chatroom_token . '" data-toggle="tooltip" title="Booking Customer Email"><i class="la la-send"></i> To Chatroom</a>';
    }


    public function getChatroomHistoryDownloadButton()
    {
        return '<a class="btn btn-sm btn-link" target="_blank" href="' . backpack_url("chat-history") . '/' . $this->id . '" data-toggle="tooltip" title="Download Chat History"><i class="la la-file"></i> Download Chat History</a>';
    }


}
