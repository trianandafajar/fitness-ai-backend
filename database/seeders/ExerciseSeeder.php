<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Bench Press', 'equipment' => 'Barbell', 'target_muscles' => ['Chest', 'Triceps', 'Shoulders'], 'category_slug' => 'chest', 'image' => 'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?w=400'],
            ['name' => 'Incline Bench Press', 'equipment' => 'Barbell', 'target_muscles' => ['Upper Chest', 'Triceps', 'Shoulders'], 'category_slug' => 'chest', 'image' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=400'],
            ['name' => 'Dumbbell Fly', 'equipment' => 'Dumbbell', 'target_muscles' => ['Chest', 'Shoulders'], 'category_slug' => 'chest', 'image' => 'https://images.unsplash.com/photo-1599571234909-29ed5d1321b5?w=400'],
            ['name' => 'Push Up', 'equipment' => 'Bodyweight', 'target_muscles' => ['Chest', 'Triceps', 'Core'], 'category_slug' => 'chest', 'image' => 'https://images.unsplash.com/photo-1598971639058-fab3c3109a00?w=400'],
            ['name' => 'Deadlift', 'equipment' => 'Barbell', 'target_muscles' => ['Back', 'Glutes', 'Hamstrings', 'Core'], 'category_slug' => 'back', 'image' => 'https://images.unsplash.com/photo-1603287681836-b174ce5074c2?w=400'],
            ['name' => 'Pull Up', 'equipment' => 'Pull-up Bar', 'target_muscles' => ['Back', 'Biceps', 'Shoulders'], 'category_slug' => 'back', 'image' => 'https://images.unsplash.com/photo-1598971639058-fab3c3109a00?w=400'],
            ['name' => 'Barbell Row', 'equipment' => 'Barbell', 'target_muscles' => ['Back', 'Biceps', 'Core'], 'category_slug' => 'back', 'image' => 'https://images.unsplash.com/photo-1544033527-b192daee1f5b?w=400'],
            ['name' => 'Lat Pulldown', 'equipment' => 'Cable Machine', 'target_muscles' => ['Back', 'Biceps'], 'category_slug' => 'back', 'image' => 'https://images.unsplash.com/photo-1603287681836-b174ce5074c2?w=400'],
            ['name' => 'Overhead Press', 'equipment' => 'Barbell', 'target_muscles' => ['Shoulders', 'Triceps'], 'category_slug' => 'shoulders', 'image' => 'https://images.unsplash.com/photo-1581009137042-c552e485697a?w=400'],
            ['name' => 'Lateral Raise', 'equipment' => 'Dumbbell', 'target_muscles' => ['Shoulders'], 'category_slug' => 'shoulders', 'image' => 'https://images.unsplash.com/photo-1581009137042-c552e485697a?w=400'],
            ['name' => 'Face Pull', 'equipment' => 'Cable Machine', 'target_muscles' => ['Rear Shoulders', 'Upper Back'], 'category_slug' => 'shoulders', 'image' => 'https://images.unsplash.com/photo-1581009137042-c552e485697a?w=400'],
            ['name' => 'Bicep Curl', 'equipment' => 'Dumbbell', 'target_muscles' => ['Biceps'], 'category_slug' => 'arms', 'image' => 'https://images.unsplash.com/photo-1581009137042-c552e485697a?w=400'],
            ['name' => 'Tricep Pushdown', 'equipment' => 'Cable Machine', 'target_muscles' => ['Triceps'], 'category_slug' => 'arms', 'image' => 'https://images.unsplash.com/photo-1581009137042-c552e485697a?w=400'],
            ['name' => 'Hammer Curl', 'equipment' => 'Dumbbell', 'target_muscles' => ['Biceps', 'Forearms'], 'category_slug' => 'arms', 'image' => 'https://images.unsplash.com/photo-1581009137042-c552e485697a?w=400'],
            ['name' => 'Barbell Squat', 'equipment' => 'Barbell', 'target_muscles' => ['Quads', 'Glutes', 'Core'], 'category_slug' => 'legs', 'image' => 'https://images.unsplash.com/photo-1574680178050-55c6a6a96077?w=400'],
            ['name' => 'Leg Press', 'equipment' => 'Leg Press Machine', 'target_muscles' => ['Quads', 'Glutes', 'Hamstrings'], 'category_slug' => 'legs', 'image' => 'https://images.unsplash.com/photo-1574680178050-55c6a6a96077?w=400'],
            ['name' => 'Romanian Deadlift', 'equipment' => 'Dumbbell', 'target_muscles' => ['Hamstrings', 'Glutes'], 'category_slug' => 'legs', 'image' => 'https://images.unsplash.com/photo-1574680178050-55c6a6a96077?w=400'],
            ['name' => 'Walking Lunge', 'equipment' => 'Dumbbell', 'target_muscles' => ['Quads', 'Glutes', 'Hamstrings'], 'category_slug' => 'legs', 'image' => 'https://images.unsplash.com/photo-1574680178050-55c6a6a96077?w=400'],
            ['name' => 'Calf Raise', 'equipment' => 'Smith Machine', 'target_muscles' => ['Calves'], 'category_slug' => 'legs', 'image' => 'https://images.unsplash.com/photo-1574680178050-55c6a6a96077?w=400'],
            ['name' => 'Plank', 'equipment' => 'Bodyweight', 'target_muscles' => ['Core', 'Shoulders'], 'category_slug' => 'core', 'image' => 'https://images.unsplash.com/photo-1598971639058-fab3c3109a00?w=400'],
            ['name' => 'Cable Crunch', 'equipment' => 'Cable Machine', 'target_muscles' => ['Abs'], 'category_slug' => 'core', 'image' => 'https://images.unsplash.com/photo-1598971639058-fab3c3109a00?w=400'],
            ['name' => 'Hanging Leg Raise', 'equipment' => 'Pull-up Bar', 'target_muscles' => ['Abs', 'Hip Flexors'], 'category_slug' => 'core', 'image' => 'https://images.unsplash.com/photo-1598971639058-fab3c3109a00?w=400'],
            ['name' => 'Treadmill Run', 'equipment' => 'Treadmill', 'target_muscles' => ['Legs', 'Cardio'], 'category_slug' => 'cardio', 'image' => 'https://images.unsplash.com/photo-1566241440091-ec10de8db2e1?w=400'],
            ['name' => 'Jump Rope', 'equipment' => 'Jump Rope', 'target_muscles' => ['Legs', 'Cardio', 'Shoulders'], 'category_slug' => 'cardio', 'image' => 'https://images.unsplash.com/photo-1566241440091-ec10de8db2e1?w=400'],
            ['name' => 'Rowing Machine', 'equipment' => 'Rowing Machine', 'target_muscles' => ['Back', 'Legs', 'Cardio'], 'category_slug' => 'cardio', 'image' => 'https://images.unsplash.com/photo-1566241440091-ec10de8db2e1?w=400'],
        ];

        foreach ($exercises as $data) {
            $categoryId = $categories[$data['category_slug']] ?? null;
            unset($data['category_slug']);
            $data['category_id'] = $categoryId;
            Exercise::create($data);
        }
    }
}
