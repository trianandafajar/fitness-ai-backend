<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ChainsSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Chains Bench Press',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'],
                'description' => 'Attach chains to barbell ends. Press with accommodating resistance. Heavier at lockout.',
            ],
            [
                'name' => 'Chains Squat',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'],
                'description' => 'Chains on barbell ends. Squat with progressive resistance. Heavy at top.',
            ],
            [
                'name' => 'Chains Deadlift',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Forearms', 'Lats'],
                'description' => 'Chains on barbell. Deadlift with accommodating resistance. Heavy at lockout.',
            ],
            [
                'name' => 'Chains Overhead Press',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Core', 'Traps', 'Forearms'],
                'description' => 'Chains on barbell. Press with increasing resistance. Overload at top.',
            ],
            [
                'name' => 'Chains Pull-Up',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Core', 'Rhomboids', 'Forearms', 'Rear Deltoids'],
                'description' => 'Hang chains from waist or belt. Weighted pull-ups with dynamic load.',
            ],
            [
                'name' => 'Chains Dip',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'],
                'description' => 'Chains hanging from dip belt. Weighted dips with dynamic resistance.',
            ],
            [
                'name' => 'Chains Barbell Row',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Hamstrings', 'Erector Spinae', 'Traps'],
                'description' => 'Chains on barbell. Bent-over rows with accommodating resistance.',
            ],
            [
                'name' => 'Chains Romanian Deadlift (RDL)',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core', 'Traps', 'Forearms'],
                'description' => 'Chains on barbell. RDL with progressive resistance. Heavy at top.',
            ],
            [
                'name' => 'Chains Hip Thrust',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Flexors', 'Lower Back'],
                'description' => 'Chains across hips. Hip thrust with accommodating resistance.',
            ],
            [
                'name' => 'Chains Lunges',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'],
                'description' => 'Barbell with chains. Walking lunges with dynamic resistance.',
            ],
            [
                'name' => 'Chains Good Morning',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core', 'Traps', 'Forearms'],
                'description' => 'Chains on barbell. Good mornings with accommodating resistance.',
            ],
            [
                'name' => 'Chains Farmer\'s Walk',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Core', 'Quadriceps', 'Glutes', 'Forearms', 'Traps', 'Calves', 'Stabilizers'],
                'description' => 'Carry chains in hands or draped over shoulders. Loaded carry.',
            ],
            [
                'name' => 'Chains Yoke Carry',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Core', 'Quadriceps', 'Glutes', 'Calves', 'Traps', 'Stabilizers', 'Forearms'],
                'description' => 'Drape chains over shoulders. Yoke carry variation with dynamic load.',
            ],
            [
                'name' => 'Chains Band Resisted Bench Press',
                'equipment' => 'Chains, Bands',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'],
                'description' => 'Combine chains and bands. Maximal accommodating resistance.',
            ],
            [
                'name' => 'Chains Band Resisted Squat',
                'equipment' => 'Chains, Bands',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'],
                'description' => 'Chains + bands on barbell. Extreme accommodating resistance.',
            ],
            [
                'name' => 'Chains Isometric Hold (Deadlift Lockout)',
                'equipment' => 'Chains',
                'category_slug' => 'stability',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Forearms'],
                'description' => 'Hold deadlift lockout with chains. Static posterior chain strength.',
            ],
            [
                'name' => 'Chains Isometric Hold (Squat Bottom)',
                'equipment' => 'Chains',
                'category_slug' => 'stability',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Calves', 'Stabilizers'],
                'description' => 'Hold squat bottom position with chains. Static leg strength.',
            ],
            [
                'name' => 'Chains Isometric Hold (Press Top)',
                'equipment' => 'Chains',
                'category_slug' => 'stability',
                'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Upper Chest', 'Traps', 'Forearms'],
                'description' => 'Hold overhead press lockout with chains. Static pressing strength.',
            ],
            [
                'name' => 'Chains Plate Drag (Floor Pull)',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Core', 'Quadriceps', 'Glutes', 'Forearms', 'Traps', 'Lats', 'Hamstrings'],
                'description' => 'Drag weighted chains across floor. Full-body pulling and dragging.',
            ],
            [
                'name' => 'Chains Sled Drag',
                'equipment' => 'Chains, Sled',
                'category_slug' => 'strength',
                'target_muscles' => ['Core', 'Quadriceps', 'Glutes', 'Calves', 'Hamstrings', 'Erector Spinae'],
                'description' => 'Chains attached to sled. Heavy dragging with dynamic load.',
            ],
            [
                'name' => 'Chains Weighted Vest Carry',
                'equipment' => 'Chains, Weighted Vest',
                'category_slug' => 'strength',
                'target_muscles' => ['Core', 'Quadriceps', 'Glutes', 'Calves', 'Traps', 'Stabilizers'],
                'description' => 'Chains over weighted vest. Additional load for carries.',
            ],
            [
                'name' => 'Chains Sandbag Squat',
                'equipment' => 'Chains, Sandbag',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Calves', 'Stabilizers'],
                'description' => 'Chains over sandbag. Squat with dynamic and offset load.',
            ],
            [
                'name' => 'Chains Atlas Stone Lift',
                'equipment' => 'Chains, Atlas Stone',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Erector Spinae', 'Traps', 'Biceps', 'Forearms'],
                'description' => 'Chains over stone. Stone lifting with accommodating resistance.',
            ],
            [
                'name' => 'Chains Tire Flip',
                'equipment' => 'Chains, Tire',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Core', 'Chest', 'Shoulders', 'Triceps', 'Traps'],
                'description' => 'Chains draped over tire. Tire flip with added dynamic resistance.',
            ],
            [
                'name' => 'Chains Cable Machine Attachment',
                'equipment' => 'Chains, Cable Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Varies with exercise', 'Core', 'Stabilizers'],
                'description' => 'Attach chains to cable for accommodating resistance on cable execises.',
            ],
            [
                'name' => 'Chains Dips (Weighted with Chains)',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'],
                'description' => 'Chains hanging from dip belt. Progressive resistance dips.',
            ],
            [
                'name' => 'Chains Reverse Hyperextension',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors', 'Lats'],
                'description' => 'Chains around ankles. Reverse hyper with dynamic load.',
            ],
            [
                'name' => 'Chains Leg Curl (Standing)',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'],
                'description' => 'Chains around ankles. Standing hamstring curl with dynamic resistance.',
            ],
            [
                'name' => 'Chains Bicep Curl',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Brachialis', 'Shoulders'],
                'description' => 'Chains on barbell or dumbbell. Curl with accommodating resistance.',
            ],
            [
                'name' => 'Chains Triceps Extension',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Shoulders', 'Core', 'Forearms', 'Lats', 'Chest'],
                'description' => 'Chains on bar. Skull crushers with dynamic resistance.',
            ],
            [
                'name' => 'Chains Shrugs',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Upper Trapezius', 'Levator Scapulae', 'Forearms', 'Core', 'Rhomboids'],
                'description' => 'Chains draped over shoulders. Shrugs with dynamic load.',
            ],
            [
                'name' => 'Chains Barbell Curl (EZ Bar)',
                'equipment' => 'Chains',
                'category_slug' => 'strength',
                'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Brachialis', 'Shoulders'],
                'description' => 'Chains on EZ bar. Curl with progressive resistance.',
            ],
            [
                'name' => 'Chains Plate Pinch Carry',
                'equipment' => 'Chains, Weight Plates',
                'category_slug' => 'strength',
                'target_muscles' => ['Forearms', 'Grip Muscles', 'Thenar Muscles', 'Core', 'Traps'],
                'description' => 'Pinch plates while chains add load. Grip and pinch strength.',
            ],
        ];

        $sourceDir = public_path('execises/chains');
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
