<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class TreadclimberSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Steady-State Walk',
                'equipment' => 'Treadclimber',
                'category_slug' => 'endurance',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core'],
                'description' => 'Walk at a consistent moderate pace with the moving treadles to build aerobic base and burn calories while maintaining low impact.',
            ],
            [
                'name' => 'Power Walk',
                'equipment' => 'Treadclimber',
                'category_slug' => 'cardio',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Calves', 'Core'],
                'description' => 'Walk at a faster pace with a vigorous arm swing, driving through the heels to increase heart rate and glute engagement.',
            ],
            [
                'name' => 'High-Speed Walk',
                'equipment' => 'Treadclimber',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Hip Flexors', 'Core'],
                'description' => 'Push the walking speed to a brisk near-jogging pace while maintaining the stepping motion for a challenging low-impact cardio workout.',
            ],
            [
                'name' => 'Speed Interval Walk',
                'equipment' => 'Treadclimber',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Alternate between short bursts of fast-paced walking and slower recovery periods to improve cardiovascular fitness and calorie burn.',
            ],
            [
                'name' => 'Resistance Interval Climb',
                'equipment' => 'Treadclimber',
                'category_slug' => 'interval',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Calves', 'Core'],
                'description' => 'Vary the treadle resistance between high-intensity climbs and lower resistance recovery walks, simulating uphill and flat terrain.',
            ],
            [
                'name' => 'Hill Climb Simulation',
                'equipment' => 'Treadclimber',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Calves', 'Core', 'Erector Spinae'],
                'description' => 'Set high resistance and a slow, deliberate step rate to mimic a steep climbing motion, building lower body strength and muscular endurance.',
            ],
            [
                'name' => 'Hands-Free Walk',
                'equipment' => 'Treadclimber',
                'category_slug' => 'stability',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core', 'Obliques'],
                'description' => 'Walk without holding the handlebars, engaging the deep core stabilizers to maintain balance and posture on the moving treadles.',
            ],
            [
                'name' => 'Backward Walk',
                'equipment' => 'Treadclimber',
                'category_slug' => 'coordination',
                'target_muscles' => ['Hamstrings', 'Glutes', 'Quadriceps', 'Calves', 'Tibialis Anterior', 'Core'],
                'description' => 'Carefully step backward on the treadles at a slow speed to activate the hamstrings and shins differently while challenging coordination.',
            ],
            [
                'name' => 'High-Knee Walk',
                'equipment' => 'Treadclimber',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hip Flexors', 'Quadriceps', 'Abdominals', 'Glutes', 'Calves'],
                'description' => 'Consciously lift each knee higher on every step as the treadles descend, intensifying hip flexor and core activation.',
            ],
            [
                'name' => 'Long-Stride Walk',
                'equipment' => 'Treadclimber',
                'category_slug' => 'endurance',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Hip Flexors', 'Core'],
                'description' => 'Take extended steps by letting the rear leg push fully through the toe-off, emphasizing hip extension and glute recruitment.',
            ],
            [
                'name' => 'Single-Leg Emphasis Walk',
                'equipment' => 'Treadclimber',
                'category_slug' => 'isolation',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Core'],
                'description' => 'Consciously drive through one leg for set intervals while the other assists, addressing strength imbalances and increasing unilateral load.',
            ],
            [
                'name' => 'Glute-Focused Walk',
                'equipment' => 'Treadclimber',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core'],
                'description' => 'Lean slightly forward from the hips and push through the heels with each step, intentionally squeezing the glutes at the back of the stride.',
            ],
            [
                'name' => 'Tabata Intervals',
                'equipment' => 'Treadclimber',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Perform 20 seconds of all-out intense walking followed by 10 seconds of slow walking, repeated for 8 rounds for maximal anaerobic conditioning.',
            ],
            [
                'name' => 'Pyramid Intervals',
                'equipment' => 'Treadclimber',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Gradually increase then decrease the duration of high-intensity work intervals (e.g., 30s, 45s, 60s, 45s, 30s) with active recovery in between.',
            ],
            [
                'name' => 'EMOM Walking Sprints',
                'equipment' => 'Treadclimber',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Every minute on the minute, walk at maximum possible speed for 15–20 seconds, then recover at a slow pace for the rest of the minute.',
            ],
            [
                'name' => 'Endurance Walk',
                'equipment' => 'Treadclimber',
                'category_slug' => 'endurance',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core'],
                'description' => 'Maintain a steady, conversational pace for 30–60 minutes to build a strong aerobic foundation and improve fat utilization.',
            ],
            [
                'name' => 'Recovery Walk',
                'equipment' => 'Treadclimber',
                'category_slug' => 'recovery',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core'],
                'description' => 'Slow, gentle walking with minimal resistance to promote blood flow, reduce soreness, and aid active recovery on low-impact joints.',
            ],
        ];

        $sourceDir = public_path('execises/treadclimber');
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
