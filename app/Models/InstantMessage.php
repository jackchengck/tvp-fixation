<?php

namespace App\Models;

use App\Traits\MultiTenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

//use Intervention\Image\ImageManagerStatic as Image;
//use ImageMan

class InstantMessage extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    use MultiTenantable;

    protected $fillable = [
        'business_id',
        'user_id',
        'sender_type',
        'content',
        'image_url',
        'record_url',
        'content',
        'content_type',
        'chatroom_id',
        'unread',

//        'customer_name',
//        'customer_email',
//        'customer_phone',
//        'customer_password',

    ];


    public function business()
    {
        return $this->belongsTo(Business::class);
    }


    public function chatroom(){
        return $this->belongsTo(Chatroom::class);
    }

//    public function setImageUrlAttribute($value)
//    {
//        $attribute_name = 'image_url';
//        $disk = config('backpack.base.root_disk_name');
//        $destination_path = 'public/uploads/instant-message';
//
////                if the image was erased
//        if (empty($value)) {
//            if (isset($this->{$attribute_name}) && !empty($this->{$attribute_name})) {
////                    delete the image from disk
//                Storage::disk($disk)->delete('public/' . $this->{$attribute_name});
//            }
////                Set null to database column
//            $this->attributes[$attribute_name] = null;
//        }
//
//        if (Str::startsWith($value, 'data:image')) {
////                0. Make Image
//            $image = Image::make($value)->resize(500, null, function ($constraint) {
//                $constraint->aspectRatio();
//            })->encode('jpg', 50);
//
////                1. Generate a filename
//            $filename = "articles_" . md5($value . time()) . '.jpg';
//
////                2. Store the image to disk
//            Storage::disk($disk)->put($destination_path . '/' . $filename, $image->stream());
//
////                3. Delete the previous image, if there was one
//            if (isset($this->{$attribute_name}) && !empty($this->{$attribute_name})) {
//                Storage::disk($disk)->delete('public/' . $this->{$attribute_name});
//            }
//
////                4. Save the public path to database
////                Remove "public/" from path to get public url
//            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
//            $this->attributes[$attribute_name] = $public_destination_path . '/' . $filename;
//
//
//        } elseif (!empty($value)) {
//            $this->attributes[$attribute_name] = $this->{$attribute_name};
//        }
//    }

}