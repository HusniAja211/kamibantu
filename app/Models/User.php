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
        'avatar',
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

    /* ===== RATING RELAWAN (HYBRID) ===== */
    public function volunteerRating()
    {
        $total = $this->joinedEvents()->count();

        if ($total < 3) {
            return [
                'level' => '🌱 Pemula',
                'stars' => 0,
                'completion_rate' => null,
                'total' => $total,
            ];
        }

        $completed = $this->joinedEvents()
            ->wherePivot('status', 'completed')
            ->count();

        $cr = $completed / $total;

        if ($total >= 10 && $cr >= 0.9) {
            return ['level' => '⭐⭐⭐ Kontributor', 'stars' => 3, 'completion_rate' => $cr, 'total' => $total];
        }

        if ($total >= 6 && $cr >= 0.8) {
            return ['level' => '⭐⭐ Terpercaya', 'stars' => 2, 'completion_rate' => $cr, 'total' => $total];
        }

        if ($total >= 3 && $cr >= 0.7) {
            return ['level' => '⭐ Aktif', 'stars' => 1, 'completion_rate' => $cr, 'total' => $total];
        }

        return [
            'level' => '🌱 Pemula',
            'stars' => 0,
            'completion_rate' => $cr,
            'total' => $total,
        ];
    }

     /* ===== RATING Penyelenggara (HYBRID) ===== */
    public function organizerRating()
    {
        $total = $this->organizedEvents()->count();

        if ($total < 2) {
            return [
                'level' => '🌱 Baru',
                'stars' => 0,
                'completion_rate' => null,
                'total' => $total,
            ];
        }

        $finished = $this->organizedEvents()
            ->where('status', 'finished')
            ->count();

        $cr = $finished / $total;

        if ($total >= 4 && $cr >= 0.8) {
            return ['level' => '⭐⭐ Terpercaya', 'stars' => 2, 'completion_rate' => $cr, 'total' => $total];
        }

        if ($total >= 2 && $cr >= 0.7) {
            return ['level' => '⭐ Aktif', 'stars' => 1, 'completion_rate' => $cr, 'total' => $total];
        }

        return [
            'level' => '🌱 Baru',
            'stars' => 0,
            'completion_rate' => $cr,
            'total' => $total,
        ];
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
