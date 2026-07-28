<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class BenchPressInclineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Standard Barbell Incline Press',
                'equipment' => 'Bench Press Incline',
                'category_slug' => 'strength',
                'target_muscles' => ['Upper Pectoralis Major (Clavicular Head)', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Lie on incline bench set to 30-45°, grip bar slightly wider than shoulder-width, lower to upper chest, and press to lockout. Prioritizes upper chest development.',
            ],
            [
                'name' => 'Close-Grip Barbell Incline Press',
                'equipment' => 'Bench Press Incline',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Upper Pectoralis', 'Anterior Deltoids'],
                'description' => 'Use shoulder-width grip on the barbell, keep elbows close to body, lower to lower sternum. Shifts emphasis to triceps while still loading the upper chest.',
            ],
            [
                'name' => 'Wide-Grip Barbell Incline Press',
                'equipment' => 'Bench Press Incline',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Upper Pectoralis Major', 'Anterior Deltoids'],
                'description' => 'Take a wider than standard grip, lowering bar to upper chest. Increased horizontal abduction targets outer upper pec fibers and enhances stretch.',
            ],
            [
                'name' => 'Reverse-Grip Barbell Incline Press',
                'equipment' => 'Bench Press Incline',
                'category_slug' => 'strength',
                'target_muscles' => ['Upper Pectoralis (Clavicular Head)', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Grip bar with palms facing up (supinated), lower to lower chest. Alters elbow path to increase upper pec and tricep activation while reducing shoulder strain.',
            ],
            [
                'name' => 'Guillotine Incline Press (Neck Press)',
                'equipment' => 'Bench Press Incline',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Upper Pectoralis Major', 'Anterior Deltoids'],
                'description' => 'Lower the bar to the neck or chin with elbows flared wide, then press. Deep stretch and isolation of the upper chest with minimal tricep involvement.',
            ],
            [
                'name' => 'Pause Incline Barbell Press',
                'equipment' => 'Bench Press Incline',
                'category_slug' => 'strength',
                'target_muscles' => ['Upper Pectoralis', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Lower bar to upper chest, pause for 1-3 seconds to eliminate stretch reflex, then explode up. Builds off-the-chest strength and control.',
            ],
            [
                'name' => 'Tempo Incline Barbell Press (3-1-3)',
                'equipment' => 'Bench Press Incline',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Upper Pectoralis', 'Triceps', 'Anterior Deltoids'],
                'description' => '3 seconds lowering, 1 second pause at chest, 3 seconds pressing. Increases time under tension for muscle growth and control.',
            ],
            [
                'name' => 'Eccentric-Emphasis Incline Barbell Press',
                'equipment' => 'Bench Press Incline',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Upper Pectoralis', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Lower the bar over 4-5 seconds, then press up with normal or assisted speed. Overloads the negative phase for strength and size gains.',
            ],
            [
                'name' => 'Incline Board Press',
                'equipment' => 'Bench Press Incline',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Upper Pectoralis', 'Anterior Deltoids'],
                'description' => 'Place boards on the chest to shorten the range of motion, pressing from a higher start. Focuses on lockout strength and triceps.',
            ],
            [
                'name' => 'Dumbbell Incline Press',
                'equipment' => 'Bench Press Incline',
                'category_slug' => 'strength',
                'target_muscles' => ['Upper Pectoralis Major', 'Anterior Deltoids', 'Triceps', 'Stabilizers'],
                'description' => 'Hold dumbbells above chest, press up to full extension. Independent arm motion allows greater range of motion and addresses imbalances.',
            ],
            [
                'name' => 'Dumbbell Incline Flyes',
                'equipment' => 'Bench Press Incline',
                'category_slug' => 'isolation',
                'target_muscles' => ['Upper Pectoralis Major', 'Anterior Deltoids'],
                'description' => 'With slight elbow bend, open arms wide to feel a deep stretch in the upper chest, then squeeze the dumbbells back together in an arc.',
            ],
            [
                'name' => 'Dumbbell Incline Squeeze Press (Hex Press)',
                'equipment' => 'Bench Press Incline',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Upper Pectoralis Major (Inner)', 'Triceps'],
                'description' => 'Press dumbbells together firmly palms facing each other throughout the movement. Constant tension emphasizes inner upper chest fibers.',
            ],
            [
                'name' => 'Single-Arm Dumbbell Incline Press',
                'equipment' => 'Bench Press Incline',
                'category_slug' => 'stability',
                'target_muscles' => ['Upper Pectoralis', 'Anterior Deltoids', 'Triceps', 'Core'],
                'description' => 'Press one dumbbell while keeping the other arm retracted. Challenges anti-rotation core stability and corrects left-right strength imbalances.',
            ],
            [
                'name' => 'Alternating Dumbbell Incline Press',
                'equipment' => 'Bench Press Incline',
                'category_slug' => 'stability',
                'target_muscles' => ['Upper Pectoralis', 'Anterior Deltoids', 'Triceps', 'Core'],
                'description' => 'Press dumbbells one arm at a time, keeping the non-working side locked out. Increases time under tension and core engagement.',
            ],
            [
                'name' => 'Dumbbell Incline Twist Press',
                'equipment' => 'Bench Press Incline',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Upper Pectoralis', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Start with neutral grip (palms facing), press and rotate to pronated grip at top. Twist increases upper chest contraction and range of motion.',
            ],
            [
                'name' => 'Dumbbell Incline Pullover',
                'equipment' => 'Bench Press Incline',
                'category_slug' => 'isolation',
                'target_muscles' => ['Upper Pectoralis', 'Latissimus Dorsi', 'Serratus Anterior', 'Triceps Long Head'],
                'description' => 'Lie across the incline bench with upper back supported, extend dumbbell overhead and pull it back in an arc. Stretches and works upper chest and lats.',
            ],
            [
                'name' => 'Incline Bench Press with Chains',
                'equipment' => 'Bench Press Incline',
                'category_slug' => 'power',
                'target_muscles' => ['Upper Pectoralis', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Attach chains to the barbell so weight increases at the top. Accommodating resistance builds explosive power through the incline pressing range.',
            ],
            [
                'name' => 'Incline Bench Press with Bands',
                'equipment' => 'Bench Press Incline',
                'category_slug' => 'power',
                'target_muscles' => ['Upper Pectoralis', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Anchor resistance bands to the bar and bench, increasing tension at lockout. Trains acceleration and lockout force for incline presses.',
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
