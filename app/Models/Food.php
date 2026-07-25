<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Food extends Model
{
    protected $table = 'foods';

    protected $fillable = [
        'name', 'category_id', 'image', 'calories_per_100g',
        'protein_per_100g', 'carbs_per_100g', 'fat_per_100g', 'serving_unit',
    ];

    protected $appends = ['image_url', 'category'];

    public function categoryModel(): BelongsTo
    {
        return $this->belongsTo(FoodCategory::class, 'category_id');
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
