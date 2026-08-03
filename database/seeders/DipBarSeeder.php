<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class DipBarSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Parallel Bar Dip', 'equipment' => 'Dip Bar', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids'], 'description' => 'Lower body by bending elbows until shoulders are below elbows, then push up to lockout. Core stays engaged.'],
            ['name' => 'Weighted Parallel Bar Dip', 'equipment' => 'Dip Bar, Weight Belt', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids'], 'description' => 'Same as parallel dip but with added weight via a belt or dumbbell between legs to increase intensity.'],
            ['name' => 'Triceps Dip', 'equipment' => 'Dip Bar', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Anterior Deltoids'], 'description' => 'Keep torso upright and elbows tucked close to body. Lower until forearms are parallel, then press up.'],
            ['name' => 'Chest Dip (Lean-Forward Dip)', 'equipment' => 'Dip Bar', 'category_slug' => 'strength', 'target_muscles' => ['Lower Chest', 'Triceps', 'Anterior Deltoids'], 'description' => 'Lean torso forward (about 30-45°) with wide elbows. Lower deeply to stretch chest, then push up.'],
            ['name' => 'L-Sit Dip', 'equipment' => 'Dip Bar', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Core (Rectus Abdominis', 'Hip Flexors)'], 'description' => 'Hold legs straight out in front (L-position) throughout the dip. Engages core intensely while performing dips.'],
            ['name' => 'Knee Raise Dip', 'equipment' => 'Dip Bar', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Core (Lower Abs', 'Hip Flexors)'], 'description' => 'Perform a dip while simultaneously raising knees to chest at the top of each rep. Combines core and upper body.'],
            ['name' => 'Russian Dip', 'equipment' => 'Dip Bar', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Shoulders', 'Core'], 'description' => 'Start in support hold, dip down, then explosively push up and lean back, hovering over the bars. Advanced move.'],
            ['name' => 'Bulgarian Dip (Ring-Style on Bars)', 'equipment' => 'Dip Bar', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Chest', 'Stabilizers', 'Core'], 'description' => 'Turn hands inward (palms facing each other) and dip with elbows flaring slightly. Increases shoulder stability.'],
            ['name' => 'Slow Negative Dip', 'equipment' => 'Dip Bar', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids'], 'description' => 'Take 3-5 seconds to lower from top to bottom, then push up explosively. Builds strength and muscle control.'],
            ['name' => 'Pulse Dip (Quarter Reps)', 'equipment' => 'Dip Bar', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Chest'], 'description' => 'Perform small partial reps (pulses) at the bottom or top range of motion to increase time under tension.'],
            ['name' => 'Single Bar Dip (Parallel Grip on One Bar)', 'equipment' => 'Dip Bar (Single Bar)', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Core', 'Stabilizers'], 'description' => 'Place both hands on one bar (side-by-side) and dip. Emphasizes triceps and requires high balance and stability.'],
            ['name' => 'Dip Hold (Support Hold)', 'equipment' => 'Dip Bar', 'category_slug' => 'core', 'target_muscles' => ['Chest', 'Triceps', 'Core', 'Shoulders'], 'description' => 'Hold the top locked-out position for time. Engages entire upper body and core statically.'],
            ['name' => 'Bottom Hold Dip', 'equipment' => 'Dip Bar', 'category_slug' => 'core', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids'], 'description' => 'Hold the bottom stretched position (elbows at 90°) for time. Builds joint strength and endurance.'],
            ['name' => 'Dip to Front Support (Dips to Straight Bar Support)', 'equipment' => 'Dip Bar', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Lats', 'Core'], 'description' => 'Dip down, then at the top push your body forward so your torso is over the bars in a support position. Then return.'],
            ['name' => 'Clapping Dip (Explosive)', 'equipment' => 'Dip Bar', 'category_slug' => 'power', 'target_muscles' => ['Chest', 'Triceps', 'Fast-Twitch Fibers'], 'description' => 'Explosively push up so hands leave the bars, clap, and catch. Requires high power and coordination. Advanced.'],
            ['name' => 'Hindu Dip (Deep Stretch Dip)', 'equipment' => 'Dip Bar', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Shoulders', 'Triceps', 'Lats'], 'description' => 'Lower as deep as possible (shoulders below bars) with a slight forward lean, then press up. Maximizes range of motion.'],
            ['name' => 'Side-to-Side Dip', 'equipment' => 'Dip Bar', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Core Obliques'], 'description' => 'Dip down and shift your body weight to one side while dipping, alternating sides. Works stabilizers and obliques.'],
            ['name' => 'Straight Bar Dip (On Dip Bar Ends)', 'equipment' => 'Dip Bar (Ends)', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Core'], 'description' => 'Grip the very ends of the parallel bars (hands neutral) and dip with elbows back. More triceps-focused.'],
            ['name' => 'Dip with Band Assistance', 'equipment' => 'Dip Bar, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids'], 'description' => 'Loop a band under your knees or feet to reduce bodyweight. Great for beginners or high-rep training.'],
            ['name' => 'Archer Dip (One-Arm Dominant)', 'equipment' => 'Dip Bar', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Core', 'Stabilizers'], 'description' => 'Dip while extending one arm straight and leaning onto the other arm. Emphasizes one side at a time. Advanced.'],
        ];

        $sourceDir = public_path('execises/dip-bar');
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
