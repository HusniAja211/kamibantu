<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'location_name',
        'latitude',
        'longitude',
        'start_date',
        'end_date',
        'target_volunteers',
        'banner_path',
        'organizer_id',
        'status',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date'   => 'datetime',
    ];


    /* ===== RELATION ===== */

    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function participants()
    {
        return $this->hasMany(EventParticipant::class);
    }

    public function volunteers()
    {
        return $this->belongsToMany(User::class, 'event_participants')
            ->withPivot('status')
            ->withTimestamps();
    }

    /* ===== PROGRESS ===== */

    public function completionRate()
    {
        $total = $this->participants()->count();
        if ($total === 0) return 0;

        $completed = $this->participants()
            ->where('status', 'completed')
            ->count();

        return ($completed / $total) * 100;
    }

    public function canBeFinished()
    {
        return $this->completionRate() >= 80;
    }
}
