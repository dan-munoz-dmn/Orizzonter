<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    /** @use HasFactory<\Database\Factories\RouteFactory> */
    use HasFactory;

    public function routeDetails()
    {
        return $this->hasMany(RouteDetail::class);
    }

    public function savedByUsers()
    {
        return $this->hasMany(SavedRoute::class);
    }

    public function savedRoute()
    {
        return $this->belongsTo(Route::class, 'saved_route_id');
    }
}
