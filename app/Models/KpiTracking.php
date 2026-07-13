<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id',
    'period_type',
    'period_start',
    'period_end',
    'workouts_completed',
    'workouts_target',
    'workout_compliance_pct',
    'current_weight_kg',
    'weight_change_kg',
    'weight_trend_score',
    'nutrition_score',
    'consistency_score',
    'engagement_score',
    'overall_score',
    'ai_summary',
])]
class KpiTracking extends Model
{
    protected $table = 'kpi_tracking';

    protected function casts(): array
    {
        return [
            'period_start' => 'date:Y-m-d',
            'period_end' => 'date:Y-m-d',
            'workout_compliance_pct' => 'decimal:2',
            'current_weight_kg' => 'decimal:2',
            'weight_change_kg' => 'decimal:2',
            'weight_trend_score' => 'decimal:2',
            'nutrition_score' => 'integer',
            'consistency_score' => 'integer',
            'engagement_score' => 'integer',
            'overall_score' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
