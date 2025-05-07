<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function configuration()
    {
        return $this->belongsTo(Configuration::class);
    }

    //quitamos personalization

    public function statistics()
    {
        return $this->hasOne(Statistic::class);
    }

    public function challenges()
    {
        return $this->belongsToMany(Challenge::class, 'user_challenges')
                    ->withPivot('progress', 'status', 'completed_at')
                    ->withTimestamps();
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function communities()
    {
        return $this->belongsTo(Community::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class)->withPivot('role', 'joined_at')->withTimestamps();
    }

    public function savedRoutes()
    {
        return $this->hasMany(SavedRoute::class);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class, 'moderator_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
