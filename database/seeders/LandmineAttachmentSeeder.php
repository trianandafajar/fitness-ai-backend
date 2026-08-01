<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class LandmineAttachmentSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Landmine Single-Arm Row', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Forearms', 'Traps'], 'description' => 'Staggered stance. Pull barbell end toward hip/chest. Squeeze back at peak.'],
            ['name' => 'Landmine Single-Arm Press', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Core', 'Obliques', 'Stabilizers'], 'description' => 'Staggered stance. Press barbell end overhead from shoulder height. Anti-rotation core challenge.'],
            ['name' => 'Landmine Two-Arm Row', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Forearms', 'Traps'], 'description' => 'Straddle bar. Pull both arms toward chest. Emphasizes mid-back and biceps.'],
            ['name' => 'Landmine Two-Arm Press (Neutral Grip)', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Core', 'Traps', 'Stabilizers'], 'description' => 'Press barbell end overhead with both hands. Neutral grip shoulder press.'],
            ['name' => 'Landmine Squat', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Traps', 'Calves'], 'description' => 'Hold barbell end at chest. Perform squats. Front squat variation with landmine stability.'],
            ['name' => 'Landmine Squat to Press', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Shoulders', 'Triceps', 'Traps', 'Hamstrings'], 'description' => 'Squat holding bar at chest, then press overhead as you stand. Full-body compound movement.'],
            ['name' => 'Landmine Lunge (Forward)', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Stabilizers'], 'description' => 'Hold barbell end at chest. Lunge forward. Unilateral leg work with landmine load.'],
            ['name' => 'Landmine Reverse Lunge', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Stabilizers'], 'description' => 'Hold barbell end at chest. Step backward into lunge. Knee-friendly unilateral work.'],
            ['name' => 'Landmine Lateral Lunge', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Quadriceps', 'Glutes', 'Core', 'Shoulders', 'Stabilizers'], 'description' => 'Hold barbell end at chest. Step laterally into deep lunge. Targets inner thighs.'],
            ['name' => 'Landmine Deadlift', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Forearms', 'Traps', 'Lats'], 'description' => 'Stand over barbell end. Lift with hip hinge. Deadlift variation with angled bar.'],
            ['name' => 'Landmine Single-Leg Deadlift', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Forearms', 'Traps', 'Stabilizers'], 'description' => 'Balance on one leg. Hinge forward with barbell end. Unilateral posterior chain.'],
            ['name' => 'Landmine Good Morning', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core', 'Traps', 'Forearms'], 'description' => 'Barbell end behind neck or on shoulders. Hinge forward at hips. Posterior chain emphasis.'],
            ['name' => 'Landmine Romanian Deadlift (RDL)', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core', 'Traps', 'Forearms'], 'description' => 'Barbell end at hip height. Hinge backward, lower bar, return. Hamstring-dominant deadlift.'],
            ['name' => 'Landmine Oblique Twist (Russian Twist)', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Shoulders', 'Lats', 'Forearms'], 'description' => 'Sit with barbell end at side. Rotate torso and swing bar to opposite side. Rotational core work.'],
            ['name' => 'Landmine Rotational Lunge', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Quadriceps', 'Glutes', 'Hamstrings', 'Shoulders', 'Lats'], 'description' => 'Lunge forward while rotating barbell across body. Combines lower body with rotational power.'],
            ['name' => 'Landmine Woodchopper (Diagonal Chop)', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Shoulders', 'Lats', 'Forearms', 'Glutes', 'Hip Rotators'], 'description' => 'Swing barbell diagonally from low to high or high to low. Rotational power and core.'],
            ['name' => 'Landmine Reverse Woodchopper', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Shoulders', 'Lats', 'Forearms', 'Hip Rotators'], 'description' => 'Reverse direction woodchopper. Balances rotational development.'],
            ['name' => 'Landmine Side Bend', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Quadratus Lumborum', 'Shoulders', 'Forearms', 'Traps'], 'description' => 'Hold barbell end overhead. Bend sideways. Targets obliques and lateral core.'],
            ['name' => 'Landmine Windmill', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Core (Obliques)', 'Shoulders', 'Hamstrings', 'Glutes', 'Traps', 'Forearms'], 'description' => 'Hold barbell end overhead. Bend sideways while keeping arm straight. Mobility and core.'],
            ['name' => 'Landmine Single-Arm Snatch', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Triceps', 'Traps', 'Forearms'], 'description' => 'Explosively pull barbell end from floor to overhead. Full-body power movement.'],
            ['name' => 'Landmine Single-Arm Clean', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Biceps', 'Forearms', 'Traps'], 'description' => 'Pull barbell end from floor to shoulder. Hip drive and upper body pull.'],
            ['name' => 'Landmine Push Press (Two-Arm)', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Quadriceps', 'Glutes', 'Forearms', 'Traps'], 'description' => 'Dip and drive with legs to press barbell end overhead. Explosive overhead strength.'],
            ['name' => 'Landmine Strict Press (Two-Arm)', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Core', 'Forearms', 'Traps', 'Stabilizers'], 'description' => 'Press barbell end overhead with no leg drive. Pure shoulder and triceps strength.'],
            ['name' => 'Landmine Arnold Press', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Biceps', 'Core', 'Forearms', 'Traps', 'Chest'], 'description' => 'Start bar at chest, rotate as you press overhead. Rotational shoulder development.'],
            ['name' => 'Landmine Chest Press (Floor Press)', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Forearms', 'Stabilizers'], 'description' => 'Lie on floor or bench. Press barbell end from chest upward. Angled chest press.'],
            ['name' => 'Landmine Single-Arm Chest Press', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Shoulders', 'Core', 'Obliques', 'Forearms', 'Stabilizers'], 'description' => 'One-arm chest press. Unilateral chest work with core anti-rotation.'],
            ['name' => 'Landmine Bent-Over Row (Two-Arm Wide)', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Forearms', 'Traps'], 'description' => 'Wide grip on barbell end. Row toward chest. Emphasizes mid-back width.'],
            ['name' => 'Landmine Bent-Over Row (Two-Arm Narrow)', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Forearms', 'Traps', 'Rear Deltoids'], 'description' => 'Narrow grip on barbell end. Row toward stomach. Emphasizes lats and lower back.'],
            ['name' => 'Landmine Triceps Extension (Lying)', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Shoulders', 'Core', 'Forearms', 'Chest', 'Lats'], 'description' => 'Lie on floor. Hold barbell end behind head. Extend arms overhead. Triceps extension.'],
            ['name' => 'Landmine Bicep Curl (Standing)', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Shoulders', 'Traps', 'Brachialis'], 'description' => 'Hold barbell end in front. Curl upward. Bicep curl with angled resistance.'],
            ['name' => 'Landmine Hammer Curl', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Brachialis', 'Brachioradialis', 'Forearms', 'Biceps', 'Core', 'Traps'], 'description' => 'Neutral grip curl. Forearm and brachialis emphasis.'],
            ['name' => 'Landmine Upright Row', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Traps', 'Deltoids', 'Biceps', 'Forearms', 'Core', 'Rhomboids'], 'description' => 'Pull barbell end to chin with narrow grip. Emphasizes traps and lateral delts.'],
            ['name' => 'Landmine Shrug', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Upper Trapezius', 'Levator Scapulae', 'Forearms', 'Core', 'Biceps'], 'description' => 'Hold barbell end at sides. Shrug shoulders upward. Trap development.'],
            ['name' => 'Landmine Single-Arm Side Bend', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Quadratus Lumborum', 'Shoulders', 'Forearms', 'Traps'], 'description' => 'Hold barbell end on one shoulder. Bend sideways. Unilateral oblique work.'],
            ['name' => 'Landmine Russian Twist (Feet Elevated)', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Shoulders', 'Forearms', 'Biceps'], 'description' => 'Sit with feet up. Rotate barbell side to side. Advanced rotational core work.'],
            ['name' => 'Landmine Halos', 'equipment' => 'Landmine Attachment', 'category_slug' => 'mobility', 'target_muscles' => ['Shoulders', 'Upper Traps', 'Forearms', 'Core', 'Neck Stabilizers', 'Rhomboids'], 'description' => 'Circle barbell end around head in halo pattern. Shoulder mobility and stability.'],
            ['name' => 'Landmine Reverse Halos', 'equipment' => 'Landmine Attachment', 'category_slug' => 'mobility', 'target_muscles' => ['Shoulders', 'Upper Traps', 'Forearms', 'Core', 'Lats', 'Rhomboids'], 'description' => 'Reverse direction halo. Balances shoulder mobility development.'],
            ['name' => 'Landmine Plate Loaded Thruster', 'equipment' => 'Landmine Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Shoulders', 'Triceps', 'Core', 'Traps', 'Hamstrings'], 'description' => 'Front squat to overhead press in one fluid motion. Full-body explosive movement.'],
        ];

        $sourceDir = public_path('execises/landmine-attachment');
        $files = glob($sourceDir . '/*.png');
        sort($files);

        foreach ($execises as $i => $data) {
            $sourceFile = $files[$i] ?? null;

            if ($sourceFile) {
                $imagePath = Storage::disk('public')->putFile('execises', new File($sourceFile));
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
