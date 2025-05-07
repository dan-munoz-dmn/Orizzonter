<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteDetail extends Model
{
    /** @use HasFactory<\Database\Factories\RouteDetailFactory> */
    use HasFactory;

    public function statistic()
    {
        return $this->belongsTo(Statistic::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
