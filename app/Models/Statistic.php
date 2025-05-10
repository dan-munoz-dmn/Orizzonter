<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    /** @use HasFactory<\Database\Factories\StatisticFactory> */
    use HasFactory;
    
    protected $fillable = [
        'total_rides',
        'total_distance',
        'total_time',
        'calories_burned',
        'average_speed',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function routeDetails()
    {
        return $this->hasMany(RouteDetail::class);
    }
}
