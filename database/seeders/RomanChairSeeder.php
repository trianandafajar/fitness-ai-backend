<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class RomanChairSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Hyperextension Standard',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Hips on pad, ankles secured. Lower torso forward, raise to parallel. Posterior chain engagement.',
            ],
            [
                'name' => 'Hyperextension Reverse (Nordic Style)',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Lats'],
                'description' => 'Face machine, hips on pad. Lift legs behind. Reverse hyperextension variation.',
            ],
            [
                'name' => 'Hyperextension Weighted (Hold Plate)',
                'equipment' => 'Roman Chair/Hyperextension Bench, Weight Plate',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Hold weight plate on chest or behind head. Added posterior chain resistance.',
            ],
            [
                'name' => 'Hyperextension Dumbbell (Goblet Style)',
                'equipment' => 'Roman Chair/Hyperextension Bench, Dumbbell',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Hold dumbbell goblet style. Increased load for lower back and glutes.',
            ],
            [
                'name' => 'Hyperextension Isometric Hold (Parallel)',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'stability',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Raise to parallel and hold. Static posterior chain contraction.',
            ],
            [
                'name' => 'Hyperextension Isometric Hold (45°)',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'stability',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Hold at 45° angle. Static lower back and glute strength.',
            ],
            [
                'name' => 'Hyperextension Isometric Hold (Weighted)',
                'equipment' => 'Roman Chair/Hyperextension Bench, Weight Plate',
                'category_slug' => 'stability',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Hold parallel position with added weight. Static loaded posterior chain.',
            ],
            [
                'name' => 'Hyperextension Pause Reps (Top)',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Raise, hold 2-3 seconds at top. Increases time under tension.',
            ],
            [
                'name' => 'Hyperextension Slow Tempo (3-1-3)',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => '3 sec lower, 1 sec hold, 3 sec raise. Time under tension.',
            ],
            [
                'name' => 'Hyperextension Eccentric Focus (Slow Negative)',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Raise quickly, lower extremely slow (4-5 sec). Eccentric overload.',
            ],
            [
                'name' => 'Hyperextension Explosive Concentric',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Fast-Twitch Fibers', 'Core'],
                'description' => 'Explosive raise, slow controlled lower. Power development.',
            ],
            [
                'name' => 'Hyperextension Drop Set',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Start heavy, raise to failure, reduce weight, continue. Hypertrophy dropset.',
            ],
            [
                'name' => 'Hyperextension Rest-Pause Set',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Raise to failure, rest 10 sec, continue. Density training.',
            ],
            [
                'name' => 'Hyperextension Partial Reps (Top Half)',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings (Peak)', 'Core'],
                'description' => 'Partial raises in top half. Emphasizes peak contraction.',
            ],
            [
                'name' => 'Hyperextension Partial Reps (Bottom Half)',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae (Stretched)', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Partial raises in bottom half. Emphasizes stretch and engagement.',
            ],
            [
                'name' => 'Hyperextension 1.5 Reps',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Full raise, half lower, full raise again. Extended TUT.',
            ],
            [
                'name' => 'Hyperextension 21s',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => '7 bottom half, 7 top half, 7 full reps. Complete development.',
            ],
            [
                'name' => 'Hyperextension Pulse Reps (Small Range)',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Small pulsing at top. Builds pump and endurance.',
            ],
            [
                'name' => 'Hyperextension Toes Pointed',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Calves', 'Core'],
                'description' => 'Point toes during raise. Glute and hamstring emphasis.',
            ],
            [
                'name' => 'Hyperextension Toes Flexed',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Hamstrings', 'Glutes', 'Core'],
                'description' => 'Flex toes upward. Isolates erectors and hamstrings more.',
            ],
            [
                'name' => 'Hyperextension Single-Leg',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'],
                'description' => 'Extend one leg at a time. Unilateral posterior chain.',
            ],
            [
                'name' => 'Hyperextension Single-Leg Weighted',
                'equipment' => 'Roman Chair/Hyperextension Bench, Dumbbell/Plate',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'],
                'description' => 'Single-leg with added weight. Unilateral loaded posterior chain.',
            ],
            [
                'name' => 'Hyperextension Band Resisted',
                'equipment' => 'Roman Chair/Hyperextension Bench, Resistance Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Attach band for variable resistance. Accommodating resistance.',
            ],
            [
                'name' => 'Hyperextension Paused at Bottom (Stretch)',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Hamstrings', 'Glutes', 'Core', 'Hip Extensors'],
                'description' => 'Pause 2-3 seconds at bottom. Emphasizes stretch and mobility.',
            ],
            [
                'name' => 'Hyperextension 3-Second Peak Squeeze',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'],
                'description' => 'Raise and squeeze glutes for 3 seconds. Maximal contraction.',
            ],
            [
                'name' => 'Hyperextension With Band Resisted Lowering',
                'equipment' => 'Roman Chair/Hyperextension Bench, Resistance Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Band adds resistance during lowering phase. Eccentric focus.',
            ],
            [
                'name' => 'Hyperextension Neutral Spine Focus',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Core', 'Glutes', 'Hamstrings', 'Stabilizers'],
                'description' => 'Maintain straight spine throughout. Core and back stability.',
            ],
            [
                'name' => 'Hyperextension Rounded Back Focus',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae (Stretched)', 'Core', 'Hamstrings', 'Glutes'],
                'description' => 'Round back at bottom. Increased stretch and spinal mobility.',
            ],
            [
                'name' => 'Hyperextension Weighted Vest',
                'equipment' => 'Roman Chair/Hyperextension Bench, Weighted Vest',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Wear weighted vest during hyperextensions. Added load.',
            ],
            [
                'name' => 'Hyperextension Alternating Legs',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'],
                'description' => 'Alternate lifting legs. Unilateral and core engagement.',
            ],
            [
                'name' => 'Hyperextension Isometric Bilateral Hold',
                'equipment' => 'Roman Chair/Hyperextension Bench',
                'category_slug' => 'stability',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Raise and hold at parallel. Bilateral posterior chain endurance.',
            ],
            [
                'name' => 'Hyperextension With Band Resisted Extension',
                'equipment' => 'Roman Chair/Hyperextension Bench, Resistance Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Band adds resistance during concentric phase. Overload.',
            ],
        ];

        $sourceDir = public_path('execises/roman-chair');
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
