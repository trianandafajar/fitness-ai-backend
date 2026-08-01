<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class BeltSquatMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Standard Belt Squat',
                'equipment' => 'Belt Squat Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors', 'Core'],
                'description' => 'Stand on the platform with feet shoulder-width apart, belt around hips. Squat down by bending knees and pushing hips back until thighs are at least parallel, then drive through the feet to return to standing without locking out.',
            ],
            [
                'name' => 'Wide Stance Belt Squat',
                'equipment' => 'Belt Squat Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Adductors', 'Quadriceps', 'Hamstrings'],
                'description' => 'Take a wide stance with toes slightly out. Squat down, keeping knees tracking over toes, to emphasize inner thighs and glutes.',
            ],
            [
                'name' => 'Narrow Stance Belt Squat',
                'equipment' => 'Belt Squat Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Quadriceps (Vastus Lateralis)', 'Glutes'],
                'description' => 'Place feet close together in the center of the platform. Shifts tension to the outer quadriceps and reduces adductor involvement.',
            ],
            [
                'name' => 'Toes-Out Belt Squat',
                'equipment' => 'Belt Squat Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Vastus Medialis Oblique (VMO)', 'Adductors', 'Quadriceps'],
                'description' => 'Turn toes outward with feet shoulder-width. Emphasizes the inner quad (VMO) and inner thighs.',
            ],
            [
                'name' => 'Toes-In Belt Squat',
                'equipment' => 'Belt Squat Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Vastus Lateralis', 'Quadriceps'],
                'description' => 'Point toes slightly inward. Biases the outer quadriceps.',
            ],
            [
                'name' => 'Heels-Elevated Belt Squat',
                'equipment' => 'Belt Squat Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Quadriceps'],
                'description' => 'Place heels on a small wedge or plate to elevate them. Increases knee flexion and quadriceps isolation, reducing glute involvement.',
            ],
            [
                'name' => 'Single-Leg Belt Squat',
                'equipment' => 'Belt Squat Machine',
                'category_slug' => 'stability',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Stand on one leg on the platform, other leg held off the ground. Squat down with control, keeping the knee aligned, then press back up. Corrects imbalances and challenges stability.',
            ],
            [
                'name' => 'Belt Squat Bulgarian Split Squat',
                'equipment' => 'Belt Squat Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Elevate rear foot on a bench behind you, belt attached, front foot on platform. Lower into a deep single-leg squat, then drive back up. Combines unilateral strength with belt squat benefits.',
            ],
            [
                'name' => 'Pause Belt Squat',
                'equipment' => 'Belt Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings'],
                'description' => 'At the bottom of the squat, pause for 1-3 seconds while maintaining tension, then explode back up. Eliminates momentum and increases time under tension.',
            ],
            [
                'name' => 'Eccentric-Emphasis Belt Squat',
                'equipment' => 'Belt Squat Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings'],
                'description' => 'Lower the weight very slowly (3-5 seconds), then push back up at normal speed. Overloads the negative phase for muscle growth.',
            ],
            [
                'name' => 'Tempo Belt Squat (3-1-3)',
                'equipment' => 'Belt Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Take 3 seconds to lower, 1-second pause at the bottom, 3 seconds to rise. Maximizes time under tension and control.',
            ],
            [
                'name' => 'Isometric Hold Belt Squat',
                'equipment' => 'Belt Squat Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Core'],
                'description' => 'Squat to a 90 knee bend or maximum tension point and hold for 10-30 seconds. Builds static strength and endurance.',
            ],
            [
                'name' => 'Explosive Belt Squat',
                'equipment' => 'Belt Squat Machine',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings'],
                'description' => 'Use a moderate weight, lower quickly but under control, then drive upward as explosively as possible. Develops rate of force production.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Belt Squat',
                'equipment' => 'Belt Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps'],
                'description' => 'Only perform the top half of the range, from mid-point to near-lockout. Keeps continuous tension on the quadriceps.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Belt Squat',
                'equipment' => 'Belt Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes'],
                'description' => 'Move from the deepest position up to the mid-point only, focusing on the stretch and initial contraction.',
            ],
            [
                'name' => '21s Belt Squat',
                'equipment' => 'Belt Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes'],
                'description' => '7 bottom-half reps, 7 top-half reps, then 7 full-range reps without rest. Intense metabolic stress for thigh development.',
            ],
            [
                'name' => 'Pulse Belt Squat',
                'equipment' => 'Belt Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes'],
                'description' => 'At the bottom of the squat, perform small rapid pulses without standing up. Creates constant tension and a deep burn.',
            ],
            [
                'name' => 'Belt Squat March (Knee Raise)',
                'equipment' => 'Belt Squat Machine',
                'category_slug' => 'functional',
                'target_muscles' => ['Quadriceps', 'Hip Flexors', 'Glutes', 'Core'],
                'description' => 'While in a half-squat position, alternately lift one knee toward the chest then lower, maintaining tension. Simulates a dynamic climbing or marching motion under load.',
            ],
        ];

        $sourceDir = public_path('execises/belt-squat-machine');
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
