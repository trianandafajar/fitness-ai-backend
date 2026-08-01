<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class SafetySquatBarSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Safety Bar Back Squat', 'equipment' => 'Safety Squat Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors', 'Erector Spinae', 'Core', 'Upper Back'], 'description' => 'Position the bar across the upper back with the yoke resting on the traps. Hold the handles near the chest. Squat down by bending knees and hips, keeping the torso upright. The camber shifts the center of gravity forward, forcing the upper back and core to work harder to prevent leaning.'],
            ['name' => 'Safety Bar Front Squat (Hatfield Squat)', 'equipment' => 'Safety Squat Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Upper Back'], 'description' => 'Rest the bar on the shoulders with a high position. Release one hand from the handle and hold the rack for balance (Hatfield style) or keep both hands on handles. Squat deeply while remaining extremely upright, isolating the quads and core.'],
            ['name' => 'Safety Bar Close-Stance Squat', 'equipment' => 'Safety Squat Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Quadriceps (Vastus Lateralis)', 'Glutes'], 'description' => 'Take a narrow stance with feet close together. The safety bar helps maintain an upright torso while targeting the outer quadriceps.'],
            ['name' => 'Safety Bar Wide-Stance Squat', 'equipment' => 'Safety Squat Bar', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Adductors', 'Quadriceps', 'Hamstrings'], 'description' => 'Use a wide stance with toes slightly outward. The bar\'s design allows you to sit back into the squat while keeping the chest up, emphasizing the inner thighs and glutes.'],
            ['name' => 'Safety Bar Box Squat', 'equipment' => 'Safety Squat Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors', 'Erector Spinae', 'Core'], 'description' => 'Place a box behind you, squat back until sitting briefly, then explode up. The safety bar\'s forward load increases core engagement and reinforces an upright posture out of the hole.'],
            ['name' => 'Safety Bar Pause Squat', 'equipment' => 'Safety Squat Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Erector Spinae', 'Core'], 'description' => 'Lower into a deep squat, pause for 1-3 seconds at the bottom, then drive up. The safety bar eliminates the stretch reflex and forces maximum core bracing.'],
            ['name' => 'Safety Bar Tempo Squat (3-1-3)', 'equipment' => 'Safety Squat Bar', 'category_slug' => 'hypertrophy', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => '3 seconds down, 1-second pause at the bottom, 3 seconds up. The safety bar\'s instability maximizes time under tension and muscular control.'],
            ['name' => 'Safety Bar Anderson Squat (Bottom-Up)', 'equipment' => 'Safety Squat Bar', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Erector Spinae'], 'description' => 'Start with the bar resting on safety pins at the deepest squat position. Drive up from a dead stop without any eccentric. The forward-leaning load demands explosive power and core stability.'],
            ['name' => 'Safety Bar Bulgarian Split Squat', 'equipment' => 'Safety Squat Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Elevate rear foot on a bench, place the safety bar on the back. Squat down with the front leg. The hands-free grip (if desired) or handle support allows total focus on leg drive.'],
            ['name' => 'Safety Bar Forward Lunge', 'equipment' => 'Safety Squat Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Step forward into a lunge, lower until both knees reach 90°, then push back. The bar\'s forward center of mass challenges balance and core stability.'],
            ['name' => 'Safety Bar Reverse Lunge', 'equipment' => 'Safety Squat Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Step backward into a lunge, lowering the rear knee. The safety bar helps keep the torso upright while loading the front leg.'],
            ['name' => 'Safety Bar Walking Lunge', 'equipment' => 'Safety Squat Bar', 'category_slug' => 'endurance', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Walk forward alternating lunges with the bar on the back. The safety bar\'s design allows you to maintain posture over long distances.'],
            ['name' => 'Safety Bar Good Morning', 'equipment' => 'Safety Squat Bar', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core'], 'description' => 'Place the bar on the upper back, hinge forward at the hips while keeping the back flat. The forward load increases hamstring stretch and core requirement. Ideal for lifters with shoulder issues.'],
            ['name' => 'Safety Bar Seated Good Morning', 'equipment' => 'Safety Squat Bar', 'category_slug' => 'strength', 'target_muscles' => ['Erector Spinae', 'Hamstrings', 'Glutes', 'Core'], 'description' => 'Sit on a bench with the bar on your back, hinge forward at the hips. Isolates the spinal erectors and hamstrings while removing leg drive.'],
            ['name' => 'Safety Bar Romanian Deadlift', 'equipment' => 'Safety Squat Bar', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae'], 'description' => 'Hold the bar against the upper back or use the handles to carry it at hip level. Hinge at the hips, lowering the bar while keeping legs slightly bent, then return. The forward load deepens the hamstring stretch.'],
            ['name' => 'Safety Bar Hip Thrust', 'equipment' => 'Safety Squat Bar', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core'], 'description' => 'Sit on the floor with upper back against a bench, safety bar across the hips. The padding and shape make it comfortable to load heavy without hip bone bruising. Drive through the heels to extend hips.'],
            ['name' => 'Safety Bar Standing Calf Raise', 'equipment' => 'Safety Squat Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Gastrocnemius', 'Soleus'], 'description' => 'With the bar on the back and balls of feet on a block, raise heels as high as possible, then lower for a full stretch. The safety bar keeps the weight securely on the shoulders without gripping.'],
            ['name' => 'Safety Bar Bear Squat (Belt Squat Variation)', 'equipment' => 'Safety Squat Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core'], 'description' => 'Hold the safety bar in the crooks of the elbows (Zercher position) or cradled against the chest, then squat down while keeping the torso upright. A front-loaded squat alternative sparing the shoulders.'],
        ];

        $sourceDir = public_path('execises/safety-squat-bar');
        $files = glob($sourceDir . '/*.png');
        sort($files);

        foreach ($execises as $i => $data) {
            $sourceFile = $files[$i] ?? null;

            if ($sourceFile) {
                $imagePath = Storage::disk('public')->putFile('exercises', new File($sourceFile));
                $data['image'] = $imagePath;
            }

            Exercise::create([
                'name' => $data['name'],
                'equipment' => $data['equipment'],
                'category_id' => $categories[$data['category_slug']],
                'target_muscles' => $data['target_muscles'],
                'description' => $data['description'],
                'image' => $data['image'] ?? null,
            ]);
        }
    }
}
