<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    /** @use HasFactory<\Database\Factories\ChallengeFactory> */
    use HasFactory;

    public function reward()
    {
        return $this->belongsTo(Reward::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_challenges')
                    ->withPivot('progress', 'status', 'completed_at')
                    ->withTimestamps();
    }
}
