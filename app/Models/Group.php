<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /** @use HasFactory<\Database\Factories\GroupFactory> */
    use HasFactory;

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class)->withPivot('role', 'joined_at')->withTimestamps();
    }
}
