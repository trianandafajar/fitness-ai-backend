<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class SmithMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Back Squat',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors', 'Erector Spinae', 'Core'],
                'description' => 'Position the bar across the upper back, unrack, and squat down until thighs are at least parallel, then drive up through the heels using the fixed vertical path.',
            ],
            [
                'name' => 'Front Squat',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Upper Back'],
                'description' => 'Rest the bar across the front deltoids, keep elbows high, and squat down while maintaining an upright torso to heavily emphasize the quads and core.',
            ],
            [
                'name' => 'Split Squat',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Place one foot forward and one back in a staggered stance, lower the bar until the back knee nearly touches the floor, then push back up for unilateral leg strength.',
            ],
            [
                'name' => 'Bulgarian Split Squat',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Elevate the rear foot on a bench behind you, position the front foot forward, and descend into a deep single-leg squat to build extreme unilateral stability and size.',
            ],
            [
                'name' => 'Sumo Squat',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Adductors', 'Quadriceps', 'Hamstrings', 'Core'],
                'description' => 'Take a wide stance with toes pointed out, squat down by pushing knees outward, emphasizing the inner thighs and glutes through a fixed vertical plane.',
            ],
            [
                'name' => 'Single-Leg Squat',
                'equipment' => 'Smith Machine',
                'category_slug' => 'stability',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Balance'],
                'description' => 'Balance on one leg with the bar on your back or in front, lower yourself slowly using the Smith guide for support, then press back up to improve balance and strength.',
            ],
            [
                'name' => 'Sissy Squat',
                'equipment' => 'Smith Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Core'],
                'description' => 'With the bar set low and against your lower back, lean back while bending the knees deeply, driving them forward to isolate the quadriceps through an intense stretch.',
            ],
            [
                'name' => 'Hack Squat (Reverse Smith Squat)',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings'],
                'description' => 'Face the machine, position your shoulders under the bar, unhook it, and squat down with the bar sliding along your back, simulating a hack squat machine.',
            ],
            [
                'name' => 'Bench Press (Flat)',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Lie on a flat bench under the bar, grip slightly wider than shoulder-width, lower the bar to mid-chest, and press up following the fixed path for a controlled chest press.',
            ],
            [
                'name' => 'Bench Press (Incline)',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Upper Pectoralis', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Set the bench to a 30–45-degree incline, press the bar from the upper chest area to effectively target the clavicular head of the pecs.',
            ],
            [
                'name' => 'Bench Press (Decline)',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Pectoralis', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Set the bench to a decline position, lower the bar to the lower sternum, and press up to emphasize the lower chest fibers.',
            ],
            [
                'name' => 'Close-Grip Bench Press',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Inner Pectoralis', 'Anterior Deltoids'],
                'description' => 'Use a shoulder-width or narrower grip, keep elbows close to the body, and lower the bar to the lower chest to heavily recruit the triceps.',
            ],
            [
                'name' => 'Reverse-Grip Bench Press',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Upper Pectoralis', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Grip the bar with palms facing you (supinated), lower to the lower chest, and press; the altered angle increases upper pec and tricep activation.',
            ],
            [
                'name' => 'Shoulder Press (Seated)',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Upper Traps'],
                'description' => 'Sit on a bench with back support, press the bar overhead from shoulder height to full lockout using the fixed vertical path for stable pressing.',
            ],
            [
                'name' => 'Shoulder Press (Standing)',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Core'],
                'description' => 'Stand and press the bar overhead, engaging the core and stabilizers throughout the range of motion for a strict standing press.',
            ],
            [
                'name' => 'Behind-the-Neck Shoulder Press',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Upper Traps'],
                'description' => 'Lower the bar behind the head to the base of the neck and press up, requiring good shoulder mobility; emphasizes the medial deltoids.',
            ],
            [
                'name' => 'Upright Row',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Medial Deltoids', 'Upper Traps', 'Biceps', 'Forearms'],
                'description' => 'Grip the bar with hands close together, pull the bar straight up along the body to chin height, leading with the elbows to target the shoulders and traps.',
            ],
            [
                'name' => 'Bent-Over Row',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Traps', 'Rear Deltoids', 'Biceps', 'Erector Spinae'],
                'description' => 'Hinge forward at the hips with a flat back, pull the bar from a dead stop to the lower abdomen, squeezing the shoulder blades together each rep.',
            ],
            [
                'name' => 'Inverted Row',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Traps', 'Rear Deltoids', 'Biceps', 'Core'],
                'description' => 'Set the bar at waist height, lie underneath it, and pull your chest up to the bar while keeping your body straight, using bodyweight for a horizontal pull.',
            ],
            [
                'name' => 'Romanian Deadlift',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core'],
                'description' => 'With a slight knee bend, hinge at the hips and lower the bar along the thighs, feeling a deep hamstring stretch, then drive the hips forward to stand.',
            ],
            [
                'name' => 'Stiff-Leg Deadlift',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae'],
                'description' => 'Keep legs nearly straight, push hips back as you lower the bar toward the feet, isolating the hamstrings through a long range of motion.',
            ],
            [
                'name' => 'Sumo Deadlift',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Adductors', 'Erector Spinae'],
                'description' => 'Adopt a wide stance with hands inside the knees, drive through the heels and extend hips and knees to lift the bar from a low starting point.',
            ],
            [
                'name' => 'Hip Thrust',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Core'],
                'description' => 'Sit on the floor with upper back against a bench, place the bar across the hips, and drive through the heels to extend the hips upward to full lockout.',
            ],
            [
                'name' => 'Glute Bridge (Smith)',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Core'],
                'description' => 'Lie on the floor with the bar across the hips, push through the feet to lift the hips toward the ceiling, squeezing the glutes at the top.',
            ],
            [
                'name' => 'Standing Calf Raise',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Gastrocnemius', 'Soleus'],
                'description' => 'Place the balls of your feet on a block, rest the bar on your shoulders, and raise your heels as high as possible to fully contract the calves.',
            ],
            [
                'name' => 'Donkey Calf Raise (Simulated)',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Gastrocnemius', 'Soleus'],
                'description' => 'Bend forward at the hips with the bar across the lower back, perform calf raises on a block, mimicking the donkey raise movement.',
            ],
            [
                'name' => 'Shrug',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Upper Trapezius', 'Levator Scapulae'],
                'description' => 'Hold the bar at arm\'s length in front of you or behind you, and shrug your shoulders straight up toward your ears, then lower with control.',
            ],
            [
                'name' => 'Lunges (Forward/Reverse)',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'With the bar on your shoulders, step one foot forward or backward into a lunge, lower until both knees bend at 90 degrees, then push back to start.',
            ],
            [
                'name' => 'Good Morning',
                'equipment' => 'Smith Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core'],
                'description' => 'Place the bar across the upper back, hinge forward at the hips with a flat back, feeling a stretch in the hamstrings, then return to standing.',
            ],
        ];

        $sourceDir = public_path('execises/smith-machine');
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
