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
        'location_name',
        'latitude',
        'longitude',
        'start_date',
        'end_date',
        'target_volunteers',
        'banner_path',
        'organizer_id',
        'status',
        'category_id',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date'   => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

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

    public function canBeFinished(): bool
    {
        $joined = $this->participants()->count();
        $completed = $this->participants()
            ->where('status', 'completed')
            ->count();

        //minimal relawan nyata 
        $minimumParticipants = max(
            3, // minimal absolut
            ceil(($this->target_volunteers ?? 0) * 0.3) // 30% dari target
        );

        if ($joined < $minimumParticipants) {
            return false;
        }

        return ($completed / $joined) >= 0.8;
    }

    public function completionInfo(): array
    {
        $joined = $this->participants()->count();
        $completed = $this->participants()
            ->where('status', 'completed')
            ->count();

        return [
            'joined' => $joined,
            'completed' => $completed,
            'rate' => $joined > 0 ? round(($completed / $joined) * 100) : 0,
            'minimum_required' => max(
                3,
                ceil(($this->target_volunteers ?? 0) * 0.3)
            ),
        ];
    }


}
