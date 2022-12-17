<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolutionIntegrator extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];


    public function business(){
        return $this->hasMany(Business::class);
    }
}
