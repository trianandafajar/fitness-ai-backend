<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class VerticalClimberSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Standard Climb',
                'equipment' => 'Vertical Climber',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Latissimus Dorsi', 'Biceps', 'Triceps', 'Shoulders', 'Core'],
                'description' => 'Alternate opposite arm and leg in a natural climbing motion at a steady pace to build full-body cardiovascular endurance.',
            ],
            [
                'name' => 'Sprint Climb',
                'equipment' => 'Vertical Climber',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Latissimus Dorsi', 'Biceps', 'Triceps', 'Core'],
                'description' => 'Move at maximum speed for short bursts to develop explosive power, anaerobic capacity, and rapid coordination.',
            ],
            [
                'name' => 'Leg-Only Climb',
                'equipment' => 'Vertical Climber',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core', 'Hip Flexors'],
                'description' => 'Place hands on stationary handles and pedal only with the legs to isolate lower-body endurance and climbing drive.',
            ],
            [
                'name' => 'Arm-Only Climb',
                'equipment' => 'Vertical Climber',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Triceps', 'Deltoids', 'Forearms', 'Core'],
                'description' => 'Stand on stationary foot pegs and pull/push with arms only, engaging the entire upper body and core for pulling strength and stamina.',
            ],
            [
                'name' => 'High-Knee Climb',
                'equipment' => 'Vertical Climber',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hip Flexors', 'Quadriceps', 'Glutes', 'Abdominals', 'Shoulders'],
                'description' => 'Exaggerate the knee lift on each step, driving knees toward the chest to increase hip flexor engagement and core activation.',
            ],
            [
                'name' => 'Long-Stride Climb',
                'equipment' => 'Vertical Climber',
                'category_slug' => 'endurance',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Latissimus Dorsi', 'Triceps', 'Core'],
                'description' => 'Extend each step to near full range, reaching far with arms and deeply stepping with legs, simulating tall rock face climbing.',
            ],
            [
                'name' => 'Sideways Climb (Lateral)',
                'equipment' => 'Vertical Climber',
                'category_slug' => 'coordination',
                'target_muscles' => ['Gluteus Medius', 'Adductors', 'Abductors', 'Obliques', 'Quadriceps', 'Shoulders'],
                'description' => 'Face sideways and cross the leading leg over the trailing leg as you climb, improving lateral stability and oblique engagement.',
            ],
            [
                'name' => 'Reverse Climb',
                'equipment' => 'Vertical Climber',
                'category_slug' => 'coordination',
                'target_muscles' => ['Hamstrings', 'Quadriceps', 'Glutes', 'Core', 'Triceps'],
                'description' => 'Face away from the machine and climb backward, challenging coordination and emphasizing hamstring and posterior chain recruitment.',
            ],
            [
                'name' => 'Staggered Stance Climb',
                'equipment' => 'Vertical Climber',
                'category_slug' => 'stability',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Obliques', 'Shoulders'],
                'description' => 'Keep one foot consistently higher on its pedal while the other moves through full range, adding a unilateral stability challenge.',
            ],
            [
                'name' => 'Isometric Hold Climb',
                'equipment' => 'Vertical Climber',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Latissimus Dorsi', 'Biceps', 'Forearms', 'Core'],
                'description' => 'Pause at the most contracted position (arm pulled down, opposite knee up) for 3–10 seconds each rep to build full-body static strength.',
            ],
            [
                'name' => 'Eccentric Climb',
                'equipment' => 'Vertical Climber',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Latissimus Dorsi', 'Biceps', 'Core'],
                'description' => 'Climb up quickly, then resist the downward return phase over 3–5 seconds to overload muscles eccentrically.',
            ],
            [
                'name' => 'Tempo Climb (3-1-3)',
                'equipment' => 'Vertical Climber',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Latissimus Dorsi', 'Biceps', 'Core'],
                'description' => 'Take 3 seconds to climb up, hold the top for 1 second, then take 3 seconds to lower, maximizing time under tension.',
            ],
            [
                'name' => 'Steady-State Endurance Climb',
                'equipment' => 'Vertical Climber',
                'category_slug' => 'endurance',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Latissimus Dorsi', 'Shoulders', 'Core'],
                'description' => 'Climb continuously at a moderate pace for 20–45 minutes to build aerobic capacity and muscular stamina.',
            ],
            [
                'name' => 'Tabata Intervals',
                'equipment' => 'Vertical Climber',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Latissimus Dorsi', 'Triceps', 'Core'],
                'description' => '20 seconds all-out sprint climbing followed by 10 seconds rest, repeated for 8 rounds to push cardiovascular and muscular endurance limits.',
            ],
            [
                'name' => 'EMOM Sprints',
                'equipment' => 'Vertical Climber',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Latissimus Dorsi', 'Triceps', 'Core'],
                'description' => 'Every minute on the minute, perform a 15–20 second max-effort climb, using remaining time for active recovery.',
            ],
            [
                'name' => 'Pyramid Intervals',
                'equipment' => 'Vertical Climber',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Latissimus Dorsi', 'Biceps', 'Core'],
                'description' => 'Work intervals increase then decrease in duration (e.g., 30s, 45s, 60s, 45s, 30s) with rest periods, building and sustaining intensity.',
            ],
            [
                'name' => 'Recovery Climb',
                'equipment' => 'Vertical Climber',
                'category_slug' => 'recovery',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Latissimus Dorsi', 'Core'],
                'description' => 'Climb at a very slow, relaxed pace with minimal resistance to promote blood flow and flush out metabolic waste.',
            ],
            [
                'name' => 'Single-Leg Emphasis Climb',
                'equipment' => 'Vertical Climber',
                'category_slug' => 'isolation',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Consciously drive with one leg more than the other for set intervals, correcting imbalances and increasing unilateral load.',
            ],
            [
                'name' => 'Single-Arm Emphasis Climb',
                'equipment' => 'Vertical Climber',
                'category_slug' => 'isolation',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Triceps', 'Core'],
                'description' => 'Pull significantly harder with one arm while the other assists lightly, alternating to balance upper-body pulling strength.',
            ],
        ];

        $sourceDir = public_path('execises/vertical-climber');
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
