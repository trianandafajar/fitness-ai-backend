<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class StandingLegCurlSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Standing Leg Curl Standard', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings (Biceps Femoris, Semitendinosus, Semimembranosus)', 'Calves', 'Core', 'Glutes'], 'description' => 'Stand on machine, pad behind ankle. Curl heel toward glutes. Squeeze hamstring at peak. Lower with control.'],
            ['name' => 'Standing Leg Curl Single-Leg', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors', 'Stabilizers'], 'description' => 'Curl with one leg only. Unilateral hamstring development and balance.'],
            ['name' => 'Standing Leg Curl Isometric Hold (Peak Contraction)', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'core', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Curl heel to glutes and hold. Static hamstring contraction and endurance.'],
            ['name' => 'Standing Leg Curl Isometric Hold (Mid-Contraction)', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'core', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Hold at mid-point of curl. Static hamstring strength at 90°.'],
            ['name' => 'Standing Leg Curl Pause Reps (Peak)', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Curl, hold 2-3 seconds at peak. Increases time under tension.'],
            ['name' => 'Standing Leg Curl Slow Tempo (3-1-3)', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => '3 sec curl, 1 sec hold, 3 sec lower. Time under tension hamstring curl.'],
            ['name' => 'Standing Leg Curl Eccentric Focus (Slow Negative)', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Curl quickly, lower extremely slow (4-5 sec). Eccentric hamstring overload.'],
            ['name' => 'Standing Leg Curl Explosive Concentric', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Fast-Twitch Fibers', 'Glutes', 'Core', 'Calves'], 'description' => 'Explosive curl, slow controlled lower. Power development for hamstrings.'],
            ['name' => 'Standing Leg Curl Drop Set', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Start heavy, curl to failure, reduce weight, continue. Hamstring hypertrophy dropset.'],
            ['name' => 'Standing Leg Curl Rest-Pause Set', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Curl to failure, rest 10 sec, continue. Density training for hamstrings.'],
            ['name' => 'Standing Leg Curl Partial Reps (Top Half)', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings (Peak)', 'Core', 'Calves', 'Glutes'], 'description' => 'Partial curls in top half. Emphasizes peak contraction and hamstring squeeze.'],
            ['name' => 'Standing Leg Curl Partial Reps (Bottom Half)', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings (Stretched)', 'Calves', 'Core', 'Glutes', 'Hip Extensors'], 'description' => 'Partial curls in bottom half. Emphasizes stretch and hamstring lengthening.'],
            ['name' => 'Standing Leg Curl 1.5 Reps', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Full curl, half lower, full curl again. Extended time under tension.'],
            ['name' => 'Standing Leg Curl 21s', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => '7 bottom half, 7 top half, 7 full reps. Complete hamstring development.'],
            ['name' => 'Standing Leg Curl Pulse Reps (Small Range)', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Small pulsing movements at peak. Builds hamstring pump and endurance.'],
            ['name' => 'Standing Leg Curl Toes Pointed (Gastroc Involvement)', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Gastrocnemius', 'Calves', 'Core', 'Glutes', 'Hip Extensors'], 'description' => 'Point toes down during curl. Engages calves and gastrocnemius more.'],
            ['name' => 'Standing Leg Curl Toes Flexed (Isolate Hamstring)', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Glutes', 'Calves', 'Hip Extensors'], 'description' => 'Flex toes upward during curl. Isolates hamstrings more, reduces calf involvement.'],
            ['name' => 'Standing Leg Curl Hip Extension Focus', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Hip Extensors', 'Calves'], 'description' => 'Slightly extend hip at peak. Adds glute engagement to hamstring curl.'],
            ['name' => 'Standing Leg Curl Ankle Plantarflexion', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Calves', 'Core', 'Glutes', 'Hip Extensors'], 'description' => 'Point toes at peak of curl. Calf and hamstring synergistic training.'],
            ['name' => 'Standing Leg Curl Alternating Legs', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors', 'Stabilizers'], 'description' => 'Alternate curling legs one at a time. Unilateral work with balance challenge.'],
            ['name' => 'Standing Leg Curl Band Resisted', 'equipment' => 'Standing Leg Curl, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Attach band for variable resistance. Accommodating resistance curl.'],
            ['name' => 'Standing Leg Curl Heavy Slow Negative', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Use heavy weight, curl with assistance, lower alone. Extreme eccentric overload.'],
            ['name' => 'Standing Leg Curl Single-Arm Support', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Obliques', 'Calves', 'Glutes', 'Stabilizers'], 'description' => 'Support with one arm. Increases core and stability demand during curl.'],
            ['name' => 'Standing Leg Curl No Support (Balance)', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors', 'Stabilizers'], 'description' => 'Curl with no hand support. Extreme balance and core challenge.'],
            ['name' => 'Standing Leg Curl Paused at Bottom (Stretch)', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings (Stretched)', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Pause 2-3 seconds at bottom. Emphasizes hamstring stretch and mobility.'],
            ['name' => 'Standing Leg Curl 3-Second Peak Squeeze', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Curl and squeeze hamstring for 3 seconds at top. Maximal peak contraction.'],
            ['name' => 'Standing Leg Curl Both Legs Simultaneously', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Glutes', 'Calves', 'Hip Extensors'], 'description' => 'Curl both legs at same time. Bilateral hamstring strength and power.'],
            ['name' => 'Standing Leg Curl Hip Adduction Variation', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Adductors', 'Core', 'Calves', 'Glutes', 'Hip Rotators'], 'description' => 'Keep knees together during curl. Emphasizes adductors and medial hamstrings.'],
            ['name' => 'Standing Leg Curl Hip Abduction Variation', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Abductors', 'Core', 'Calves', 'Glutes', 'Hip Rotators'], 'description' => 'Keep knees apart during curl. Emphasizes abductors and lateral hamstrings.'],
            ['name' => 'Standing Leg Curl with Ankle Weight (No Machine)', 'equipment' => 'Standing Leg Curl, Ankle Weight', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors', 'Stabilizers'], 'description' => 'Use ankle weight instead of machine. Home-friendly standing hamstring curl.'],
            ['name' => 'Standing Leg Curl Isometric Bilateral Hold', 'equipment' => 'Standing Leg Curl', 'category_slug' => 'core', 'target_muscles' => ['Hamstrings', 'Core', 'Glutes', 'Calves', 'Hip Extensors'], 'description' => 'Curl both legs and hold at peak. Bilateral hamstring endurance.'],
        ];

        $sourceDir = public_path('execises/standing-leg-curl');
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
