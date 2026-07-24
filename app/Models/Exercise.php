<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Exercise extends Model
{
    protected $fillable = [
        'name', 'equipment', 'target_muscles', 'category', 'image', 'description',
    ];

    protected $appends = ['image_url'];

    protected function casts(): array
    {
        return [
            'target_muscles' => 'array',
        ];
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
