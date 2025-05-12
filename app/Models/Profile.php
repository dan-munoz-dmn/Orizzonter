<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function interestPlaces()
    {
        return $this->belongsToMany(InterestPlace::class, 'interest_place_profile')
                ->withTimestamps();
    }

    public function configuration()
    {
        return $this->belongsTo(Configuration::class);
    }

    public function personalization()
    {
        return $this->hasOne(Personalization::class);
    }

    protected $fillable = [
    'gender',
    'profile_ph',
    'description',
    'nickname',
    'cyclist_type',
    'busy_routes',
    'achievements',
    'user_id',
    'interest_place_id',
    'configuration_id',
    ];
}
