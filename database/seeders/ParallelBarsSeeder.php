<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ParallelBarsSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Parallel Bar Dip',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'],
                'description' => 'Support on bars, lower body until elbows at 90°, push up. Upper body pressing compound.',
            ],
            [
                'name' => 'Weighted Parallel Bar Dip',
                'equipment' => 'Parallel Bars, Dip Belt',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'],
                'description' => 'Perform dips with added weight via dip belt. Increased upper body pressing load.',
            ],
            [
                'name' => 'Parallel Bar Triceps Dip (Upright)',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Anterior Deltoids', 'Core', 'Chest', 'Forearms'],
                'description' => 'Upright torso, elbows tucked. Lower and press. Tricep-dominant dip variation.',
            ],
            [
                'name' => 'Parallel Bar Chest Dip (Leaning Forward)',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Serratus Anterior'],
                'description' => 'Lean torso forward (30-45°). Lower deeply, press up. Chest-focused dip.',
            ],
            [
                'name' => 'Parallel Bar L-Sit Dip',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Core (Rectus Abdominis, Hip Flexors)', 'Shoulders'],
                'description' => 'Hold L-sit while performing dips. Core and upper body combination.',
            ],
            [
                'name' => 'Parallel Bar L-Sit Hold',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'stability',
                'target_muscles' => ['Core (Rectus Abdominis, Hip Flexors)', 'Triceps', 'Shoulders', 'Quads'],
                'description' => 'Hold L-sit position on bars. Static core, triceps, and shoulder strength.',
            ],
            [
                'name' => 'Parallel Bar V-Sit Hold',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'stability',
                'target_muscles' => ['Core (Entire)', 'Hip Flexors', 'Triceps', 'Shoulders', 'Hamstrings'],
                'description' => 'Hold V-sit position on bars. Advanced static core strength.',
            ],
            [
                'name' => 'Parallel Bar Support Hold',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'stability',
                'target_muscles' => ['Chest', 'Triceps', 'Shoulders', 'Core', 'Stabilizers'],
                'description' => 'Hold locked-out support position. Static upper body endurance.',
            ],
            [
                'name' => 'Parallel Bar Knee Raise',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Iliopsoas', 'Rectus Abdominis'],
                'description' => 'Support on bars. Raise knees to chest. Lower ab and hip flexor.',
            ],
            [
                'name' => 'Parallel Bar Straight Leg Raise',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Quadriceps', 'Iliopsoas'],
                'description' => 'Support on bars. Raise straight legs to 90°. Advanced lower core.',
            ],
            [
                'name' => 'Parallel Bar Toes-to-Bar',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Lats', 'Obliques'],
                'description' => 'Support on bars. Lift toes to bar height. Maximal core contraction.',
            ],
            [
                'name' => 'Parallel Bar Russian Dip',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Core', 'Shoulders', 'Stabilizers', 'Forearms'],
                'description' => 'Dip, then at bottom lean back and press up. Advanced dipping variation.',
            ],
            [
                'name' => 'Parallel Bar Bulgarian Dip',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Chest', 'Core', 'Stabilizers', 'Biceps', 'Shoulders'],
                'description' => 'Hands turned inward (palms facing). Dip with elbows flared. Stability challenge.',
            ],
            [
                'name' => 'Parallel Bar Dip (Isometric Hold at Bottom)',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'stability',
                'target_muscles' => ['Chest', 'Triceps', 'Core', 'Shoulders', 'Stabilizers', 'Forearms'],
                'description' => 'Hold bottom dip position (elbows at 90°). Static pressing endurance.',
            ],
            [
                'name' => 'Parallel Bar Dip Pause Reps (Bottom)',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'],
                'description' => 'Lower, pause 2-3 seconds at bottom, press up. Eliminates stretch reflex.',
            ],
            [
                'name' => 'Parallel Bar Dip Slow Tempo (3-1-3)',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'],
                'description' => '3 sec lower, 1 sec hold, 3 sec press. Time under tension.',
            ],
            [
                'name' => 'Parallel Bar Dip Eccentric Focus (Slow Negative)',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'],
                'description' => 'Press quickly, lower extremely slow (4-5 sec). Eccentric chest overload.',
            ],
            [
                'name' => 'Parallel Bar Dip Explosive Concentric',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Fast-Twitch Fibers', 'Core', 'Anterior Deltoids'],
                'description' => 'Explosive press up, slow controlled lower. Power development.',
            ],
            [
                'name' => 'Parallel Bar Drop Set (Dips)',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'],
                'description' => 'Start heavy (weighted), dip to failure, remove weight, continue. Hypertrophy dropset.',
            ],
            [
                'name' => 'Parallel Bar Rest-Pause Dip',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'],
                'description' => 'Dip to failure, rest 10 sec, continue. Density training.',
            ],
            [
                'name' => 'Parallel Bar Dip (Partial Reps Top Half)',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Chest (Peak)', 'Core', 'Anterior Deltoids'],
                'description' => 'Partial dips in top half. Emphasizes lockout and triceps.',
            ],
            [
                'name' => 'Parallel Bar Dip (Partial Reps Bottom Half)',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest (Stretched)', 'Triceps', 'Core', 'Anterior Deltoids'],
                'description' => 'Partial dips in bottom half. Emphasizes stretch and chest engagement.',
            ],
            [
                'name' => 'Parallel Bar Dip (1.5 Reps)',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'],
                'description' => 'Full dip, half press, full dip again. Extended TUT.',
            ],
            [
                'name' => 'Parallel Bar Dip (21s)',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'],
                'description' => '7 bottom half, 7 top half, 7 full dips. Complete development.',
            ],
            [
                'name' => 'Parallel Bar Dip (Pulse Reps)',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Core', 'Anterior Deltoids', 'Stabilizers'],
                'description' => 'Small pulsing dips at top or bottom. Builds pump and endurance.',
            ],
            [
                'name' => 'Parallel Bar Single-Arm Dip (Assisted)',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Core', 'Obliques', 'Shoulders', 'Stabilizers'],
                'description' => 'Dip with one arm, other arm assisting. Unilateral pressing.',
            ],
            [
                'name' => 'Parallel Bar Band Assisted Dip',
                'equipment' => 'Parallel Bars, Resistance Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'],
                'description' => 'Band under knees assists dip. For beginners or high-rep work.',
            ],
            [
                'name' => 'Parallel Bar Band Resisted Dip',
                'equipment' => 'Parallel Bars, Resistance Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'],
                'description' => 'Band adds resistance during dip. Accommodating resistance.',
            ],
            [
                'name' => 'Parallel Bar L-Sit to Dip Transition',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Core', 'Hip Flexors', 'Chest', 'Triceps', 'Shoulders', 'Quads'],
                'description' => 'L-Sit hold, then perform dip. Core and pressing combination.',
            ],
            [
                'name' => 'Parallel Bar Knee Raise to Dip',
                'equipment' => 'Parallel Bars',
                'category_slug' => 'strength',
                'target_muscles' => ['Core', 'Lower Abs', 'Chest', 'Triceps', 'Hip Flexors'],
                'description' => 'Knee raise then dip. Core and upper body superset.',
            ],
        ];

        $sourceDir = public_path('execises/parallel-bars');
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
