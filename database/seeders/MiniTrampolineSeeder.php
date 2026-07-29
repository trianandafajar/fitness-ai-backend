<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class MiniTrampolineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Mini Trampoline Basic Bounce',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Cardio', 'Stabilizers'],
                'description' => 'Stand on trampoline. Gentle rhythmic bounces. Low-impact cardio.',
            ],
            [
                'name' => 'Mini Trampoline High Bounce',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Cardio', 'Fast-Twitch Fibers'],
                'description' => 'Explosive high jumps. Plyometric cardio and power.',
            ],
            [
                'name' => 'Mini Trampoline Single-Leg Bounce',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Stabilizers', 'Cardio'],
                'description' => 'Bounce on one leg. Unilateral balance and strength.',
            ],
            [
                'name' => 'Mini Trampoline Alternating Single-Leg Bounce',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Hip Flexors', 'Cardio'],
                'description' => 'Alternate bouncing on each leg. Coordination and balance.',
            ],
            [
                'name' => 'Mini Trampoline Running in Place',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Hip Flexors', 'Core', 'Cardio', 'Glutes'],
                'description' => 'Run in place on trampoline. Cardio endurance.',
            ],
            [
                'name' => 'Mini Trampoline High Knee Run',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hip Flexors', 'Quadriceps', 'Core', 'Calves', 'Cardio', 'Glutes'],
                'description' => 'High knee running on trampoline. Hip flexor and core emphasis.',
            ],
            [
                'name' => 'Mini Trampoline Butt Kicker',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hamstrings', 'Glutes', 'Calves', 'Core', 'Cardio', 'Hip Flexors'],
                'description' => 'Kick heels to glutes while bouncing. Hamstring and glute emphasis.',
            ],
            [
                'name' => 'Mini Trampoline Jumping Jacks',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Adductors', 'Abductors', 'Core', 'Cardio', 'Quadriceps'],
                'description' => 'Jumping jacks on trampoline. Full-body cardio and coordination.',
            ],
            [
                'name' => 'Mini Trampoline Side-to-Side Jumps',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Adductors', 'Abductors', 'Core', 'Cardio', 'Quadriceps'],
                'description' => 'Jump side to side. Lateral agility and hip stabilizers.',
            ],
            [
                'name' => 'Mini Trampoline Forward-Backward Jumps',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Cardio', 'Hamstrings', 'Glutes'],
                'description' => 'Jump forward and backward. Agility and coordination.',
            ],
            [
                'name' => 'Mini Trampoline Tuck Jump',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Hip Flexors', 'Cardio', 'Fast-Twitch Fibers'],
                'description' => 'Jump and tuck knees to chest. Plyometric core and power.',
            ],
            [
                'name' => 'Mini Trampoline Star Jump',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Adductors', 'Core', 'Cardio', 'Shoulders'],
                'description' => 'Jump with arms and legs spread. Full-body plyometric.',
            ],
            [
                'name' => 'Mini Trampoline Pike Jump',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Core', 'Hip Flexors', 'Hamstrings', 'Calves', 'Cardio', 'Quadriceps'],
                'description' => 'Jump and reach toes. Core and hamstring mobility.',
            ],
            [
                'name' => 'Mini Trampoline Twist Jump (180°)',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Core', 'Obliques', 'Calves', 'Quadriceps', 'Cardio', 'Stabilizers'],
                'description' => 'Jump and twist 180°. Rotational core and coordination.',
            ],
            [
                'name' => 'Mini Trampoline Squat Bounce',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Cardio', 'Hamstrings'],
                'description' => 'Bounce in squat position. Lower body endurance.',
            ],
            [
                'name' => 'Mini Trampoline Sumo Squat Bounce',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Adductors', 'Core', 'Calves', 'Cardio'],
                'description' => 'Wide stance squat bounce. Inner thigh and glute emphasis.',
            ],
            [
                'name' => 'Mini Trampoline Lunge Bounce',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Cardio'],
                'description' => 'Alternate lunges while bouncing. Unilateral leg work.',
            ],
            [
                'name' => 'Mini Trampoline Cross-Country Skiing',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Core', 'Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Cardio'],
                'description' => 'Alternate forward-backward arms and legs. Full-body coordination.',
            ],
            [
                'name' => 'Mini Trampoline Speed Bounce',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Core', 'Quadriceps', 'Cardio', 'Fast-Twitch Fibers', 'Stabilizers'],
                'description' => 'Maximum speed light bounces. HIIT cardio and agility.',
            ],
            [
                'name' => 'Mini Trampoline Iso Hold (Bounce with Stop)',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Core', 'Quadriceps', 'Cardio', 'Stabilizers', 'Glutes'],
                'description' => 'Bounce, stop and hold on trampoline. Static and dynamic combo.',
            ],
            [
                'name' => 'Mini Trampoline Knees-to-Chest Bounce',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hip Flexors', 'Core', 'Calves', 'Quadriceps', 'Cardio', 'Glutes'],
                'description' => 'Bounce and bring knees to chest. Core and hip flexor endurance.',
            ],
            [
                'name' => 'Mini Trampoline Waist Twister',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Obliques', 'Core', 'Calves', 'Cardio', 'Hip Rotators', 'Stabilizers'],
                'description' => 'Twist waist while bouncing. Rotational core and mobility.',
            ],
            [
                'name' => 'Mini Trampoline Hula Hoop Twist',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Obliques', 'Core', 'Hip Rotators', 'Calves', 'Cardio', 'Stabilizers'],
                'description' => 'Circular hip motion while bouncing. Hip mobility and core.',
            ],
            [
                'name' => 'Mini Trampoline Weighted Vest Bounce',
                'equipment' => 'Mini Trampoline, Weighted Vest',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Cardio', 'Stabilizers'],
                'description' => 'Bounce with weighted vest. Increased cardio load.',
            ],
            [
                'name' => 'Mini Trampoline Dumbbell Bounce',
                'equipment' => 'Mini Trampoline, Dumbbell',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Core', 'Quadriceps', 'Glutes', 'Shoulders', 'Cardio'],
                'description' => 'Hold light dumbbells while bouncing. Upper body engagement.',
            ],
            [
                'name' => 'Mini Trampoline Interval Bounce (Tabata)',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Core', 'Quadriceps', 'Glutes', 'Cardio', 'Stabilizers'],
                'description' => '20 sec high intensity, 10 sec rest. 8 rounds. HIIT.',
            ],
            [
                'name' => 'Mini Trampoline Arm Circles Bounce',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Shoulders', 'Core', 'Calves', 'Cardio', 'Traps', 'Stabilizers'],
                'description' => 'Bounce with arm circles. Cardio and shoulder mobility.',
            ],
            [
                'name' => 'Mini Trampoline Punches',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Shoulders', 'Core', 'Calves', 'Cardio', 'Triceps', 'Hip Rotators'],
                'description' => 'Throw punches while bouncing. Cardio and upper body.',
            ],
            [
                'name' => 'Mini Trampoline Dance Bounce (Freestyle)',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Full Body', 'Core', 'Calves', 'Cardio', 'Stabilizers', 'Hip Rotators'],
                'description' => 'Freestyle dancing on trampoline. Fun full-body cardio.',
            ],
            [
                'name' => 'Mini Trampoline Balance Hold (Single-Leg Stand)',
                'equipment' => 'Mini Trampoline',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Core', 'Stabilizers', 'Quadriceps', 'Glutes', 'Hip Abductors'],
                'description' => 'Stand on one leg on trampoline. Balance and stability.',
            ],
        ];

        $sourceDir = public_path('execises/mini-trampoline');
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
