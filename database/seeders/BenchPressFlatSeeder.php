<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class BenchPressFlatSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Standard Barbell Bench Press',
                'equipment' => 'Bench Press Flat',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major (Sternal Head)', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Lie flat, grip the bar slightly wider than shoulder-width, lower to mid-chest, and press up to full lockout. The foundational pressing movement for overall chest strength.',
            ],
            [
                'name' => 'Close-Grip Barbell Bench Press',
                'equipment' => 'Bench Press Flat',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Inner Pectoralis', 'Anterior Deltoids'],
                'description' => 'Grip the barbell with hands shoulder-width apart, keep elbows tucked, lower to lower sternum. Shifts emphasis to triceps while still loading the chest.',
            ],
            [
                'name' => 'Wide-Grip Barbell Bench Press',
                'equipment' => 'Bench Press Flat',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major (Sternal Head)', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Take a grip wider than standard, lowering the bar to mid-chest. Greater horizontal abduction increases chest stretch and recruitment of the outer pec fibers.',
            ],
            [
                'name' => 'Reverse-Grip Barbell Bench Press',
                'equipment' => 'Bench Press Flat',
                'category_slug' => 'strength',
                'target_muscles' => ['Upper Pectoralis (Clavicular Head)', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Grip the bar with palms facing up (supinated), lower to lower chest. Alters the elbow path, increasing upper pec and tricep activation.',
            ],
            [
                'name' => 'Guillotine Press (Neck Press)',
                'equipment' => 'Bench Press Flat',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids'],
                'description' => 'Lower the bar to the neck or chin area with elbows flared wide, then press up. Maximizes chest stretch and isolation, reducing tricep involvement.',
            ],
            [
                'name' => 'Pause Bench Press',
                'equipment' => 'Bench Press Flat',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major', 'Triceps', 'Anterior Deltoids', 'Core'],
                'description' => 'Lower the bar to the chest, pause for 1-3 seconds without momentum, then explosively press up. Eliminates stretch reflex to build pure pressing power off the chest.',
            ],
            [
                'name' => 'Spoto Press',
                'equipment' => 'Bench Press Flat',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Lower the bar to 1-2 inches above the chest, pause briefly while maintaining tension, then press. Develops control and tension through the pressing muscles.',
            ],
            [
                'name' => 'Tempo Bench Press (3-1-3)',
                'equipment' => 'Bench Press Flat',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Pectoralis Major', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Take 3 seconds to lower the bar, pause 1 second at the bottom, then take 3 seconds to press up. Increases time under tension for muscle growth.',
            ],
            [
                'name' => 'Eccentric-Emphasis Bench Press',
                'equipment' => 'Bench Press Flat',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Pectoralis Major', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Lower the bar slowly over 4-5 seconds, then press up with maximal assistance or reduced weight. Overloads the negative phase for strength and size gains.',
            ],
            [
                'name' => 'Board Press',
                'equipment' => 'Bench Press Flat',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Pectoralis Major', 'Anterior Deltoids'],
                'description' => 'Place wooden boards on the chest to shorten the range of motion, pressing from a higher starting point. Isolates lockout strength and tricep power.',
            ],
            [
                'name' => 'Bench Press with Chains',
                'equipment' => 'Bench Press Flat',
                'category_slug' => 'power',
                'target_muscles' => ['Pectoralis Major', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Suspend chains from the barbell, making the weight heavier at lockout. Accommodating resistance builds explosive power through the full pressing range.',
            ],
            [
                'name' => 'Bench Press with Bands',
                'equipment' => 'Bench Press Flat',
                'category_slug' => 'power',
                'target_muscles' => ['Pectoralis Major', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Attach resistance bands to the bar and bench, increasing tension as you press up. Teaches acceleration and lockout force production.',
            ],
            [
                'name' => 'Dumbbell Bench Press',
                'equipment' => 'Bench Press Flat',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps', 'Stabilizers'],
                'description' => 'Lie flat, press a pair of dumbbells from chest height to full extension. Greater range of motion and independent arm recruitment corrects imbalances.',
            ],
            [
                'name' => 'Dumbbell Flyes',
                'equipment' => 'Bench Press Flat',
                'category_slug' => 'isolation',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids'],
                'description' => 'With a slight elbow bend, open arms wide to a deep chest stretch, then squeeze the dumbbells back together like hugging a tree. Pure chest isolation.',
            ],
            [
                'name' => 'Dumbbell Squeeze Press (Hex Press)',
                'equipment' => 'Bench Press Flat',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Pectoralis Major (Inner)', 'Triceps'],
                'description' => 'Press the dumbbells together firmly throughout the movement, palms facing each other. Constant tension emphasizes inner chest fibers.',
            ],
            [
                'name' => 'Dumbbell Pullover',
                'equipment' => 'Bench Press Flat',
                'category_slug' => 'isolation',
                'target_muscles' => ['Latissimus Dorsi', 'Pectoralis Major (Sternal)', 'Serratus Anterior', 'Triceps Long Head'],
                'description' => 'Lie across the bench with upper back supported, extend a dumbbell overhead and pull it back up in a arc. Targets lats and chest simultaneously.',
            ],
            [
                'name' => 'Single-Arm Dumbbell Press',
                'equipment' => 'Bench Press Flat',
                'category_slug' => 'stability',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps', 'Core', 'Obliques'],
                'description' => 'Press one dumbbell at a time while the opposite arm stays retracted. Challenges anti-rotation core stability and unilateral strength.',
            ],
            [
                'name' => 'Alternating Dumbbell Press',
                'equipment' => 'Bench Press Flat',
                'category_slug' => 'stability',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps', 'Core'],
                'description' => 'Press dumbbells one arm at a time in a seesaw pattern. Increases time under tension on each side and engages core to maintain balance.',
            ],
            [
                'name' => 'Dumbbell Twist Press',
                'equipment' => 'Bench Press Flat',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Press the dumbbells from a neutral grip (palms facing) and rotate to pronated grip at the top. The rotation increases chest contraction and range of motion.',
            ],
            [
                'name' => 'Dumbbell Around the World',
                'equipment' => 'Bench Press Flat',
                'category_slug' => 'isolation',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids'],
                'description' => 'Start with dumbbells overhead, lower them in a wide circular arc to the sides, then reverse the path. Provides a deep, continuous stretch to the entire chest.',
            ],
        ];

        $sourceDir = public_path('execises/bench-press-flat');
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
