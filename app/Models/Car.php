<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    // unguards data in the object as to let it be shown/changed/deleted
    protected $guarded = [];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function owners()
    {
        return $this->belongsToMany(Owner::class)->withTimestamps();
    }
}
