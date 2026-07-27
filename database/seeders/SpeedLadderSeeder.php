<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class SpeedLadderSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Speed Ladder One-Foot Run (High Knees)',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hip Flexors', 'Quadriceps', 'Calves', 'Core', 'Cardio', 'Glutes'],
                'description' => 'Run through ladder landing one foot per square. High knees. Speed and coordination.',
            ],
            [
                'name' => 'Speed Ladder Two-Foot Run (Icky Shuffle)',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Hip Flexors', 'Cardio', 'Stabilizers'],
                'description' => 'Two feet in each square. Rhythmic agility and footwork.',
            ],
            [
                'name' => 'Speed Ladder Lateral Shuffle',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Gluteus Medius', 'Adductors', 'Calves', 'Core', 'Cardio', 'Quadriceps'],
                'description' => 'Shuffle sideways through ladder. Lateral agility and hip stabilizers.',
            ],
            [
                'name' => 'Speed Ladder In-Out Drill (Scissors)',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Adductors', 'Core', 'Cardio', 'Hip Flexors'],
                'description' => 'Alternate feet in and out of squares. Footwork and coordination.',
            ],
            [
                'name' => 'Speed Ladder Single-Leg Hops',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Stabilizers', 'Cardio'],
                'description' => 'Hop through ladder on one foot. Unilateral balance and power.',
            ],
            [
                'name' => 'Speed Ladder Double-Leg Hops',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Cardio', 'Fast-Twitch Fibers'],
                'description' => 'Hop with both feet through ladder. Plyometric agility.',
            ],
            [
                'name' => 'Speed Ladder Lateral Hops',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Adductors', 'Abductors', 'Core', 'Cardio', 'Stabilizers'],
                'description' => 'Hop laterally in and out of ladder. Side-to-side power.',
            ],
            [
                'name' => 'Speed Ladder Cross-Overs',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Hip Rotators', 'Core', 'Adductors', 'Cardio', 'Stabilizers'],
                'description' => 'Cross feet in front and behind. Coordination and hip mobility.',
            ],
            [
                'name' => 'Speed Ladder High Knee March',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hip Flexors', 'Quadriceps', 'Core', 'Calves', 'Cardio', 'Glutes'],
                'description' => 'March through ladder with high knees. Hip flexor and coordination.',
            ],
            [
                'name' => 'Speed Ladder Lateral High Knees',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hip Flexors', 'Gluteus Medius', 'Core', 'Calves', 'Cardio', 'Quadriceps'],
                'description' => 'High knees moving laterally. Agility and hip strength.',
            ],
            [
                'name' => 'Speed Ladder Jumping Jacks (In-Out)',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Adductors', 'Abductors', 'Core', 'Cardio', 'Quadriceps'],
                'description' => 'Jump feet in and out of ladder squares. Plyometric cardio.',
            ],
            [
                'name' => 'Speed Ladder Skipping (Boxer Skip)',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Core', 'Hip Flexors', 'Cardio', 'Quadriceps', 'Stabilizers'],
                'description' => 'Skip through ladder. Rhythmic agility and footwork.',
            ],
            [
                'name' => 'Speed Ladder Forward-Backward Run',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Calves', 'Core', 'Cardio', 'Glutes'],
                'description' => 'Run forward then backward in ladder. Agility and coordination.',
            ],
            [
                'name' => 'Speed Ladder Single-Leg Forward Hops',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Stabilizers', 'Cardio'],
                'description' => 'Hop forward on one leg through ladder. Unilateral power.',
            ],
            [
                'name' => 'Speed Ladder Double-Leg Lateral Hops',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Adductors', 'Abductors', 'Core', 'Cardio', 'Stabilizers'],
                'description' => 'Both feet hop laterally through ladder. Plyometric lateral power.',
            ],
            [
                'name' => 'Speed Ladder Icky Shuffle (In-Out-In)',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Hip Flexors', 'Cardio', 'Stabilizers'],
                'description' => 'Pattern: in, out, in. Classic agility footwork drill.',
            ],
            [
                'name' => 'Speed Ladder Lateral In-Out',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Adductors', 'Abductors', 'Core', 'Cardio', 'Hip Rotators'],
                'description' => 'Lateral movement with in-out footwork. Agility and coordination.',
            ],
            [
                'name' => 'Speed Ladder Carioca (Grapevine)',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hip Rotators', 'Calves', 'Core', 'Adductors', 'Cardio', 'Stabilizers'],
                'description' => 'Cross-over step pattern. Hip mobility and coordination.',
            ],
            [
                'name' => 'Speed Ladder T-Drill (Ladder Variation)',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Hip Flexors', 'Cardio', 'Stabilizers'],
                'description' => 'T-shaped movement pattern. Agility and change of direction.',
            ],
            [
                'name' => 'Speed Ladder 5-Drill (One Foot Each Square)',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Hip Flexors', 'Core', 'Quadriceps', 'Cardio', 'Glutes'],
                'description' => 'Five quick foot contacts per square. Speed and cadence.',
            ],
            [
                'name' => 'Speed Ladder Zig-Zag Run',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Adductors', 'Abductors', 'Core', 'Cardio', 'Quadriceps'],
                'description' => 'Run through ladder in zig-zag pattern. Lateral agility.',
            ],
            [
                'name' => 'Speed Ladder Backward Run',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hamstrings', 'Glutes', 'Calves', 'Core', 'Cardio', 'Quadriceps'],
                'description' => 'Run backward through ladder. Posterior chain and coordination.',
            ],
            [
                'name' => 'Speed Ladder Depth Jump (Over Ladder)',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Cardio', 'Fast-Twitch Fibers'],
                'description' => 'Step off ladder, jump over next square. Reactive power.',
            ],
            [
                'name' => 'Speed Ladder Split Squat Jumps',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Cardio', 'Stabilizers'],
                'description' => 'Lunge jumps through ladder. Plyometric unilateral power.',
            ],
            [
                'name' => 'Speed Ladder Lateral Bound',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Gluteus Medius', 'Calves', 'Adductors', 'Core', 'Cardio', 'Stabilizers'],
                'description' => 'Bound side to side over ladder. Lateral power and stability.',
            ],
            [
                'name' => 'Speed Ladder Pogo Hops',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Cardio', 'Fast-Twitch Fibers', 'Stabilizers'],
                'description' => 'Quick springy hops through ladder. Explosive calf power.',
            ],
            [
                'name' => 'Speed Ladder Bounds (Forward)',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Calves', 'Core', 'Cardio', 'Quadriceps'],
                'description' => 'Explosive forward leaps through ladder. Power and speed.',
            ],
            [
                'name' => 'Speed Ladder Cross-Behind Step',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hip Rotators', 'Calves', 'Core', 'Adductors', 'Cardio', 'Stabilizers'],
                'description' => 'Step behind body while moving laterally. Coordination and balance.',
            ],
            [
                'name' => 'Speed Ladder Hopscotch',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Cardio', 'Hip Flexors', 'Stabilizers'],
                'description' => 'Hopscotch pattern through ladder. Fun agility and coordination.',
            ],
            [
                'name' => 'Speed Ladder Diagonal Run',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Adductors', 'Abductors', 'Core', 'Cardio', 'Quadriceps'],
                'description' => 'Run diagonally through ladder. Multi-directional agility.',
            ],
            [
                'name' => 'Speed Ladder Interval Sprints',
                'equipment' => 'Speed Ladder',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Cardio', 'Hip Flexors'],
                'description' => 'Alternate sprint and rest periods. HIIT agility conditioning.',
            ],
        ];

        $sourceDir = public_path('execises/speed-ladder');
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
