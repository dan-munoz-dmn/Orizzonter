<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestPlace extends Model
{
    /** @use HasFactory<\Database\Factories\InterestPlaceFactory> */
    use HasFactory;

    public function profiles()
    {
         return $this->belongsToMany(Profile::class, 'interest_place_profile')
                ->withTimestamps();
    }
}
