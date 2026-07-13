<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id',
    'date_of_birth',
    'gender',
    'height_cm',
    'weight_kg',
    'fitness_goal',
    'activity_level',
    'goal_weight_kg',
    'dietary_preferences',
    'dietary_restrictions',
    'allergies',
    'medical_conditions',
    'exercise_frequency',
    'exercise_types',
    'injuries',
    'onboarding_step',
    'profile_completed',
])]
class UserProfile extends Model
{
    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date:Y-m-d',
            'height_cm' => 'decimal:2',
            'weight_kg' => 'decimal:2',
            'goal_weight_kg' => 'decimal:2',
            'dietary_preferences' => 'array',
            'dietary_restrictions' => 'array',
            'allergies' => 'array',
            'exercise_types' => 'array',
            'onboarding_step' => 'integer',
            'profile_completed' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
