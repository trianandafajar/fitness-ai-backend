<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id',
    'workout_schedule_id',
    'photo',
    'latitude',
    'longitude',
    'address',
    'status',
    'ai_verified',
    'ai_analysis',
    'checked_in_at',
])]
class Attendance extends Model
{
    protected function casts(): array
    {
        return [
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
            'ai_verified' => 'boolean',
            'ai_analysis' => 'array',
            'checked_in_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function workoutSchedule(): BelongsTo
    {
        return $this->belongsTo(WorkoutSchedule::class);
    }
}
