<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $guarded = [];  

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
