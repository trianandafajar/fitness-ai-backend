<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class RearDeltMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Standard Rear Delt Fly',
                'equipment' => 'Rear Delt Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Middle Trapezius', 'Infraspinatus', 'Teres Minor'],
                'description' => 'Sit facing the machine, chest against pad if available, grasp handles with arms extended or slightly bent. Open arms out to sides in an arc, squeeze shoulder blades together at peak contraction, then return with control.',
            ],
            [
                'name' => 'Single-Arm Rear Delt Fly',
                'equipment' => 'Rear Delt Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Rear Deltoids (unilateral)', 'Rhomboids', 'Infraspinatus', 'Core'],
                'description' => 'Perform the fly with one arm at a time while the other remains stationary. Corrects muscle imbalances and forces anti-rotation core engagement.',
            ],
            [
                'name' => 'Alternating Rear Delt Fly',
                'equipment' => 'Rear Delt Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Middle Trapezius', 'Core'],
                'description' => 'Pull one arm back at a time in a seesaw rhythm. Increases time under tension per side and challenges core stability.',
            ],
            [
                'name' => 'Pronated Grip Rear Delt Fly',
                'equipment' => 'Rear Delt Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Middle Trapezius'],
                'description' => 'Hold handles with palms facing down (pronated). Emphasizes the rhomboids and mid-traps along with rear delts.',
            ],
            [
                'name' => 'Neutral Grip Rear Delt Fly',
                'equipment' => 'Rear Delt Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Rear Deltoids', 'Infraspinatus', 'Teres Minor'],
                'description' => 'Grip handles with palms facing each other (if machine allows). Places the shoulder in external rotation, recruiting more rotator cuff muscles.',
            ],
            [
                'name' => 'Pause Rear Delt Fly',
                'equipment' => 'Rear Delt Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Middle Trapezius'],
                'description' => 'At the fully contracted position (arms back), hold for 1–2 seconds and squeeze shoulder blades. Eliminates momentum and enhances mind-muscle connection.',
            ],
            [
                'name' => 'Eccentric-Emphasis Rear Delt Fly',
                'equipment' => 'Rear Delt Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Infraspinatus'],
                'description' => 'Pull back quickly, then resist the forward return for 3–5 seconds, overloading the eccentric phase for posterior shoulder strength.',
            ],
            [
                'name' => 'Tempo Rear Delt Fly (3-1-3)',
                'equipment' => 'Rear Delt Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Middle Traps'],
                'description' => '3 seconds to pull back, 1-second squeeze, 3 seconds to return. Maximizes time under tension and control for muscle growth.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Rear Delt Fly',
                'equipment' => 'Rear Delt Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids'],
                'description' => 'Only move through the second half of the range, from mid-point to full contraction. Keeps constant tension on the rear delts at peak squeeze.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Rear Delt Fly',
                'equipment' => 'Rear Delt Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rear Deltoids', 'Infraspinatus', 'Teres Minor'],
                'description' => 'Work from the starting position to the mid-point, emphasizing the stretch and initial activation of the posterior shoulder.',
            ],
            [
                'name' => '21s Rear Delt Fly',
                'equipment' => 'Rear Delt Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Middle Trapezius'],
                'description' => '7 bottom-half reps, 7 top-half reps, then 7 full-range reps with no rest. Intense technique to fully exhaust the rear delts.',
            ],
            [
                'name' => 'Pulse Rear Delt Fly',
                'equipment' => 'Rear Delt Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids'],
                'description' => 'At the fully contracted position, perform small, rapid pulses without letting the arms move forward. Creates constant tension and metabolic burn.',
            ],
            [
                'name' => 'Isometric Hold Rear Delt Fly',
                'equipment' => 'Rear Delt Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Traps', 'Core'],
                'description' => 'Hold the arms in the fully retracted position for 10–30 seconds. Builds static endurance and stability in the posterior shoulder girdle.',
            ],
            [
                'name' => 'Explosive Rear Delt Fly',
                'equipment' => 'Rear Delt Machine',
                'category_slug' => 'power',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Middle Traps'],
                'description' => 'Use light to moderate weight, pull back as fast as possible, then return under control. Develops explosive power in horizontal shoulder extension.',
            ],
        ];

        $sourceDir = public_path('exercises/rear-delt-machine');
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
            $data['category_id'] = $categoryId;

            Exercise::create($data);
        }
    }
}