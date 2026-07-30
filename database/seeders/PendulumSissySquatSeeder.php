<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class PendulumSissySquatSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Pendulum Sissy Squat Standard', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps (Rectus Femoris, Vastus Medialis)', 'Core', 'Glutes', 'Hip Flexors', 'Calves'], 'description' => 'Set footplate, lean back against pad. Squat down by leaning backward, keeping body straight. Press up through quads.'],
            ['name' => 'Pendulum Sissy Squat Full Range of Motion', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps (Full)', 'Glutes', 'Core', 'Hip Flexors', 'Calves', 'Stabilizers'], 'description' => 'Lower as deep as possible until thighs past parallel. Maximal quad stretch and contraction.'],
            ['name' => 'Pendulum Sissy Squat Partial ROM (Top Half)', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps (Rectus Femoris)', 'Core', 'Calves', 'Hip Flexors'], 'description' => 'Partial squat in top half. Emphasizes quad peak contraction and knee extension.'],
            ['name' => 'Pendulum Sissy Squat Partial ROM (Bottom Half)', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps (Vastus Medialis, Stretched)', 'Glutes', 'Core', 'Calves'], 'description' => 'Partial squat in bottom half. Emphasizes quad stretch and VMO engagement.'],
            ['name' => 'Pendulum Sissy Squat Isometric Hold (Bottom)', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'core', 'target_muscles' => ['Quadriceps (Stretched)', 'Core', 'Glutes', 'Hip Flexors', 'Calves'], 'description' => 'Hold at bottom position for 3-5 seconds. Static quad stretch and strength.'],
            ['name' => 'Pendulum Sissy Squat Isometric Hold (Mid-Contraction)', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'core', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Hip Flexors', 'Calves', 'Stabilizers'], 'description' => 'Hold at mid-point of squat. Static quad strength at 90°.'],
            ['name' => 'Pendulum Sissy Squat Pause Reps (Bottom)', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Hip Flexors', 'Calves', 'Stabilizers'], 'description' => 'Lower, pause 2-3 seconds at bottom, press up. Eliminates stretch reflex.'],
            ['name' => 'Pendulum Sissy Squat Slow Tempo (3-1-3)', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Hip Flexors', 'Calves', 'Stabilizers'], 'description' => '3 sec lower, 1 sec hold, 3 sec press. Time under tension quad work.'],
            ['name' => 'Pendulum Sissy Squat Eccentric Focus (Slow Negative)', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Hip Flexors', 'Calves', 'Stabilizers'], 'description' => 'Press quickly, lower extremely slow (4-5 sec). Eccentric quad overload.'],
            ['name' => 'Pendulum Sissy Squat Explosive Concentric', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Fast-Twitch Fibers', 'Core', 'Glutes', 'Calves'], 'description' => 'Explosive press up, slow controlled lower. Power development for quads.'],
            ['name' => 'Pendulum Sissy Squat Drop Set', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Hip Flexors', 'Calves', 'Stabilizers'], 'description' => 'Start heavy, squat to failure, reduce weight, continue. Quad hypertrophy dropset.'],
            ['name' => 'Pendulum Sissy Squat Rest-Pause Set', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Hip Flexors', 'Calves', 'Stabilizers'], 'description' => 'Squat to failure, rest 10 sec, continue. Density training for quads.'],
            ['name' => 'Pendulum Sissy Squat 1.5 Reps', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Hip Flexors', 'Calves', 'Stabilizers'], 'description' => 'Full squat, half press, full squat again. Extended time under tension.'],
            ['name' => 'Pendulum Sissy Squat 21s', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Hip Flexors', 'Calves', 'Stabilizers'], 'description' => '7 bottom half, 7 top half, 7 full reps. Complete quad development.'],
            ['name' => 'Pendulum Sissy Squat Pulse Reps (Small Range)', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Hip Flexors', 'Calves', 'Stabilizers'], 'description' => 'Small pulsing movements at bottom. Builds quad pump and endurance.'],
            ['name' => 'Pendulum Sissy Squat Narrow Foot Placement', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps (Vastus Lateralis)', 'Core', 'Glutes', 'Calves', 'Hip Flexors'], 'description' => 'Narrow stance on footplate. Emphasizes outer quads.'],
            ['name' => 'Pendulum Sissy Squat Wide Foot Placement', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps (Vastus Medialis)', 'Adductors', 'Core', 'Glutes', 'Calves'], 'description' => 'Wide stance on footplate. Emphasizes inner quads and adductors.'],
            ['name' => 'Pendulum Sissy Squat Single-Leg Squat', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Calves', 'Hip Flexors', 'Stabilizers'], 'description' => 'Squat with one leg only. Extreme unilateral quad development.'],
            ['name' => 'Pendulum Sissy Squat Toes Elevated', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps (Rectus Femoris)', 'Core', 'Calves', 'Hip Flexors', 'Glutes'], 'description' => 'Place heels on platform, toes elevated. Emphasizes rectus femoris and knee extension.'],
            ['name' => 'Pendulum Sissy Squat Heels Elevated', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps (Vastus Medialis)', 'Core', 'Glutes', 'Calves', 'Hip Flexors'], 'description' => 'Place toes on platform, heels elevated. Emphasizes VMO and quad sweep.'],
            ['name' => 'Pendulum Sissy Squat Band Resisted', 'equipment' => 'Pendulum Sissy Squat, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Hip Flexors', 'Calves', 'Stabilizers'], 'description' => 'Attach band for variable resistance. Accommodating resistance squat.'],
            ['name' => 'Pendulum Sissy Squat Weighted Vest', 'equipment' => 'Pendulum Sissy Squat, Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Hip Flexors', 'Calves', 'Stabilizers'], 'description' => 'Wear weighted vest during squat. Increased load for quad development.'],
            ['name' => 'Pendulum Sissy Squat Dumbbell Goblet', 'equipment' => 'Pendulum Sissy Squat, Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Hip Flexors', 'Calves', 'Stabilizers'], 'description' => 'Hold dumbbell goblet style during squat. Added load and core engagement.'],
            ['name' => 'Pendulum Sissy Squat Barbell Front Rack', 'equipment' => 'Pendulum Sissy Squat, Barbell', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Hip Flexors', 'Calves', 'Stabilizers'], 'description' => 'Hold barbell in front rack position. Heavier load for quad hypertrophy.'],
            ['name' => 'Pendulum Sissy Squat Smith Machine Assisted', 'equipment' => 'Pendulum Sissy Squat, Smith Machine', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Hip Flexors', 'Calves', 'Stabilizers'], 'description' => 'Use Smith machine for balance assistance during squat.'],
            ['name' => 'Pendulum Sissy Squat Isometric Wall Sit Variation', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'core', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Hip Flexors', 'Calves', 'Stabilizers'], 'description' => 'Hold sissy squat position against machine. Static quad endurance.'],
            ['name' => 'Pendulum Sissy Squat Paused at Top (Lockout)', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Calves', 'Stabilizers'], 'description' => 'Pause 2-3 seconds at top extension. Emphasizes quad lockout strength.'],
            ['name' => 'Pendulum Sissy Squat Slow Negative Only', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps (Eccentric)', 'Core', 'Glutes', 'Calves', 'Hip Flexors'], 'description' => 'Lower extremely slow (5 sec), press normally. Eccentric quad focus.'],
            ['name' => 'Pendulum Sissy Squat Alternating Legs', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Calves', 'Hip Flexors', 'Stabilizers'], 'description' => 'Alternate squatting legs one at a time. Unilateral and core engagement.'],
            ['name' => 'Pendulum Sissy Squat Isometric at 45 Degrees', 'equipment' => 'Pendulum Sissy Squat', 'category_slug' => 'core', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Hip Flexors', 'Calves', 'Stabilizers'], 'description' => 'Hold at 45° knee angle. Static quad strength in mid-range.'],
        ];

        $sourceDir = public_path('execises/pendulum-sissy-squat');
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

            Exercise::create([
                'name' => $data['name'],
                'equipment' => $data['equipment'],
                'category_id' => $categoryId,
                'target_muscles' => $data['target_muscles'],
                'description' => $data['description'],
                'image' => $data['image'] ?? null,
            ]);
        }
    }
}
