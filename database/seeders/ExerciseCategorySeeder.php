<?php

namespace Database\Seeders;

use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class ExerciseCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Chest', 'slug' => 'chest'],
            ['name' => 'Back', 'slug' => 'back'],
            ['name' => 'Shoulders', 'slug' => 'shoulders'],
            ['name' => 'Arms', 'slug' => 'arms'],
            ['name' => 'Legs', 'slug' => 'legs'],
            ['name' => 'Core', 'slug' => 'core'],
            ['name' => 'Cardio', 'slug' => 'cardio'],
        ];

        foreach ($categories as $cat) {
            ExerciseCategory::create($cat);
        }
    }
}
