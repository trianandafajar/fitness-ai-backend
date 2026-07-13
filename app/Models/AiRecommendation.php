<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id',
    'category',
    'action_type',
    'content',
    'is_dismissed',
    'is_applied',
    'expires_at',
])]
class AiRecommendation extends Model
{
    protected function casts(): array
    {
        return [
            'is_dismissed' => 'boolean',
            'is_applied' => 'boolean',
            'expires_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
