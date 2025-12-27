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

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

     /* ===== RELATION ===== */

    // Sebagai penyelenggara
    public function organizedEvents()
    {
        return $this->hasMany(Event::class, 'organizer_id');
    }

    // Sebagai relawan
    public function participations()
    {
        return $this->hasMany(EventParticipant::class);
    }

    public function joinedEvents()
    {
        return $this->belongsToMany(Event::class, 'event_participants')
            ->withPivot('status')
            ->withTimestamps();
    }

    /* ===== RATING RELAWAN ===== */

    public function volunteerStats()
    {
        $joined = $this->joinedEvents()->count();
        $completed = $this->joinedEvents()
            ->wherePivot('status', 'completed')
            ->count();

        return compact('joined', 'completed');
    }

    /* ===== Umum ===== */
    public function getRatingAttribute()
    {
        return number_format(rand(40, 50) / 10, 1); // dummy realistis
    }


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
