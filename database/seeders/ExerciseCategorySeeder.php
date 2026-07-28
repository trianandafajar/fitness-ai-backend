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
            ['name' => 'Power', 'slug' => 'power'],
            ['name' => 'Plyometric', 'slug' => 'plyometric'],
            ['name' => 'Strength', 'slug' => 'strength'],
            ['name' => 'Endurance', 'slug' => 'endurance'],
            ['name' => 'Balance', 'slug' => 'balance'],
            ['name' => 'Stability', 'slug' => 'stability'],
            ['name' => 'Technique', 'slug' => 'technique'],
            ['name' => 'Recovery', 'slug' => 'recovery'],
            ['name' => 'Interval', 'slug' => 'interval'],
            ['name' => 'Coordination', 'slug' => 'coordination'],
            ['name' => 'Agility', 'slug' => 'agility'],
            ['name' => 'Isolation', 'slug' => 'isolation'],
            ['name' => 'Hypertrophy', 'slug' => 'hypertrophy'],
        ];

        foreach ($categories as $cat) {
            ExerciseCategory::firstOrCreate(
                ['slug' => $cat['slug']],
                ['name' => $cat['name']]
            );
        }
    }
}
