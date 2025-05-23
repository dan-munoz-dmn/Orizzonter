<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestPlace extends Model
{
    /** @use HasFactory<\Database\Factories\InterestPlaceFactory> */
    use HasFactory;

      // Definimos los campos que pueden ser asignados masivamente
      protected $fillable = [
        'name',
        'description',
        'place_type',
        'location',
    ];

    public function profiles()
    {
         return $this->belongsToMany(Profile::class, 'interest_place_profile')
                ->withTimestamps();
    }
}
