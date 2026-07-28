<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class PowerRackSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Barbell Back Squat',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors', 'Erector Spinae', 'Core'],
                'description' => 'Set the barbell on the rear deltoids, unrack, step back, squat to parallel or below using the adjustable safety pins as a fail-safe. The foundational lower-body strength builder.',
            ],
            [
                'name' => 'Barbell Front Squat',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Upper Back'],
                'description' => 'Rest the barbell on the front deltoids, elbows high, and squat down with an upright torso. Safety pins allow confident heavy loading without a spotter.',
            ],
            [
                'name' => 'Overhead Squat',
                'equipment' => 'Power Rack',
                'category_slug' => 'mobility',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Shoulders', 'Core', 'Upper Back'],
                'description' => 'Press the barbell overhead with a wide grip, lock elbows, and squat deeply while maintaining a stable overhead position. Safely bailed by dropping onto the rack pins.',
            ],
            [
                'name' => 'Box Squat',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors', 'Erector Spinae'],
                'description' => 'Place a box or bench inside the rack, squat until sitting briefly, then explode up. Safety pins catch the bar if you fail to stand.',
            ],
            [
                'name' => 'Pause Squat',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Erector Spinae', 'Core'],
                'description' => 'Descend into a full squat, pause for 1-3 seconds in the hole without bouncing, then drive up. Rack pins provide a safe exit for failed reps.',
            ],
            [
                'name' => 'Pin Squat (Concentric-Only)',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors'],
                'description' => 'Set the safety pins at your sticking point, rest the bar on them between reps to release elastic energy, then explode upward from a dead stop.',
            ],
            [
                'name' => 'Anderson Squat (Bottom-Up)',
                'equipment' => 'Power Rack',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Erector Spinae'],
                'description' => 'Start with the barbell resting on the safety pins at the bottom position. Drive up from a dead stop without any eccentric phase to build explosive strength.',
            ],
            [
                'name' => 'Bulgarian Split Squat',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Place a bench behind you, rest rear foot on it, barbell on back, and squat down. Safety pins protect you if you lose balance during heavy unilateral work.',
            ],
            [
                'name' => 'Barbell Forward Lunge',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'With the barbell on your back, step forward into a deep lunge, then push back to start. Rack supports allow heavy loads without a spotter.',
            ],
            [
                'name' => 'Flat Barbell Bench Press',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Place a flat bench inside the rack, set the safety pins just above chest height, and press safely to failure without a spotter.',
            ],
            [
                'name' => 'Incline Barbell Bench Press',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Upper Pectoralis', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Set an incline bench in the rack, adjust pins to catch the bar at the upper chest, and press freely with full range of motion.',
            ],
            [
                'name' => 'Close-Grip Bench Press',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Inner Pectoralis', 'Anterior Deltoids'],
                'description' => 'Using a shoulder-width grip, lower the bar to the lower sternum and press. Safety pins allow you to push tricep limits without fear of being pinned.',
            ],
            [
                'name' => 'Spoto Press',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Lower the bar to just above the chest (about 1-2 inches), pause while maintaining tension, then press. Safety pins can be set at that height for a physical cue.',
            ],
            [
                'name' => 'Board Press',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Pectoralis Major', 'Anterior Deltoids'],
                'description' => 'Place boards on the chest to limit range of motion, press from a higher point. Rack safety pins can serve as a tactile stop at the desired height.',
            ],
            [
                'name' => 'Floor Press',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Lie on the floor inside the rack, barbell on the safety pins, press up from a dead stop. Emphasizes lockout strength and reduces shoulder strain.',
            ],
            [
                'name' => 'Barbell Strict Overhead Press',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Upper Traps', 'Core'],
                'description' => 'Set the J-hooks at shoulder height, unrack, and press overhead without leg drive. Safety pins catch the bar if you fail, making it safe to push to failure.',
            ],
            [
                'name' => 'Push Press',
                'equipment' => 'Power Rack',
                'category_slug' => 'power',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Quadriceps', 'Core'],
                'description' => 'Dip slightly, explode through the legs, and drive the barbell overhead. Rack pins allow you to dump the bar safely on missed reps.',
            ],
            [
                'name' => 'Push Jerk',
                'equipment' => 'Power Rack',
                'category_slug' => 'power',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Quadriceps', 'Glutes', 'Core'],
                'description' => 'Dip, drive, and re-dip to catch the barbell overhead with locked arms. The power rack provides a controlled environment for learning this explosive lift.',
            ],
            [
                'name' => 'Barbell Bent-Over Row',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Traps', 'Rear Deltoids', 'Biceps', 'Erector Spinae'],
                'description' => 'Hinge forward, grab the barbell from the floor or rack pins, and pull to the lower abdomen. Adjustable pin height enables different starting positions.',
            ],
            [
                'name' => 'Pendlay Row',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Traps', 'Rear Deltoids', 'Biceps', 'Erector Spinae'],
                'description' => 'Start each rep with the barbell resting on the safety pins just below the knees, pull explosively to the sternum while keeping the back parallel to the floor, then reset.',
            ],
            [
                'name' => 'Rack Pull',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Traps', 'Upper Back', 'Grip'],
                'description' => 'Set the safety pins just below the knees. Pull the barbell from this elevated position to overload the lockout phase of the deadlift.',
            ],
            [
                'name' => 'Barbell Hip Thrust',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Core'],
                'description' => 'Sit on the floor with upper back against a bench, barbell across hips, and thrust upward. The rack provides support for loading and a secure bar catch if needed.',
            ],
            [
                'name' => 'Barbell Glute Bridge',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Core'],
                'description' => 'Lie on the floor, barbell across hips, press through feet to lift hips to full extension. Rack allows safe loading and a static start from pins.',
            ],
            [
                'name' => 'Romanian Deadlift',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae'],
                'description' => 'With the barbell at hip level, push hips back with soft knees, lower the bar along the legs until a deep hamstring stretch, then return. Safely performed inside the rack.',
            ],
            [
                'name' => 'Stiff-Leg Deadlift',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae'],
                'description' => 'Keep legs nearly straight, lower the barbell toward the floor by pushing hips back. Pin setup can limit range of motion for overload work.',
            ],
            [
                'name' => 'Sumo Deadlift',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Adductors', 'Erector Spinae'],
                'description' => 'Use a wide stance with hands inside knees, lift the barbell from the floor. Rack pins can be set low to catch missed attempts.',
            ],
            [
                'name' => 'Good Morning',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core'],
                'description' => 'Place the barbell on the upper back, hinge forward with a flat back, then return to standing. Pins can limit the range to build specific strength.',
            ],
            [
                'name' => 'Barbell Shrug',
                'equipment' => 'Power Rack',
                'category_slug' => 'isolation',
                'target_muscles' => ['Upper Trapezius', 'Levator Scapulae'],
                'description' => 'Unrack the barbell or load from the pins, hold at arm\'s length, and shrug the shoulders straight up. Rack allows heavy overload without needing to deadlift first.',
            ],
            [
                'name' => 'Standing Barbell Curl',
                'equipment' => 'Power Rack',
                'category_slug' => 'isolation',
                'target_muscles' => ['Biceps', 'Forearms'],
                'description' => 'Take the barbell from the J-hooks at hip height, curl with full range of motion. The rack prevents a bent-over reach from the floor.',
            ],
            [
                'name' => 'Lying Tricep Extension (Skull Crusher)',
                'equipment' => 'Power Rack',
                'category_slug' => 'isolation',
                'target_muscles' => ['Triceps'],
                'description' => 'Lie on a bench inside the rack, barbell pressed overhead, lower to the forehead by bending elbows, then extend. Safety pins protect your face from failure.',
            ],
            [
                'name' => 'Barbell Upright Row',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Medial Deltoids', 'Upper Traps', 'Biceps'],
                'description' => 'Grip the barbell with a narrow overhand grip, pull it along the body to chin height. The rack provides a convenient starting position.',
            ],
            [
                'name' => 'Pull-Up',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Rhomboids', 'Core'],
                'description' => 'Grab the overhead pull-up bar with an overhand wide grip, pull yourself up until chin clears the bar. Many power racks feature a built-in bar.',
            ],
            [
                'name' => 'Chin-Up',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Forearms', 'Core'],
                'description' => 'Use an underhand shoulder-width grip on the rack\'s pull-up bar, pull the body up emphasizing bicep engagement.',
            ],
            [
                'name' => 'Neutral-Grip Pull-Up',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Brachialis', 'Forearms', 'Core'],
                'description' => 'Use parallel handles (if available) on the rack\'s top bar, pull up with palms facing each other. Easier on the wrists and emphasizes the brachialis.',
            ],
            [
                'name' => 'Hanging Leg Raise',
                'equipment' => 'Power Rack',
                'category_slug' => 'core',
                'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Transverse Abdominis', 'Obliques', 'Grip'],
                'description' => 'Hang from the overhead bar with arms extended, raise straight legs to parallel or higher, then lower with control. Engages entire anterior core.',
            ],
            [
                'name' => 'Hanging Knee Raise',
                'equipment' => 'Power Rack',
                'category_slug' => 'core',
                'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Obliques'],
                'description' => 'Hang from the bar and pull knees toward the chest, curling the pelvis. A regression for building core strength toward full leg raises.',
            ],
            [
                'name' => 'Hanging Windshield Wiper',
                'equipment' => 'Power Rack',
                'category_slug' => 'core',
                'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Transverse Abdominis', 'Hip Abductors'],
                'description' => 'Hang from the bar, raise legs to an L-sit position, then rotate the legs side to side in a controlled arc. Severe oblique and grip challenge.',
            ],
            [
                'name' => 'Dips (Rack Attachment)',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Pectoralis Major (Lower)', 'Anterior Deltoids'],
                'description' => 'If the power rack has dip bars or attachment, perform bodyweight or weighted dips. Safely set pins to catch a failure at the bottom.',
            ],
            [
                'name' => 'Inverted Row (Rack Row)',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Traps', 'Rear Deltoids', 'Biceps', 'Core'],
                'description' => 'Set a barbell on the safety pins at waist height, lie underneath, and pull your chest to the bar while keeping the body straight. Excellent horizontal pulling variation.',
            ],
            [
                'name' => 'Barbell Rollout',
                'equipment' => 'Power Rack',
                'category_slug' => 'core',
                'target_muscles' => ['Rectus Abdominis', 'Transverse Abdominis', 'Obliques', 'Erector Spinae', 'Shoulders'],
                'description' => 'Load a barbell with small plates, kneel inside the rack, and roll the barbell forward extending the body, then pull back using the core. The rack frame limits lateral movement.',
            ],
            [
                'name' => 'Band-Resisted Squat',
                'equipment' => 'Power Rack',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Attach resistance bands to the bottom of the rack and the barbell. The tension increases as you stand, forcing greater acceleration and lockout power.',
            ],
            [
                'name' => 'Band-Assisted Pull-Up',
                'equipment' => 'Power Rack',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Core'],
                'description' => 'Loop a resistance band over the overhead bar, place one foot or knee in the band, and perform pull-ups with reduced bodyweight to build volume or assist the first rep.',
            ],
        ];

        foreach ($exercises as $data) {
            $categoryId = $categories[$data['category_slug']] ?? null;
            unset($data['category_slug']);
            $data['category_id'] = $categoryId;

            Exercise::create($data);
        }
    }
}
