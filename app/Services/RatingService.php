<?php

namespace App\Services;

use App\Models\User;

class RatingService
{
    public static function volunteerLevel(User $user): string
    {
        $joined = $user->joinedEvents()->count();

        if ($joined < 3) {
            return '🌱 Pemula';
        }

        $completed = $user->joinedEvents()
            ->wherePivot('status', 'completed')
            ->count();

        $rate = $completed / $joined;

        if ($joined >= 10 && $rate >= 0.9) return '⭐⭐⭐ Kontributor';
        if ($joined >= 6 && $rate >= 0.8) return '⭐⭐ Terpercaya';
        if ($joined >= 3 && $rate >= 0.7) return '⭐ Aktif';

        return '🌱 Pemula';
    }
}
