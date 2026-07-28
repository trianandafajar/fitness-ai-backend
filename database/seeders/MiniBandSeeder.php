<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class MiniBandSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Mini Band Glute Bridge',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Flexors', 'Lower Back'],
                'description' => 'Band above knees. Bridge hips up. Squeeze glutes at top. Glute activation.',
            ],
            [
                'name' => 'Mini Band Hip Abduction (Side-Lying)',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'],
                'description' => 'Band above knees or ankles. Lie side. Lift top leg. Glute medius isolation.',
            ],
            [
                'name' => 'Mini Band Hip Abduction (Standing)',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'],
                'description' => 'Band above knees. Step side to side. Standing abduction.',
            ],
            [
                'name' => 'Mini Band Lateral Walk (Monster Walk)',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Medius', 'Gluteus Maximus', 'Core', 'Hip Abductors', 'Stabilizers'],
                'description' => 'Band above knees. Walk sideways with tension. Glute activation and stability.',
            ],
            [
                'name' => 'Mini Band Forward Walk',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Quadriceps', 'Core', 'Hip Flexors', 'Stabilizers'],
                'description' => 'Band above knees. Walk forward. Glute and quad activation.',
            ],
            [
                'name' => 'Mini Band Backward Walk',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Extensors', 'Stabilizers'],
                'description' => 'Band above knees. Walk backward. Posterior chain activation.',
            ],
            [
                'name' => 'Mini Band Clamshell',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Medius', 'TFL', 'Core', 'Hip Abductors', 'Stabilizers'],
                'description' => 'Lie side, knees bent, band above knees. Open knees apart. Glute medius.',
            ],
            [
                'name' => 'Mini Band Glute Kickback',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Band around ankles. Kick backward. Glute isolation.',
            ],
            [
                'name' => 'Mini Band Fire Hydrant',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Medius', 'Hip Abductors', 'Core', 'Obliques', 'TFL'],
                'description' => 'Band above knees. Lift knee out to side. Fire hydrant with band.',
            ],
            [
                'name' => 'Mini Band Squat',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'],
                'description' => 'Band above knees. Perform squats. Band pushes knees inward, activates glutes.',
            ],
            [
                'name' => 'Mini Band Sumo Squat',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Adductors', 'Core', 'Hamstrings', 'Calves'],
                'description' => 'Band above knees. Wide stance squat. Inner thigh and glute emphasis.',
            ],
            [
                'name' => 'Mini Band Goblet Squat',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Calves', 'Stabilizers'],
                'description' => 'Band above knees. Hold weight or no weight. Squat with band tension.',
            ],
            [
                'name' => 'Mini Band Bulgarian Split Squat',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Stabilizers', 'Calves'],
                'description' => 'Band above front knee. Single-leg squat. Unilateral leg and stability.',
            ],
            [
                'name' => 'Mini Band Lunge',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'],
                'description' => 'Band above knees or around front ankle. Lunge with band tension.',
            ],
            [
                'name' => 'Mini Band Lateral Lunge',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Adductors', 'Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Stabilizers'],
                'description' => 'Band above knees. Step laterally into lunge. Inner thigh and hip.',
            ],
            [
                'name' => 'Mini Band Reverse Lunge',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'],
                'description' => 'Band above knees. Reverse lunge with band tension.',
            ],
            [
                'name' => 'Mini Band Hip Thrust',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Flexors', 'Lower Back'],
                'description' => 'Band above knees. Bridge hips up. Glute-dominant hip extension.',
            ],
            [
                'name' => 'Mini Band Single-Leg Glute Bridge',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Extensors', 'Stabilizers'],
                'description' => 'Band above working knee. Single-leg bridge. Unilateral glute strength.',
            ],
            [
                'name' => 'Mini Band Donkey Kick',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Band around foot or ankle. Kick backward. Glute isolation.',
            ],
            [
                'name' => 'Mini Band Standing Leg Curl',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'],
                'description' => 'Band around ankles. Curl heel toward glutes. Hamstring isolation.',
            ],
            [
                'name' => 'Mini Band Hip Flexion (Standing)',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Hip Flexors', 'Core', 'Quadriceps', 'Iliopsoas'],
                'description' => 'Band around ankles. Raise knee up. Hip flexor activation.',
            ],
            [
                'name' => 'Mini Band Hip Extension (Standing)',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Band around ankles. Kick leg backward. Glute and hamstring.',
            ],
            [
                'name' => 'Mini Band Row (Seated)',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Rear Deltoids', 'Traps'],
                'description' => 'Band anchored under feet. Pull toward chest. Back row with band.',
            ],
            [
                'name' => 'Mini Band Face Pull',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Upper Traps', 'Rotator Cuff', 'Core'],
                'description' => 'Anchor at face height. Pull toward face. Shoulder health and posture.',
            ],
            [
                'name' => 'Mini Band Bicep Curl',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Brachialis', 'Shoulders'],
                'description' => 'Stand on band. Curl handles up. Bicep isolation with band.',
            ],
            [
                'name' => 'Mini Band Triceps Extension',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Shoulders', 'Core', 'Forearms', 'Lats'],
                'description' => 'Anchor band overhead or behind. Extend arms. Triceps isolation.',
            ],
            [
                'name' => 'Mini Band Pallof Press',
                'equipment' => 'Mini Band',
                'category_slug' => 'stability',
                'target_muscles' => ['Core (Transversus Abdominis, Obliques)', 'Shoulders', 'Stabilizers'],
                'description' => 'Anchor to side. Press forward and hold. Anti-rotation core.',
            ],
            [
                'name' => 'Mini Band Woodchopper',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Obliques', 'Core', 'Shoulders', 'Lats', 'Forearms', 'Hip Rotators'],
                'description' => 'Anchor low or high. Chop diagonally. Rotational core power.',
            ],
            [
                'name' => 'Mini Band Reverse Woodchopper',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Obliques', 'Core', 'Shoulders', 'Lats', 'Forearms', 'Hip Rotators'],
                'description' => 'Reverse direction chopper. Balanced rotational development.',
            ],
            [
                'name' => 'Mini Band Isometric Abduction Hold',
                'equipment' => 'Mini Band',
                'category_slug' => 'stability',
                'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'Core', 'Hip Abductors'],
                'description' => 'Band above knees. Hold legs apart. Static glute medius contraction.',
            ],
            [
                'name' => 'Mini Band Calf Raise',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'],
                'description' => 'Band under foot. Rise on toes. Calf work with band resistance.',
            ],
            [
                'name' => 'Mini Band Ankle Dorsiflexion',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Tibialis Anterior', 'Calves', 'Core', 'Stabilizers'],
                'description' => 'Band anchored. Flex toes upward. Shin and ankle strength.',
            ],
            [
                'name' => 'Mini Band Shoulder External Rotation',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Rotator Cuff (Infraspinatus, Teres Minor)', 'Rear Deltoids', 'Core'],
                'description' => 'Band anchored. Rotate arm outward. Rotator cuff health.',
            ],
            [
                'name' => 'Mini Band Shoulder Internal Rotation',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Rotator Cuff (Subscapularis)', 'Core', 'Lats', 'Pecs'],
                'description' => 'Band anchored. Rotate arm inward. Internal rotator strength.',
            ],
            [
                'name' => 'Mini Band Y-T-W Raises',
                'equipment' => 'Mini Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Traps', 'Rhomboids', 'Rear Deltoids', 'Core', 'Rotator Cuff'],
                'description' => 'Band anchored in front. Raise into Y, T, W positions. Scapular control.',
            ],
        ];

        $sourceDir = public_path('execises/mini-band');
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
