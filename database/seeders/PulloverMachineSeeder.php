<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class PulloverMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Pullover Machine Standard Pullover', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest (Pectoralis Major)', 'Triceps (Long Head)', 'Core', 'Rhomboids', 'Serratus Anterior'], 'description' => 'Sit or lie on machine. Grip handles overhead. Pull down in arc toward hips. Squeeze lats at bottom.'],
            ['name' => 'Pullover Machine Wide Grip', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats (Stretch)', 'Rhomboids', 'Teres Major', 'Core', 'Serratus Anterior', 'Chest'], 'description' => 'Wide grip on handles. Pull down toward hips. Emphasizes lat stretch and back width.'],
            ['name' => 'Pullover Machine Narrow Grip', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Triceps (Long Head)', 'Chest (Lower)', 'Lats', 'Core', 'Biceps', 'Forearms'], 'description' => 'Narrow grip on handles. Pull down toward hips. More triceps and chest involvement.'],
            ['name' => 'Pullover Machine Neutral Grip (Palms Facing)', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Triceps', 'Chest', 'Core', 'Biceps', 'Rhomboids', 'Serratus Anterior'], 'description' => 'Palms facing each other. Pullover motion. Balanced lat and triceps engagement.'],
            ['name' => 'Pullover Machine Pronated Grip (Overhand)', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Teres Major', 'Core', 'Serratus Anterior', 'Rear Deltoids'], 'description' => 'Palms facing down. Pull down to hips. Lats and upper back emphasis.'],
            ['name' => 'Pullover Machine Supinated Grip (Underhand)', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Brachialis', 'Triceps', 'Chest', 'Core', 'Serratus Anterior'], 'description' => 'Palms facing up. Pullover motion. Bicep and lat emphasis.'],
            ['name' => 'Pullover Machine Isometric Hold (Bottom)', 'equipment' => 'Pullover Machine', 'category_slug' => 'core', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Core', 'Rhomboids', 'Serratus Anterior', 'Forearms'], 'description' => 'Pull handles to hips and hold. Static lat and chest contraction.'],
            ['name' => 'Pullover Machine Isometric Hold (Top)', 'equipment' => 'Pullover Machine', 'category_slug' => 'core', 'target_muscles' => ['Lats (Stretched)', 'Chest', 'Core', 'Serratus Anterior', 'Shoulders', 'Forearms'], 'description' => 'Hold at top position with arms extended. Static stretch and engagement.'],
            ['name' => 'Pullover Machine Pause Reps (Peak Contraction)', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Core', 'Rhomboids', 'Serratus Anterior', 'Forearms'], 'description' => 'Pull down, hold 2-3 seconds at bottom. Increases time under tension.'],
            ['name' => 'Pullover Machine Slow Tempo (3-1-3)', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Core', 'Rhomboids', 'Serratus Anterior', 'Forearms'], 'description' => '3 sec pull, 1 sec hold, 3 sec release. Time under tension pullover.'],
            ['name' => 'Pullover Machine Eccentric Focus (Slow Negative)', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Core', 'Rhomboids', 'Serratus Anterior', 'Forearms'], 'description' => 'Pull quickly, release extremely slow (4-5 sec). Eccentric overload for lats and chest.'],
            ['name' => 'Pullover Machine Explosive Concentric', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Fast-Twitch Fibers', 'Core', 'Serratus Anterior'], 'description' => 'Explosive pull, slow controlled release. Power development for pullover.'],
            ['name' => 'Pullover Machine Drop Set', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Core', 'Rhomboids', 'Serratus Anterior', 'Forearms'], 'description' => 'Start heavy, pull to failure, reduce weight, continue. Hypertrophy dropset.'],
            ['name' => 'Pullover Machine Rest-Pause Set', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Core', 'Rhomboids', 'Serratus Anterior', 'Forearms'], 'description' => 'Pull to failure, rest 10 sec, continue. Density training for lats and chest.'],
            ['name' => 'Pullover Machine Single-Arm Pullover', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Core', 'Obliques', 'Serratus Anterior', 'Rhomboids'], 'description' => 'Pull with one arm only. Corrects imbalances and challenges core stability.'],
            ['name' => 'Pullover Machine Single-Arm Pause Reps', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Core', 'Obliques', 'Serratus Anterior', 'Rhomboids'], 'description' => 'Single-arm with pause at peak contraction. Unilateral time under tension.'],
            ['name' => 'Pullover Machine Partial Reps (Bottom Half)', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Core', 'Rhomboids', 'Serratus Anterior', 'Forearms'], 'description' => 'Partial reps in bottom half. Emphasizes peak contraction and squeeze.'],
            ['name' => 'Pullover Machine Partial Reps (Top Half)', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats (Stretched)', 'Chest', 'Core', 'Serratus Anterior', 'Shoulders', 'Forearms'], 'description' => 'Partial reps in top half. Emphasizes stretch and lat elongation.'],
            ['name' => 'Pullover Machine 21s', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Core', 'Rhomboids', 'Serratus Anterior', 'Forearms'], 'description' => '7 bottom half, 7 top half, 7 full reps. Complete pullover development.'],
            ['name' => 'Pullover Machine Pulse Reps (Small Range)', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Core', 'Rhomboids', 'Serratus Anterior', 'Forearms'], 'description' => 'Small pulsing movements at peak contraction. Builds pump and endurance.'],
            ['name' => 'Pullover Machine 1.5 Reps', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Core', 'Rhomboids', 'Serratus Anterior', 'Forearms'], 'description' => 'Full pull, half release, full pull again. Extended time under tension.'],
            ['name' => 'Pullover Machine Straight Arm (Locked Elbows)', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Core', 'Serratus Anterior', 'Rhomboids', 'Rear Deltoids'], 'description' => 'Keep arms locked straight. Pull down using only lat and chest contraction.'],
            ['name' => 'Pullover Machine Bent Arm (Elbows Flexed)', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Triceps (Long Head)', 'Lats', 'Chest', 'Core', 'Biceps', 'Forearms'], 'description' => 'Allow elbows to bend during pullover. More triceps and arm involvement.'],
            ['name' => 'Pullover Machine Seated Vertical Pullover', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Core', 'Serratus Anterior', 'Triceps', 'Rhomboids'], 'description' => 'Seated position. Pull handles from overhead to chest. Vertical pullover variation.'],
            ['name' => 'Pullover Machine Lying Horizontal Pullover', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Core', 'Serratus Anterior', 'Rhomboids', 'Forearms'], 'description' => 'Lying on bench or machine pad. Pull handles overhead to hips. Traditional pullover.'],
            ['name' => 'Pullover Machine Cable Cross Pullover', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Core', 'Serratus Anterior', 'Rhomboids', 'Pectoralis Major'], 'description' => 'Cross grip (arms crossed). Pullover variation with added chest stretch.'],
            ['name' => 'Pullover Machine Band Resisted', 'equipment' => 'Pullover Machine, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Core', 'Rhomboids', 'Serratus Anterior', 'Forearms'], 'description' => 'Attach band for variable resistance. Accommodating resistance pullover.'],
            ['name' => 'Pullover Machine Isometric Lat Stretch (Top)', 'equipment' => 'Pullover Machine', 'category_slug' => 'core', 'target_muscles' => ['Lats (Stretched)', 'Chest', 'Core', 'Serratus Anterior', 'Shoulders'], 'description' => 'Hold stretched position at top for 30+ seconds. Mobility and lat lengthening.'],
            ['name' => 'Pullover Machine Isometric Lat Squeeze (Bottom)', 'equipment' => 'Pullover Machine', 'category_slug' => 'core', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Core', 'Rhomboids', 'Serratus Anterior'], 'description' => 'Hold contracted position at bottom for 30+ seconds. Isometric lat strength.'],
            ['name' => 'Pullover Machine Scapular Retraction Pullover', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Rhomboids', 'Middle Traps', 'Rear Deltoids', 'Core', 'Lats', 'Serratus Anterior'], 'description' => 'Focus on pulling with shoulder blades. Scapular retraction emphasis.'],
            ['name' => 'Pullover Machine Dumbbell Style (One Handle)', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Core', 'Obliques', 'Serratus Anterior', 'Rhomboids'], 'description' => 'Grip center handle like dumbbell pullover. Traditional pullover feel.'],
            ['name' => 'Pullover Machine Cable Pulley Style', 'equipment' => 'Pullover Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Core', 'Rhomboids', 'Serratus Anterior', 'Forearms'], 'description' => 'Attach cable handles. Unilateral or bilateral pullover with cable resistance.'],
            ['name' => 'Pullover Machine Plate Loaded Pinch Grip', 'equipment' => 'Pullover Machine, Weight Plate', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Lats', 'Chest', 'Triceps', 'Core', 'Rhomboids'], 'description' => 'Pinch weight plates while pulling. Adds grip and forearm challenge.'],
            ['name' => 'Pullover Machine Towel Grip Pullover', 'equipment' => 'Pullover Machine, Towel', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Lats', 'Chest', 'Triceps', 'Core', 'Rhomboids'], 'description' => 'Wrap towel around handles. Thicker grip pullover. Increased forearm and grip demand.'],
        ];

        $sourceDir = public_path('execises/pullover-machine');
        $files = glob($sourceDir . '/*.png');
        sort($files);

        foreach ($exercises as $i => $data) {
            $sourceFile = $files[$i] ?? null;

            if ($sourceFile) {
                $imagePath = Storage::disk('public')->putFile('exercises', new File($sourceFile));
                $data['image'] = $imagePath;
            }

            $categoryId = $categories[$data['category_slug']] ?? null;
            unset($data['category_slug']);

            Exercise::create([
                'name' => $data['name'],
                'equipment' => $data['equipment'],
                'category_id' => $categoryId,
                'target_muscles' => $data['target_muscles'],
                'description' => $data['description'],
                'image' => $data['image'] ?? null,
            ]);
        }
    }
}
