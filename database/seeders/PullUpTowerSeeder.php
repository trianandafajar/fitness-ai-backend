<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class PullUpTowerSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Pull-Up Tower Standard Pull-Up (Pronated)',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Rhomboids', 'Core', 'Forearms', 'Rear Deltoids', 'Traps'],
                'description' => 'Hang from bar with overhand grip. Pull chin above bar. Lower with control.',
            ],
            [
                'name' => 'Pull-Up Tower Chin-Up (Supinated)',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Brachialis', 'Core', 'Forearms', 'Rhomboids', 'Chest'],
                'description' => 'Underhand grip pull-up. Bicep-dominant and lat width.',
            ],
            [
                'name' => 'Pull-Up Tower Neutral Grip Pull-Up',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Brachialis', 'Biceps', 'Core', 'Forearms', 'Rhomboids'],
                'description' => 'Palms facing each other. Joint-friendly pulling. Balanced back and biceps.',
            ],
            [
                'name' => 'Pull-Up Tower Wide Grip Pull-Up',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats (Width)', 'Rhomboids', 'Teres Major', 'Rear Deltoids', 'Core', 'Forearms'],
                'description' => 'Wide overhand grip. Emphasizes upper lats and back width.',
            ],
            [
                'name' => 'Pull-Up Tower Narrow Grip Pull-Up',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats (Lower)', 'Biceps', 'Core', 'Forearms', 'Rhomboids', 'Brachialis'],
                'description' => 'Close grip overhand pull-up. Emphasizes lower lats and biceps.',
            ],
            [
                'name' => 'Pull-Up Tower Close Grip Chin-Up',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Brachialis', 'Core', 'Forearms', 'Chest'],
                'description' => 'Close underhand grip. Strongest bicep and lat pulling position.',
            ],
            [
                'name' => 'Pull-Up Tower Wide Grip Chin-Up',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Rhomboids', 'Core', 'Forearms', 'Chest'],
                'description' => 'Wide underhand grip. Upper back and bicep emphasis.',
            ],
            [
                'name' => 'Pull-Up Tower Commando Pull-Up (Rope Grip)',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Brachialis', 'Core', 'Forearms', 'Rhomboids', 'Stabilizers'],
                'description' => 'One hand over, one under. Alternating grip for variety.',
            ],
            [
                'name' => 'Pull-Up Tower Weighted Pull-Up',
                'equipment' => 'Pull-up Tower, Dip Belt',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Rhomboids', 'Core', 'Forearms', 'Rear Deltoids', 'Traps'],
                'description' => 'Add weight via dip belt. Increased lat and bicep resistance.',
            ],
            [
                'name' => 'Pull-Up Tower Weighted Chin-Up',
                'equipment' => 'Pull-up Tower, Dip Belt',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Brachialis', 'Core', 'Forearms', 'Rhomboids'],
                'description' => 'Weighted underhand pull-up. Bicep and lat strength.',
            ],
            [
                'name' => 'Pull-Up Tower Towel Pull-Up',
                'equipment' => 'Pull-up Tower, Towel',
                'category_slug' => 'strength',
                'target_muscles' => ['Forearms', 'Grip Muscles', 'Lats', 'Biceps', 'Core', 'Rhomboids'],
                'description' => 'Wrap towel around bar. Thicker grip. Forearm and grip emphasis.',
            ],
            [
                'name' => 'Pull-Up Tower Fat Grip Pull-Up',
                'equipment' => 'Pull-up Tower, Fat Grip Attachment',
                'category_slug' => 'strength',
                'target_muscles' => ['Forearms', 'Grip Muscles', 'Lats', 'Biceps', 'Core', 'Rhomboids'],
                'description' => 'Use fat grips. Increased forearm and grip demand.',
            ],
            [
                'name' => 'Pull-Up Tower L-Sit Pull-Up',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Core (Rectus Abdominis, Hip Flexors)', 'Rhomboids', 'Quads'],
                'description' => 'Pull-up while holding L-sit. Core and pulling combination.',
            ],
            [
                'name' => 'Pull-Up Tower L-Sit Chin-Up',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Core', 'Hip Flexors', 'Forearms', 'Rhomboids'],
                'description' => 'Chin-up with L-sit hold. Core and bicep combination.',
            ],
            [
                'name' => 'Pull-Up Tower Kipping Pull-Up',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Core', 'Biceps', 'Rhomboids', 'Hip Flexors', 'Shoulders'],
                'description' => 'Use momentum from hips to generate pull. Dynamic and cardio.',
            ],
            [
                'name' => 'Pull-Up Tower Strict Pull-Up (No Kip)',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Rhomboids', 'Core', 'Forearms', 'Rear Deltoids'],
                'description' => 'No momentum. Pure lat and bicep pulling strength.',
            ],
            [
                'name' => 'Pull-Up Tower Eccentric Pull-Up (Negatives)',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Rhomboids', 'Core', 'Forearms', 'Rear Deltoids'],
                'description' => 'Jump to top, lower extremely slow (4-5 sec). Eccentric overload.',
            ],
            [
                'name' => 'Pull-Up Tower Explosive Pull-Up',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Fast-Twitch Fibers', 'Core', 'Rhomboids', 'Traps'],
                'description' => 'Explosive pull-up. Power development for lats.',
            ],
            [
                'name' => 'Pull-Up Tower Clapping Pull-Up',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'plyometric',
                'target_muscles' => ['Lats', 'Biceps', 'Fast-Twitch Fibers', 'Core', 'Chest', 'Shoulders'],
                'description' => 'Explosive pull-up, release bar, clap, catch. Advanced plyometric.',
            ],
            [
                'name' => 'Pull-Up Tower One-Arm Pull-Up (Assisted)',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Core', 'Obliques', 'Forearms', 'Rhomboids'],
                'description' => 'Pull with one arm, other assisting. Unilateral pulling strength.',
            ],
            [
                'name' => 'Pull-Up Tower Archer Pull-Up',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Core', 'Obliques', 'Rhomboids', 'Forearms'],
                'description' => 'Pull with one arm while other arm straight. Unilateral pull.',
            ],
            [
                'name' => 'Pull-Up Tower Typewriter Pull-Up',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Core', 'Obliques', 'Rhomboids', 'Forearms'],
                'description' => 'Pull up, shift side to side at top. Dynamic lat and core.',
            ],
            [
                'name' => 'Pull-Up Tower Isometric Hold (Top)',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'stability',
                'target_muscles' => ['Lats', 'Biceps', 'Core', 'Forearms', 'Rhomboids', 'Traps'],
                'description' => 'Hold at top of pull-up. Static pulling endurance.',
            ],
            [
                'name' => 'Pull-Up Tower Isometric Hold (Mid-Contraction)',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'stability',
                'target_muscles' => ['Lats', 'Biceps', 'Core', 'Forearms', 'Rhomboids', 'Traps'],
                'description' => 'Hold at mid-pull-up position. Static lat and bicep strength.',
            ],
            [
                'name' => 'Pull-Up Tower Pause Reps (Top)',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Core', 'Forearms', 'Rhomboids', 'Traps'],
                'description' => 'Pull, hold 2-3 seconds at top. Increases TUT.',
            ],
            [
                'name' => 'Pull-Up Tower Slow Tempo (3-1-3)',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Core', 'Forearms', 'Rhomboids', 'Traps'],
                'description' => '3 sec pull, 1 sec hold, 3 sec lower. Time under tension.',
            ],
            [
                'name' => 'Pull-Up Tower Drop Set',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Core', 'Forearms', 'Rhomboids', 'Traps'],
                'description' => 'Start weighted, pull to failure, remove weight, continue. Dropset.',
            ],
            [
                'name' => 'Pull-Up Tower Rest-Pause Set',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Core', 'Forearms', 'Rhomboids', 'Traps'],
                'description' => 'Pull to failure, rest 10 sec, continue. Density training.',
            ],
            [
                'name' => 'Pull-Up Tower Isometric Dead Hang',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'stability',
                'target_muscles' => ['Lats', 'Forearms', 'Grip Muscles', 'Shoulders', 'Core', 'Traps'],
                'description' => 'Hang from bar with straight arms. Static grip and lat endurance.',
            ],
            [
                'name' => 'Pull-Up Tower Active Hang (Scapular Pull)',
                'equipment' => 'Pull-up Tower',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Rhomboids', 'Traps', 'Core', 'Forearms', 'Serratus Anterior'],
                'description' => 'Hang, depress and retract scapula without bending elbows. Scapular strength.',
            ],
        ];

        $sourceDir = public_path('execises/pull-up-tower');
        $files = glob($sourceDir . '/*.png');
        sort($files);

        foreach ($execises as $i => $data) {
            $sourceFile = $files[$i] ?? null;

            if ($sourceFile) {
                $imagePath = Storage::disk('public')->putFile('exercises', new File($sourceFile));
                $data['image'] = $imagePath;
            }

            $categoryId = $categories[$data['category_slug']] ?? null;
            unset($data['category_slug']);
            $data['category_id'] = $categoryId;

            Exercise::create($data);
        }
    }
}
