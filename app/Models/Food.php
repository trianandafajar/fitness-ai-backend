<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';

    protected $fillable = [
        'name', 'category', 'image', 'calories_per_100g',
        'protein_per_100g', 'carbs_per_100g', 'fat_per_100g', 'serving_unit',
    ];
}
