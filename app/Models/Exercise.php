<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'name', 'equipment', 'target_muscles', 'category', 'image', 'description',
    ];

    protected function casts(): array
    {
        return [
            'target_muscles' => 'array',
        ];
    }
}
