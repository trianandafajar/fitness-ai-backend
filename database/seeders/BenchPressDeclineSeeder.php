<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class BenchPressDeclineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Standard Barbell Decline Press',
                'equipment' => 'Bench Press Decline',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Pectoralis Major (Sternal Head)', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Lie on decline bench, grip bar slightly wider than shoulder-width, lower to lower sternum, and press to full lockout. Emphasizes the lower chest fibers.',
            ],
            [
                'name' => 'Close-Grip Barbell Decline Press',
                'equipment' => 'Bench Press Decline',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Lower Pectoralis', 'Anterior Deltoids'],
                'description' => 'Grip barbell with hands shoulder-width apart, keep elbows tucked, lower to lower sternum. Shifts focus to triceps while still hitting the lower chest.',
            ],
            [
                'name' => 'Wide-Grip Barbell Decline Press',
                'equipment' => 'Bench Press Decline',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Lower Pectoralis Major', 'Anterior Deltoids'],
                'description' => 'Take a wider than standard grip, lowering bar to lower chest. Increases stretch and outer pec recruitment, emphasizing chest width.',
            ],
            [
                'name' => 'Reverse-Grip Barbell Decline Press',
                'equipment' => 'Bench Press Decline',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Pectoralis', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Grip bar with palms facing up (supinated), lower to lower chest. Alters elbow path, increasing tricep and lower chest activation while reducing shoulder strain.',
            ],
            [
                'name' => 'Pause Decline Barbell Press',
                'equipment' => 'Bench Press Decline',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Pectoralis', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Lower bar to lower chest, pause for 1-3 seconds to eliminate momentum, then explosively press up. Builds pure pressing strength off the chest.',
            ],
            [
                'name' => 'Tempo Decline Barbell Press (3-1-3)',
                'equipment' => 'Bench Press Decline',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Lower Pectoralis', 'Triceps', 'Anterior Deltoids'],
                'description' => '3 seconds lowering, 1-second pause at chest, 3 seconds pressing. Maximizes time under tension for muscle growth and control.',
            ],
            [
                'name' => 'Eccentric-Emphasis Decline Barbell Press',
                'equipment' => 'Bench Press Decline',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Lower Pectoralis', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Lower the bar over 4-5 seconds, then press up at normal speed or with assistance. Overloads the negative phase for strength and size gains.',
            ],
            [
                'name' => 'Decline Bench Press with Chains',
                'equipment' => 'Bench Press Decline',
                'category_slug' => 'power',
                'target_muscles' => ['Lower Pectoralis', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Suspend chains from the barbell, making weight heavier at lockout. Accommodating resistance builds explosive power through the full pressing range.',
            ],
            [
                'name' => 'Decline Bench Press with Bands',
                'equipment' => 'Bench Press Decline',
                'category_slug' => 'power',
                'target_muscles' => ['Lower Pectoralis', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Attach resistance bands to the bar and bench, increasing tension as you press up. Teaches acceleration and lockout strength.',
            ],
            [
                'name' => 'Dumbbell Decline Press',
                'equipment' => 'Bench Press Decline',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Pectoralis Major', 'Anterior Deltoids', 'Triceps', 'Stabilizers'],
                'description' => 'Hold dumbbells above chest, press to full extension. Independent arm movement allows deeper stretch and corrects imbalances.',
            ],
            [
                'name' => 'Dumbbell Decline Flyes',
                'equipment' => 'Bench Press Decline',
                'category_slug' => 'isolation',
                'target_muscles' => ['Lower Pectoralis Major', 'Anterior Deltoids'],
                'description' => 'With a slight elbow bend, lower dumbbells in a wide arc to stretch the chest, then squeeze them back together. Isolates the lower chest fibers.',
            ],
            [
                'name' => 'Dumbbell Decline Squeeze Press (Hex Press)',
                'equipment' => 'Bench Press Decline',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Lower Pectoralis Major (Inner)', 'Triceps'],
                'description' => 'Press dumbbells tightly together with palms facing each other throughout the movement. Constant tension targets the inner lower chest.',
            ],
            [
                'name' => 'Single-Arm Dumbbell Decline Press',
                'equipment' => 'Bench Press Decline',
                'category_slug' => 'stability',
                'target_muscles' => ['Lower Pectoralis', 'Anterior Deltoids', 'Triceps', 'Core'],
                'description' => 'Press one dumbbell while keeping the other retracted. Challenges anti-rotation core stability and addresses unilateral strength.',
            ],
            [
                'name' => 'Alternating Dumbbell Decline Press',
                'equipment' => 'Bench Press Decline',
                'category_slug' => 'stability',
                'target_muscles' => ['Lower Pectoralis', 'Anterior Deltoids', 'Triceps', 'Core'],
                'description' => 'Press dumbbells one arm at a time in a seesaw pattern. Increases time under tension and demands core engagement for balance.',
            ],
            [
                'name' => 'Dumbbell Decline Twist Press',
                'equipment' => 'Bench Press Decline',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Lower Pectoralis', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Start with neutral grip (palms facing), press and rotate to pronated grip at the top. Twist enhances lower chest contraction and range of motion.',
            ],
            [
                'name' => 'Dumbbell Decline Pullover',
                'equipment' => 'Bench Press Decline',
                'category_slug' => 'isolation',
                'target_muscles' => ['Lower Pectoralis', 'Latissimus Dorsi', 'Serratus Anterior', 'Triceps Long Head'],
                'description' => 'Lie across the decline bench with upper back supported, extend dumbbell overhead and pull it back up in an arc. Stretches lower chest and lats.',
            ],
            [
                'name' => 'Decline Crunch',
                'equipment' => 'Bench Press Decline',
                'category_slug' => 'core',
                'target_muscles' => ['Rectus Abdominis', 'Obliques'],
                'description' => 'Lie on decline bench with feet secured, curl upper body upward while exhaling, squeeze abs at the top, then lower with control.',
            ],
            [
                'name' => 'Decline Sit-Up',
                'equipment' => 'Bench Press Decline',
                'category_slug' => 'core',
                'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Obliques'],
                'description' => 'Perform a full sit-up from a decline position, raising torso until nearly vertical. Adds resistance to the classic sit-up movement.',
            ],
            [
                'name' => 'Decline Russian Twist',
                'equipment' => 'Bench Press Decline',
                'category_slug' => 'core',
                'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Transverse Abdominis'],
                'description' => 'Hold a weight or hands together, lean back slightly, and rotate torso side to side. Decline angle increases oblique engagement and difficulty.',
            ],
            [
                'name' => 'Decline Leg Raise',
                'equipment' => 'Bench Press Decline',
                'category_slug' => 'core',
                'target_muscles' => ['Lower Rectus Abdominis', 'Hip Flexors', 'Transverse Abdominis'],
                'description' => 'Lie on decline bench holding the top, lift legs from bottom to 90 degrees or higher, then lower without touching. Targets lower abs intensely.',
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
