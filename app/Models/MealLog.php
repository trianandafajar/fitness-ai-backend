<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id',
    'meal_type',
    'logged_at',
    'total_calories',
    'total_protein_g',
    'total_carbs_g',
    'total_fat_g',
])]
class MealLog extends Model
{
    protected function casts(): array
    {
        return [
            'logged_at' => 'datetime',
            'total_calories' => 'integer',
            'total_protein_g' => 'decimal:1',
            'total_carbs_g' => 'decimal:1',
            'total_fat_g' => 'decimal:1',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
