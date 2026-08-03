<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CamberedBarSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Cambered Bar Back Squat', 'equipment' => 'Cambered Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors', 'Erector Spinae', 'Core', 'Upper Back'], 'description' => 'Place the cambered bar on the upper back; the curved design sits comfortably on the shoulders. Squat to parallel or below, allowing the weight to hang lower and challenge stability. The camber shifts the center of gravity, increasing core and upper back demand while reducing shoulder strain.'],
            ['name' => 'Cambered Bar Front Squat', 'equipment' => 'Cambered Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Upper Back'], 'description' => 'Rest the cambered bar across the front deltoids, gripping the handles or bar. The bend allows a more upright torso and can be easier on the wrists than a straight bar. Squat down, keeping elbows high.'],
            ['name' => 'Cambered Bar Box Squat', 'equipment' => 'Cambered Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors', 'Erector Spinae', 'Core'], 'description' => 'Place a box behind you, squat back until sitting briefly, then explode up. The cambered bar\'s lower center of mass increases posterior chain activation and forces greater core bracing during the ascent.'],
            ['name' => 'Cambered Bar Pause Squat', 'equipment' => 'Cambered Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Erector Spinae', 'Core'], 'description' => 'Descend into a full squat, pause for 1-3 seconds at the bottom, then drive up. The cambered bar eliminates the stretch reflex and amplifies time under tension in the deep position.'],
            ['name' => 'Cambered Bar Tempo Squat (3-1-3)', 'equipment' => 'Cambered Bar', 'category_slug' => 'hypertrophy', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Take 3 seconds to lower, pause 1 second at the bottom, take 3 seconds to rise. The unstable load of the cambered bar maximizes muscular control and time under tension.'],
            ['name' => 'Cambered Bar Anderson Squat (Bottom-Up)', 'equipment' => 'Cambered Bar', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Erector Spinae'], 'description' => 'Start with the bar resting on safety pins at the bottom squat position. Explosively drive up from a dead stop. The cambered bar\'s design increases the difficulty of the initial drive.'],
            ['name' => 'Cambered Bar Bulgarian Split Squat', 'equipment' => 'Cambered Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Elevate the rear foot on a bench, place the cambered bar on your back, and squat down with the front leg. The bar\'s instability forces greater stabilizer recruitment.'],
            ['name' => 'Cambered Bar Walking Lunge', 'equipment' => 'Cambered Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'With the cambered bar on your back, perform alternating forward lunges while walking. The bar\'s swinging motion increases core and hip stabilizer engagement.'],
            ['name' => 'Cambered Bar Good Morning', 'equipment' => 'Cambered Bar', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core'], 'description' => 'Place the cambered bar on the upper back. Hinge forward at the hips while keeping the back flat, feel the hamstring stretch, then return. The bar sits lower and challenges the posterior chain with a deeper stretch.'],
            ['name' => 'Cambered Bar Seated Good Morning', 'equipment' => 'Cambered Bar', 'category_slug' => 'strength', 'target_muscles' => ['Erector Spinae', 'Hamstrings', 'Glutes', 'Core'], 'description' => 'Sit on a bench with the cambered bar on your back, hinge forward from the hips. Isolates the lower back and hamstrings without leg drive.'],
            ['name' => 'Cambered Bar Romanian Deadlift', 'equipment' => 'Cambered Bar', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae'], 'description' => 'Hold the cambered bar with a neutral grip at hip level. Hinge at the hips, keeping the bar close to the legs, lower until a deep hamstring stretch, then extend. The cambered shape allows greater range of motion without hitting the floor.'],
            ['name' => 'Cambered Bar Stiff-Leg Deadlift', 'equipment' => 'Cambered Bar', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae'], 'description' => 'Keeping legs nearly straight, push hips back and lower the cambered bar toward the floor, maximizing hamstring stretch. The bend in the bar increases range of motion.'],
            ['name' => 'Cambered Bar Bench Press (Cambered Bench Bar)', 'equipment' => 'Cambered Bar', 'category_slug' => 'strength', 'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps'], 'description' => 'Using a cambered bench press bar, lie on a flat bench. Lower the bar to the chest, allowing the bend to create a deeper stretch in the bottom position. Press up to lockout. Increases chest stretch and range of motion.'],
            ['name' => 'Cambered Bar Incline Bench Press', 'equipment' => 'Cambered Bar', 'category_slug' => 'strength', 'target_muscles' => ['Upper Pectoralis', 'Anterior Deltoids', 'Triceps'], 'description' => 'Set bench to 30-45°. The cambered bench bar allows a deeper stretch at the bottom, targeting the upper chest more intensely.'],
            ['name' => 'Cambered Bar Close-Grip Bench Press', 'equipment' => 'Cambered Bar', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Inner Pectoralis', 'Anterior Deltoids'], 'description' => 'Use a shoulder-width grip on the cambered bench bar. Lower to the lower sternum, then press. The camber allows a full range even with a narrow grip, emphasizing triceps.'],
            ['name' => 'Cambered Bar Floor Press', 'equipment' => 'Cambered Bar', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Pectoralis Major', 'Anterior Deltoids'], 'description' => 'Lie on the floor, the cambered bar\'s bend allows the arms to descend lower than a straight bar would, increasing tricep and chest stretch before pressing up.'],
            ['name' => 'Cambered Bar Shrug', 'equipment' => 'Cambered Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Upper Trapezius', 'Levator Scapulae'], 'description' => 'Hold the cambered bar at arm\'s length in front. Shrug your shoulders up toward your ears and squeeze. The bar\'s shape allows a comfortable neutral grip.'],
            ['name' => 'Cambered Bar Bent-Over Row', 'equipment' => 'Cambered Bar', 'category_slug' => 'strength', 'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Traps', 'Biceps', 'Erector Spinae'], 'description' => 'Hinge forward, hold the cambered bar with a neutral or pronated grip, row it to the lower abdomen. The bend provides a deeper stretch at the bottom.'],
        ];

        $sourceDir = public_path('execises/cambered-bar');
        $files = glob($sourceDir . '/*.png');
        sort($files);

        foreach ($execises as $i => $data) {
            $sourceFile = $files[$i] ?? null;

            if ($sourceFile) {
                $data['image'] = Storage::disk('public')->putFile('exercises', new File($sourceFile));
            }

            Exercise::create([
                'name' => $data['name'],
                'equipment' => $data['equipment'],
                'category_id' => $categories[$data['category_slug']],
                'target_muscles' => $data['target_muscles'],
                'description' => $data['description'],
                'image' => $data['image'] ?? null,
            ]);
        }
    }
}
