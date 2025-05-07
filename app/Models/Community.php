<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    /** @use HasFactory<\Database\Factories\CommunityFactory> */
    use HasFactory;

    public function moderator()
    {
        return $this->hasMany(User::class, 'moderator_id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
