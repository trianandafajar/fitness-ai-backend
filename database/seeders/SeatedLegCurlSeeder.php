<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class SeatedLegCurlSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Seated Leg Curl Standard', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings (Biceps Femoris, Semitendinosus, Semimembranosus)', 'Calves', 'Core', 'Glutes'], 'description' => 'Sit on machine, pad on lower calves. Curl pad toward glutes. Squeeze hamstring at peak. Lower with control.'],
            ['name' => 'Seated Leg Curl Single-Leg', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors', 'Stabilizers'], 'description' => 'Curl with one leg only. Unilateral hamstring development and corrects imbalances.'],
            ['name' => 'Seated Leg Curl Isometric Hold (Peak Contraction)', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'core', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Curl pad to glutes and hold. Static hamstring contraction and endurance.'],
            ['name' => 'Seated Leg Curl Isometric Hold (Mid-Contraction)', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'core', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Hold at mid-point of curl. Static hamstring strength at 90°.'],
            ['name' => 'Seated Leg Curl Pause Reps (Peak)', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Curl, hold 2-3 seconds at peak. Increases time under tension.'],
            ['name' => 'Seated Leg Curl Slow Tempo (3-1-3)', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => '3 sec curl, 1 sec hold, 3 sec lower. Time under tension hamstring curl.'],
            ['name' => 'Seated Leg Curl Eccentric Focus (Slow Negative)', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Curl quickly, lower extremely slow (4-5 sec). Eccentric hamstring overload.'],
            ['name' => 'Seated Leg Curl Explosive Concentric', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Fast-Twitch Fibers', 'Glutes', 'Core', 'Calves'], 'description' => 'Explosive curl, slow controlled lower. Power development for hamstrings.'],
            ['name' => 'Seated Leg Curl Drop Set', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Start heavy, curl to failure, reduce weight, continue. Hamstring hypertrophy dropset.'],
            ['name' => 'Seated Leg Curl Rest-Pause Set', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Curl to failure, rest 10 sec, continue. Density training for hamstrings.'],
            ['name' => 'Seated Leg Curl Partial Reps (Top Half)', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings (Peak)', 'Core', 'Calves', 'Glutes'], 'description' => 'Partial curls in top half. Emphasizes peak contraction and hamstring squeeze.'],
            ['name' => 'Seated Leg Curl Partial Reps (Bottom Half)', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings (Stretched)', 'Calves', 'Core', 'Glutes'], 'description' => 'Partial curls in bottom half. Emphasizes stretch and hamstring lengthening.'],
            ['name' => 'Seated Leg Curl 1.5 Reps', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Full curl, half lower, full curl again. Extended time under tension.'],
            ['name' => 'Seated Leg Curl 21s', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => '7 bottom half, 7 top half, 7 full reps. Complete hamstring development.'],
            ['name' => 'Seated Leg Curl Pulse Reps (Small Range)', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Small pulsing movements at peak. Builds hamstring pump and endurance.'],
            ['name' => 'Seated Leg Curl Toes Pointed (Gastroc Involvement)', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Gastrocnemius', 'Calves', 'Core', 'Glutes'], 'description' => 'Point toes down during curl. Engages calves and gastrocnemius more.'],
            ['name' => 'Seated Leg Curl Toes Flexed (Isolate Hamstring)', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Glutes', 'Calves'], 'description' => 'Flex toes upward during curl. Isolates hamstrings more, reduces calf involvement.'],
            ['name' => 'Seated Leg Curl Hip Internal Rotation', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Medial Hamstrings', 'Core', 'Calves', 'Glutes'], 'description' => 'Point toes inward during curl. Emphasizes medial hamstrings (semitendinosus).'],
            ['name' => 'Seated Leg Curl Hip External Rotation', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Lateral Hamstrings', 'Core', 'Calves', 'Glutes'], 'description' => 'Point toes outward during curl. Emphasizes lateral hamstrings (biceps femoris).'],
            ['name' => 'Seated Leg Curl Alternating Legs', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors', 'Stabilizers'], 'description' => 'Alternate curling legs one at a time. Unilateral work with stability challenge.'],
            ['name' => 'Seated Leg Curl Band Resisted', 'equipment' => 'Seated Leg Curl, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Attach band for variable resistance. Accommodating resistance curl.'],
            ['name' => 'Seated Leg Curl Heavy Slow Negative', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Use heavy weight, curl with assistance, lower alone. Extreme eccentric overload.'],
            ['name' => 'Seated Leg Curl Paused at Bottom (Stretch)', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings (Stretched)', 'Core', 'Calves', 'Glutes'], 'description' => 'Pause 2-3 seconds at bottom. Emphasizes hamstring stretch and mobility.'],
            ['name' => 'Seated Leg Curl 3-Second Peak Squeeze', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes'], 'description' => 'Curl and squeeze hamstring for 3 seconds at top. Maximal peak contraction.'],
            ['name' => 'Seated Leg Curl Both Legs Simultaneously', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Glutes', 'Calves'], 'description' => 'Curl both legs at same time. Bilateral hamstring strength and power.'],
            ['name' => 'Seated Leg Curl Knee Flexion Only', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes'], 'description' => 'Focus solely on knee flexion. Isolated hamstring contraction.'],
            ['name' => 'Seated Leg Curl No Hip Extension', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes'], 'description' => 'Keep hips fixed and still. Pure knee flexion hamstring isolation.'],
            ['name' => 'Seated Leg Curl Isometric Bilateral Hold', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'core', 'target_muscles' => ['Hamstrings', 'Core', 'Glutes', 'Calves'], 'description' => 'Curl both legs and hold at peak. Bilateral hamstring endurance.'],
            ['name' => 'Seated Leg Curl Tempo Variation (2-2-4)', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes'], 'description' => '2 sec curl, 2 sec hold, 4 sec lower. Extended time under tension.'],
            ['name' => 'Seated Leg Curl Isometric at 90 Degrees', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'core', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes'], 'description' => 'Hold at 90° knee flexion. Static hamstring strength.'],
            ['name' => 'Seated Leg Curl With Ankle Weight (No Machine)', 'equipment' => 'Seated Leg Curl, Ankle Weight', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes'], 'description' => 'Use ankle weight instead of machine. Home-friendly seated hamstring curl.'],
            ['name' => 'Seated Leg Curl Unilateral Pause Reps', 'equipment' => 'Seated Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Stabilizers'], 'description' => 'Single-leg curl with pause at peak. Unilateral time under tension.'],
        ];

        $sourceDir = public_path('execises/seated-leg-curl');
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
