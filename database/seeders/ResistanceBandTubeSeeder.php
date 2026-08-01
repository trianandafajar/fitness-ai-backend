<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ResistanceBandTubeSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Tube Band Chest Press',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'],
                'description' => 'Anchor band behind. Press handles forward. Chest press with variable resistance.',
            ],
            [
                'name' => 'Tube Band Chest Fly',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'],
                'description' => 'Anchor band behind. Fly arms forward and inward. Chest isolation.',
            ],
            [
                'name' => 'Tube Band Row (Seated)',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Rear Deltoids', 'Traps'],
                'description' => 'Anchor band in front. Pull toward chest. Back row with constant tension.',
            ],
            [
                'name' => 'Tube Band Lat Pulldown',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Biceps', 'Rhomboids', 'Core', 'Forearms', 'Rear Deltoids'],
                'description' => 'Anchor band overhead. Pull down to chest. Lat isolation with band.',
            ],
            [
                'name' => 'Tube Band Overhead Press',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Core', 'Traps', 'Forearms'],
                'description' => 'Stand on band or anchor low. Press handles overhead. Shoulder press.',
            ],
            [
                'name' => 'Tube Band Lateral Raise',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Medial Deltoids', 'Traps', 'Core', 'Forearms', 'Stabilizers'],
                'description' => 'Stand on band. Raise arms to sides. Lateral delt isolation.',
            ],
            [
                'name' => 'Tube Band Front Raise',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Anterior Deltoids', 'Upper Chest', 'Core', 'Forearms', 'Traps'],
                'description' => 'Stand on band. Raise arms to front. Anterior delt isolation.',
            ],
            [
                'name' => 'Tube Band Face Pull',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Upper Traps', 'Rotator Cuff', 'Core'],
                'description' => 'Anchor at face height. Pull toward face with elbows high. Shoulder health.',
            ],
            [
                'name' => 'Tube Band Bicep Curl',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Brachialis', 'Shoulders'],
                'description' => 'Stand on band. Curl handles up. Bicep isolation with constant tension.',
            ],
            [
                'name' => 'Tube Band Hammer Curl',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Brachialis', 'Brachioradialis', 'Forearms', 'Biceps', 'Core'],
                'description' => 'Neutral grip curl. Forearm and brachialis emphasis.',
            ],
            [
                'name' => 'Tube Band Triceps Pushdown',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Forearms', 'Core', 'Shoulders', 'Chest'],
                'description' => 'Anchor overhead. Push handles downward. Triceps isolation.',
            ],
            [
                'name' => 'Tube Band Triceps Extension (Overhead)',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps (Long Head)', 'Shoulders', 'Core', 'Forearms', 'Lats'],
                'description' => 'Anchor low. Extend overhead behind head. Long head triceps.',
            ],
            [
                'name' => 'Tube Band Squat',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'],
                'description' => 'Stand on band, hold at shoulders. Squat with band resistance.',
            ],
            [
                'name' => 'Tube Band Deadlift',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Forearms'],
                'description' => 'Stand on band. Hinge and pull up. Deadlift with band resistance.',
            ],
            [
                'name' => 'Tube Band Romanian Deadlift (RDL)',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core', 'Traps', 'Forearms'],
                'description' => 'Stand on band. Hinge at hips. RDL with band tension.',
            ],
            [
                'name' => 'Tube Band Glute Bridge',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Flexors', 'Lower Back'],
                'description' => 'Band across hips. Bridge upward. Glute isolation with band.',
            ],
            [
                'name' => 'Tube Band Lunge',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'],
                'description' => 'Stand on band. Perform lunges. Unilateral leg work with band.',
            ],
            [
                'name' => 'Tube Band Lateral Lunge',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Adductors', 'Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Stabilizers'],
                'description' => 'Step laterally into lunge. Inner thigh and hip stabilizers.',
            ],
            [
                'name' => 'Tube Band Russian Twist',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Shoulders', 'Forearms'],
                'description' => 'Sit on floor. Rotate band side to side. Rotational core work.',
            ],
            [
                'name' => 'Tube Band Pallof Press',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'stability',
                'target_muscles' => ['Core (Transversus Abdominis, Obliques)', 'Shoulders', 'Stabilizers'],
                'description' => 'Anchor to side. Press forward and hold. Anti-rotation core.',
            ],
            [
                'name' => 'Tube Band Woodchopper',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Obliques', 'Core', 'Shoulders', 'Lats', 'Forearms', 'Hip Rotators'],
                'description' => 'Anchor low or high. Chop diagonally. Rotational power.',
            ],
            [
                'name' => 'Tube Band Reverse Woodchopper',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Obliques', 'Core', 'Shoulders', 'Lats', 'Forearms', 'Hip Rotators'],
                'description' => 'Reverse direction chopper. Balanced rotational development.',
            ],
            [
                'name' => 'Tube Band Hip Abduction',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'],
                'description' => 'Band around ankles. Step outward. Glute medius isolation.',
            ],
            [
                'name' => 'Tube Band Hip Adduction',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Adductors', 'Core', 'Hip Flexors', 'Pelvic Floor'],
                'description' => 'Band around ankles. Squeeze inward. Adductor isolation.',
            ],
            [
                'name' => 'Tube Band Glute Kickback',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core', 'Hip Extensors'],
                'description' => 'Band around ankles. Kick backward. Glute isolation.',
            ],
            [
                'name' => 'Tube Band Hamstring Curl',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'],
                'description' => 'Band around ankles. Curl heel toward glutes. Hamstring isolation.',
            ],
            [
                'name' => 'Tube Band Calf Raise',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'],
                'description' => 'Stand on band. Rise on toes. Calf work with band resistance.',
            ],
            [
                'name' => 'Tube Band Shoulder External Rotation',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Rotator Cuff (Infraspinatus, Teres Minor)', 'Rear Deltoids', 'Core'],
                'description' => 'Anchor at side. Rotate arm outward. Rotator cuff health.',
            ],
            [
                'name' => 'Tube Band Shoulder Internal Rotation',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Rotator Cuff (Subscapularis)', 'Core', 'Lats', 'Pecs'],
                'description' => 'Anchor at side. Rotate arm inward. Internal rotator strength.',
            ],
            [
                'name' => 'Tube Band Y-Raise',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Traps', 'Rhomboids', 'Rear Deltoids', 'Core', 'Stabilizers'],
                'description' => 'Stand on band. Raise arms into Y-shape. Lower trap emphasis.',
            ],
            [
                'name' => 'Tube Band T-Raise',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Rhomboids', 'Middle Traps', 'Rear Deltoids', 'Core', 'Stabilizers'],
                'description' => 'Stand on band. Raise arms into T-shape. Mid-back emphasis.',
            ],
            [
                'name' => 'Tube Band Face Pull (Standing)',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Rear Deltoids', 'Upper Traps', 'Rhomboids', 'Rotator Cuff', 'Core'],
                'description' => 'Anchor at face height. Pull toward face. Posture and shoulder health.',
            ],
            [
                'name' => 'Tube Band Seated Row',
                'equipment' => 'Resistance Band Tube',
                'category_slug' => 'strength',
                'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Rear Deltoids', 'Traps'],
                'description' => 'Anchor in front. Seated rowing with band. Back strength.',
            ],
        ];

        $sourceDir = public_path('execises/resistance-band-tube');
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
