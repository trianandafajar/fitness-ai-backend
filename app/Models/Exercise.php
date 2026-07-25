<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Exercise extends Model
{
    protected $fillable = [
        'name', 'category_id', 'equipment', 'target_muscles', 'image', 'description',
    ];

    protected $appends = ['image_url', 'category'];

    protected function casts(): array
    {
        return [
            'target_muscles' => 'array',
        ];
    }

    public function categoryModel(): BelongsTo
    {
        return $this->belongsTo(ExerciseCategory::class, 'category_id');
    }

    public function getCategoryAttribute(): ?string
    {
        return $this->categoryModel?->slug;
    }

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image) {
            return null;
        }

        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }

        return Storage::disk('public')->url($this->image);
    }
}
