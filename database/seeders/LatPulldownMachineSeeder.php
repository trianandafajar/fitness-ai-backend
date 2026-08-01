<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class LatPulldownMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Wide Grip Front Lat Pulldown',
                'equipment' => 'Lat Pulldown Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Middle Trapezius', 'Biceps', 'Rear Deltoids'],
                'description' => 'Grip the bar with hands wider than shoulder-width, palms forward. Lean back slightly, pull bar to upper chest while squeezing shoulder blades, then return with control.',
            ],
            [
                'name' => 'Wide Grip Behind-the-Neck Pulldown',
                'equipment' => 'Lat Pulldown Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Middle Traps', 'Rear Deltoids', 'Biceps'],
                'description' => 'Use a wide overhand grip, pull bar behind the neck to base of neck level. Requires good shoulder mobility; do not bounce.',
            ],
            [
                'name' => 'Close Grip V-Bar Pulldown',
                'equipment' => 'Lat Pulldown Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Biceps', 'Middle Back'],
                'description' => 'Attach a V-bar handle, palms facing each other. Pull to mid-chest, keeping elbows close to the body. Targets lower lats and biceps.',
            ],
            [
                'name' => 'Reverse Grip (Supinated) Pulldown',
                'equipment' => 'Lat Pulldown Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Brachialis', 'Rhomboids'],
                'description' => 'Use shoulder-width underhand grip (palms facing you). Pull to lower chest, emphasizing biceps and lower lats. Lean slightly back.',
            ],
            [
                'name' => 'Neutral Grip (Parallel) Pulldown',
                'equipment' => 'Lat Pulldown Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Brachialis', 'Middle Traps'],
                'description' => 'Attach a parallel grip handle (palms facing each other). Pull down, driving elbows down and back. Good for shoulder health.',
            ],
            [
                'name' => 'Single-Arm Lat Pulldown',
                'equipment' => 'Lat Pulldown Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Rhomboids', 'Core'],
                'description' => 'Use a single handle, pull with one arm while maintaining torso stability. Corrects imbalances, engages core to resist rotation.',
            ],
            [
                'name' => 'Alternating Single-Arm Pulldown',
                'equipment' => 'Lat Pulldown Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Core'],
                'description' => 'Pull one arm at a time in a seesaw rhythm. Keeps constant tension on back and demands core anti-rotation.',
            ],
            [
                'name' => 'Straight-Arm Pulldown (Rope or Bar)',
                'equipment' => 'Lat Pulldown Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Latissimus Dorsi', 'Triceps Long Head', 'Serratus Anterior', 'Core'],
                'description' => 'Stand facing high pulley, arms straight holding a rope or bar. Pull down in an arc, squeezing lats at the bottom. Isolates lats without biceps.',
            ],
            [
                'name' => 'Kneeling Lat Pulldown (Rope)',
                'equipment' => 'Lat Pulldown Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Core', 'Glutes'],
                'description' => 'Kneel in front of the machine holding a rope. Pull down while keeping torso upright, squeeze lats at bottom. Engages more stabilizers.',
            ],
            [
                'name' => 'Underhand Narrow Grip Pulldown',
                'equipment' => 'Lat Pulldown Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Brachialis'],
                'description' => 'Use a narrow underhand grip (hands 6-8 inches apart). Pull to lower chest, keeping elbows forward. Heavy bicep recruitment.',
            ],
            [
                'name' => 'Pause Lat Pulldown',
                'equipment' => 'Lat Pulldown Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Biceps'],
                'description' => 'At the bar-to-chest position, pause for 1-2 seconds and squeeze the back muscles. Eliminates momentum, builds contraction strength.',
            ],
            [
                'name' => 'Eccentric-Emphasis Lat Pulldown',
                'equipment' => 'Lat Pulldown Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Rhomboids'],
                'description' => 'Pull down quickly, then take 3-5 seconds to slowly return the bar to the start. Overloads the eccentric phase for muscle growth.',
            ],
            [
                'name' => 'Tempo Lat Pulldown (3-1-3)',
                'equipment' => 'Lat Pulldown Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Rhomboids'],
                'description' => '3 seconds to pull down, 1-second squeeze, 3 seconds to return. Increases time under tension for back development.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Lat Pulldown',
                'equipment' => 'Lat Pulldown Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids'],
                'description' => 'Only move from the fully stretched overhead position to the midpoint. Emphasizes the initial pull and lat stretch.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Lat Pulldown',
                'equipment' => 'Lat Pulldown Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps'],
                'description' => 'Perform reps only from the midpoint to full contraction (bar to chest). Keeps constant tension on the lats.',
            ],
            [
                'name' => '21s Lat Pulldown',
                'equipment' => 'Lat Pulldown Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Rhomboids'],
                'description' => '7 bottom-half reps, 7 top-half reps, then 7 full-range reps with no rest. Intense metabolic stress for back muscles.',
            ],
            [
                'name' => 'Pulse Lat Pulldown',
                'equipment' => 'Lat Pulldown Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps'],
                'description' => 'At the bottom contracted position, perform small rapid pulses without letting the bar rise. Creates a deep burn.',
            ],
            [
                'name' => 'Isometric Hold Lat Pulldown',
                'equipment' => 'Lat Pulldown Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Core'],
                'description' => 'Pull bar to chest and hold for 10-30 seconds. Builds static back strength and muscular endurance.',
            ],
        ];

        $sourceDir = public_path('execises/lat-pulldown-machine');
        $files = glob($sourceDir . '/*.png');
        sort($files);

        foreach ($execises as $i => $data) {
            $sourceFile = $files[$i] ?? null;

            if ($sourceFile) {
                $imagePath = Storage::disk('public')->putFile('execises', new File($sourceFile));
                $data['image'] = $imagePath;
            }

            $categoryId = $categories[$data['category_slug']] ?? null;
            unset($data['category_slug']);
            $data['category_id'] = $categoryId;

            Exercise::create($data);
        }
    }
}
