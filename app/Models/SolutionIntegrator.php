<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolutionIntegrator extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;


    protected $fillable = [
        'title',
        'domain'
    ];


    public function business(){
        return $this->hasMany(Business::class);
    }
}
