<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id',
    'day_of_week',
    'scheduled_time',
    'exercises',
])]
class WorkoutSchedule extends Model
{
    protected function casts(): array
    {
        return [
            'exercises' => 'array',
            'scheduled_time' => 'string',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
