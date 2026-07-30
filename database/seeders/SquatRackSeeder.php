<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;

class SquatRackSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Back Squat',
                'equipment' => 'Squat Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors', 'Erector Spinae', 'Core'],
                'description' => 'Set the barbell on the rear deltoids, unrack, step back, squat to parallel or below, then drive back up. The foundational lower-body strength exercise.',
            ],
            [
                'name' => 'Front Squat',
                'equipment' => 'Squat Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Upper Back'],
                'description' => 'Rest the barbell across the front deltoids with a clean grip or crossed arms, keep elbows high, squat down while staying upright to heavily target the quads and core.',
            ],
            [
                'name' => 'Overhead Squat',
                'equipment' => 'Squat Rack',
                'category_slug' => 'mobility',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Shoulders', 'Core', 'Upper Back'],
                'description' => 'Press the barbell overhead with a wide snatch grip, lock arms, then squat deeply while keeping the bar stable overhead. Demands extreme shoulder mobility and core stability.',
            ],
            [
                'name' => 'Box Squat',
                'equipment' => 'Squat Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors', 'Erector Spinae'],
                'description' => 'Place a box behind you, squat down until sitting briefly on the box, then explosively stand. Teaches proper depth and develops starting strength out of the hole.',
            ],
            [
                'name' => 'Pause Squat',
                'equipment' => 'Squat Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Erector Spinae', 'Core'],
                'description' => 'Descend into the bottom of a squat, hold for 1-3 seconds without bouncing, then drive up. Eliminates the stretch reflex and builds pure concentric power.',
            ],
            [
                'name' => 'Tempo Squat (3-1-3)',
                'equipment' => 'Squat Rack',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Take 3 seconds to lower, pause 1 second in the hole, take 3 seconds to rise. Increases time under tension for muscle growth and control.',
            ],
            [
                'name' => 'Pin Squat (Concentric Squat)',
                'equipment' => 'Squat Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors'],
                'description' => 'Set the safety pins at your sticking point. Rest the bar on the pins between each rep, completely releasing tension, then explode up from a dead stop.',
            ],
            [
                'name' => 'Anderson Squat (Bottom-Up Squat)',
                'equipment' => 'Squat Rack',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Erector Spinae'],
                'description' => 'Start with the barbell resting on the safety pins at the bottom position. Drive up from a dead stop without any eccentric phase, building explosive power.',
            ],
            [
                'name' => '1 & 1/4 Squat',
                'equipment' => 'Squat Rack',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes'],
                'description' => 'Lower all the way down, come up a quarter of the way, go back down to full depth, then stand all the way up. One rep increases quad time under tension.',
            ],
            [
                'name' => 'Bulgarian Split Squat',
                'equipment' => 'Squat Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Place a bench behind the rack, rest rear foot on it with barbell on back, squat down until front thigh is parallel. Unilateral leg exercise for strength and balance.',
            ],
            [
                'name' => 'Barbell Lunge (Forward/Reverse)',
                'equipment' => 'Squat Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'With the barbell on the back, step forward or backward into a lunge, drop back knee toward the floor, then drive back to start. Builds unilateral strength and stability.',
            ],
            [
                'name' => 'Barbell Standing Shoulder Press (Strict Press)',
                'equipment' => 'Squat Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Upper Traps', 'Core'],
                'description' => 'Unrack the barbell at shoulder height, press overhead without using legs. Strict vertical push for shoulder strength and size.',
            ],
            [
                'name' => 'Push Press',
                'equipment' => 'Squat Rack',
                'category_slug' => 'power',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Quadriceps', 'Core'],
                'description' => 'Use a slight dip and drive from the legs to explosively press the barbell overhead. Transfers lower-body power to upper body.',
            ],
            [
                'name' => 'Push Jerk',
                'equipment' => 'Squat Rack',
                'category_slug' => 'power',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Quadriceps', 'Glutes', 'Core'],
                'description' => 'Dip, drive the bar overhead, and re-dip under the bar to catch it with locked arms before standing. Explosive Olympic-style lift.',
            ],
            [
                'name' => 'Bench Press',
                'equipment' => 'Squat Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Place a bench inside the rack, set the safety pins, unrack the barbell, and press from chest to lockout. Safely perform heavy bench presses alone.',
            ],
            [
                'name' => 'Barbell Row (Bent-Over Row)',
                'equipment' => 'Squat Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Traps', 'Rear Deltoids', 'Biceps', 'Erector Spinae'],
                'description' => 'Hinge forward, grab the barbell from the rack or floor, pull it to the lower abdomen, squeezing shoulder blades. Builds back thickness.',
            ],
            [
                'name' => 'Pendlay Row',
                'equipment' => 'Squat Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Traps', 'Rear Deltoids', 'Biceps', 'Erector Spinae'],
                'description' => 'Start each rep with the barbell resting on the floor (or pins), pull explosively to the sternum while keeping the back parallel to the floor, then reset.',
            ],
            [
                'name' => 'Rack Pull',
                'equipment' => 'Squat Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Traps', 'Upper Back', 'Grip'],
                'description' => 'Set the safety pins just below the knees, start the pull from there rather than the floor. Overloads the lockout portion of the deadlift.',
            ],
            [
                'name' => 'Barbell Hip Thrust',
                'equipment' => 'Squat Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Core'],
                'description' => 'Sit on the floor with upper back against a bench, barbell across hips, drive through heels to extend hips upward. Maximizes glute activation.',
            ],
            [
                'name' => 'Barbell Glute Bridge',
                'equipment' => 'Squat Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings'],
                'description' => 'Lie on the floor, barbell across hips, push through feet to lift hips until body forms a straight line from shoulders to knees. Focus on glute squeeze.',
            ],
            [
                'name' => 'Standing Calf Raise',
                'equipment' => 'Squat Rack',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gastrocnemius', 'Soleus'],
                'description' => 'With the barbell on the back, place balls of feet on a block or plate, raise heels as high as possible, then lower for a full stretch.',
            ],
            [
                'name' => 'Barbell Shrug',
                'equipment' => 'Squat Rack',
                'category_slug' => 'isolation',
                'target_muscles' => ['Upper Trapezius', 'Levator Scapulae'],
                'description' => 'Hold the barbell at arm\'s length in front, shrug shoulders straight up toward ears, squeeze, and lower with control.',
            ],
            [
                'name' => 'Barbell Upright Row',
                'equipment' => 'Squat Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Medial Deltoids', 'Upper Traps', 'Biceps'],
                'description' => 'Grip the barbell with hands close, pull it up along the body to chin height, leading with the elbows. Targets the shoulders and traps.',
            ],
            [
                'name' => 'Barbell Curl',
                'equipment' => 'Squat Rack',
                'category_slug' => 'isolation',
                'target_muscles' => ['Biceps', 'Forearms'],
                'description' => 'Using a straight or EZ curl bar, perform standing bicep curls with a full range of motion, keeping elbows stationary.',
            ],
            [
                'name' => 'Skull Crusher (Lying Tricep Extension)',
                'equipment' => 'Squat Rack',
                'category_slug' => 'isolation',
                'target_muscles' => ['Triceps'],
                'description' => 'Lie on a bench inside the rack, press the barbell up, then lower it toward the forehead by bending elbows, then extend back up.',
            ],
            [
                'name' => 'Good Morning',
                'equipment' => 'Squat Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core'],
                'description' => 'With the barbell on the upper back, hinge forward at the hips keeping the back flat, then return to standing. Strengthens the posterior chain.',
            ],
            [
                'name' => 'Romanian Deadlift',
                'equipment' => 'Squat Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae'],
                'description' => 'Hold the barbell at hip level, push hips back with a slight knee bend, lower bar along thighs feeling a hamstring stretch, then drive hips forward to stand.',
            ],
            [
                'name' => 'Stiff-Leg Deadlift',
                'equipment' => 'Squat Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae'],
                'description' => 'Keep legs nearly straight, push hips back to lower the barbell toward the floor, feeling a deep hamstring stretch, then return.',
            ],
            [
                'name' => 'Sumo Deadlift',
                'equipment' => 'Squat Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Adductors', 'Erector Spinae'],
                'description' => 'Wide stance with hands inside knees, grip the barbell, keep chest up and drive through heels to lift. Emphasizes hips and inner thighs.',
            ],
            [
                'name' => 'Barbell Rollout',
                'equipment' => 'Squat Rack',
                'category_slug' => 'core',
                'target_muscles' => ['Rectus Abdominis', 'Transverse Abdominis', 'Obliques', 'Erector Spinae', 'Shoulders'],
                'description' => 'Load a barbell with light plates, kneel, and roll the barbell forward extending the body, then engage the core to pull back.',
            ],
        ];

        $sourceDir = public_path('execises/squat-rack');
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
