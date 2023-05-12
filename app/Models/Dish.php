<?php

    namespace App\Models;

    use App\Traits\MultiTenantable;
    use Backpack\CRUD\app\Models\Traits\CrudTrait;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;
    use Intervention\Image\ImageManagerStatic as Image;

    class Dish extends Model
    {
        use HasFactory;
        use MultiTenantable;
        use CrudTrait;


        protected $fillable = [
            'title',
            'description',
            'image',
            'price',
            'active',

            'business_id',
        ];


        public function identifiableName()
        {
            return $this->title;
        }


        protected static function boot()
        {
            parent::boot(); // TODO: Change the autogenerated stub

            static::deleted(
                function ($obj) {
                    Storage::disk('public_folder')->delete($obj->image);

                }
            );
        }

        public function setImageAttribute($value)
        {
            $attribute_name = 'image';
            $disk = config('backpack.base.root_disk_name');
            $destination_path = 'public/uploads/dishes';

//                if the image was erased
            if (empty($value)) {
                if (isset($this->{$attribute_name}) && !empty($this->{$attribute_name})) {
//                    delete the image from disk
                    Storage::disk($disk)->delete('public/' . $this->{$attribute_name});
                }
//                Set null to database column
                $this->attributes[$attribute_name] = null;
            }

            if (Str::startsWith($value, 'data:image')) {
//                0. Make Image
                $image = Image::make($value)->resize(
                    500, null, function ($constraint) {
                    $constraint->aspectRatio();
                }
                )->encode('png', 90);

//                1. Generate a filename
                $filename = "dishes_" . md5($value . time()) . '.png';

//                2. Store the image to disk
                Storage::disk($disk)->put($destination_path . '/' . $filename, $image->stream());

//                3. Delete the previous image, if there was one
                if (isset($this->{$attribute_name}) && !empty($this->{$attribute_name})) {
                    Storage::disk($disk)->delete('public/' . $this->{$attribute_name});
                }

//                4. Save the public path to database
//                Remove "public/" from path to get public url
                $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
                $this->attributes[$attribute_name] = $public_destination_path . '/' . $filename;


            } elseif (!empty($value)) {
                $this->attributes[$attribute_name] = $this->{$attribute_name};
            }
        }


        public function business()
        {
            return $this->belongsTo(Business::class);
        }

//        public function orders()
//        {
//            return $this->hasMany()
//        }


    }
