<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class SuspensionTrainerSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Suspension Trainer Push-Up', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => 'Hands in straps, plank position. Lower chest toward hands, push up. Unstable straps increase core and stabilizer demand.'],
            ['name' => 'Suspension Trainer Inverted Row', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Forearms'], 'description' => 'Lie under straps, pull chest to hands. Bodyweight row with suspension instability.'],
            ['name' => 'Suspension Trainer Atomic Push-Up', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Core (Lower Abs)', 'Shoulders', 'Hip Flexors'], 'description' => 'Push-up with feet in straps. At top, tuck knees to chest. Combines push-up with core crunch.'],
            ['name' => 'Suspension Trainer Pike Push-Up', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Core', 'Hip Flexors'], 'description' => 'Feet in straps. Pike hips up, lower head toward floor, press up. Shoulder-dominant push-up.'],
            ['name' => 'Suspension Trainer Fallout (Rollout)', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Core (Rectus Abdominis, Transversus)', 'Shoulders', 'Lats', 'Triceps'], 'description' => 'Kneel facing anchor. Extend arms forward, lean body down, pull back. Anti-extension core exercise.'],
            ['name' => 'Suspension Trainer Bodyweight Squat', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Hold straps at chest height. Perform squats. Straps assist balance and add upper body engagement.'],
            ['name' => 'Suspension Trainer Single-Leg Squat (Pistol)', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Hold straps for balance. Perform one-legged squat to full depth. Unilateral leg strength.'],
            ['name' => 'Suspension Trainer Lunge (Standing)', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Rear foot in strap. Perform single-leg lunge. Unilateral leg work with balance challenge.'],
            ['name' => 'Suspension Trainer Lateral Lunge', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Stabilizers'], 'description' => 'Hold straps. Step laterally into deep lunge. Targets inner thighs and hip stabilizers.'],
            ['name' => 'Suspension Trainer Hip Thrust', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Flexors', 'Lower Back'], 'description' => 'Lie supine with feet in straps. Bridge hips up, squeeze glutes, lower. Suspension adds instability.'],
            ['name' => 'Suspension Trainer Hamstring Curl', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Lie supine with heels in straps. Bridge hips up, curl heels toward glutes, extend. Hamstring dominant.'],
            ['name' => 'Suspension Trainer Single-Leg Hamstring Curl', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Stabilizers', 'Calves'], 'description' => 'Single-leg hamstring curl. One foot in strap, other elevated. Unilateral hamstring strength.'],
            ['name' => 'Suspension Trainer Bicep Curl', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Shoulders', 'Traps', 'Brachialis'], 'description' => 'Lean back holding straps. Curl body up by flexing elbows. Bodyweight bicep curl.'],
            ['name' => 'Suspension Trainer Triceps Extension', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Core', 'Shoulders', 'Forearms', 'Chest', 'Lats'], 'description' => 'Face away from anchor with straps behind head. Extend arms forward. Triceps bodyweight extension.'],
            ['name' => 'Suspension Trainer Chest Fly', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Pecs)', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => 'Lean forward with arms extended. Bring straps together in front. Chest fly with bodyweight resistance.'],
            ['name' => 'Suspension Trainer Rear Delt Fly', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Traps', 'Core', 'Stabilizers'], 'description' => 'Lean back with arms forward. Pull straps apart to sides. Rear delt and upper back emphasis.'],
            ['name' => 'Suspension Trainer Face Pull', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Upper Traps', 'Rhomboids', 'Rotator Cuff', 'Core'], 'description' => 'Face anchor with straps. Pull toward face with elbows high. Shoulder health and posture.'],
            ['name' => 'Suspension Trainer Y-Fly', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Lower Traps', 'Rhomboids', 'Rear Deltoids', 'Core', 'Stabilizers'], 'description' => 'Lean back. Pull straps into Y-shape overhead. Upper back and scapular control.'],
            ['name' => 'Suspension Trainer T-Fly', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Rhomboids', 'Middle Traps', 'Rear Deltoids', 'Core', 'Stabilizers'], 'description' => 'Lean back. Pull straps into T-shape at shoulder height. Mid-back and shoulder stabilizers.'],
            ['name' => 'Suspension Trainer W-Fly', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Lower Traps', 'Rhomboids', 'Rear Deltoids', 'Core', 'Rotator Cuff'], 'description' => 'Lean back. Pull straps into W-shape with elbows down. Scapular retraction and shoulder health.'],
            ['name' => 'Suspension Trainer Plank', 'equipment' => 'Suspension Trainer', 'category_slug' => 'core', 'target_muscles' => ['Core', 'Shoulders', 'Chest', 'Triceps', 'Glutes', 'Stabilizers'], 'description' => 'Feet or hands in straps. Hold plank position. Unstable straps increase core and shoulder engagement.'],
            ['name' => 'Suspension Trainer Side Plank', 'equipment' => 'Suspension Trainer', 'category_slug' => 'core', 'target_muscles' => ['Obliques', 'Core', 'Shoulders', 'Glutes', 'Hip Abductors', 'Stabilizers'], 'description' => 'Side plank with feet in straps. Unstable suspension challenges obliques and stabilizers.'],
            ['name' => 'Suspension Trainer Mountain Climber', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Core (Lower Abs)', 'Hip Flexors', 'Shoulders', 'Quadriceps'], 'description' => 'Plank with feet in straps. Alternate driving knees to chest. Dynamic core and cardio.'],
            ['name' => 'Suspension Trainer Knee Tuck', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Core (Lower Abs)', 'Hip Flexors', 'Shoulders', 'Triceps', 'Quadriceps'], 'description' => 'Plank with feet in straps. Tuck both knees to chest simultaneously, then extend. Lower ab focus.'],
            ['name' => 'Suspension Trainer Jackknife (Pike)', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Shoulders', 'Hip Flexors', 'Hamstrings', 'Triceps'], 'description' => 'Plank with feet in straps. Pike hips up, sliding feet toward hands. Core and shoulder engagement.'],
            ['name' => 'Suspension Trainer Oblique Knee Tuck', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Shoulders', 'Quadriceps'], 'description' => 'Plank with feet in straps. Drive knee to opposite elbow. Cross-body core activation.'],
            ['name' => 'Suspension Trainer L-Sit', 'equipment' => 'Suspension Trainer', 'category_slug' => 'core', 'target_muscles' => ['Core (Rectus Abdominis, Hip Flexors)', 'Triceps', 'Shoulders', 'Quads'], 'description' => 'Support hold with legs straight out in L-position. Core and shoulder endurance.'],
            ['name' => 'Suspension Trainer V-Sit', 'equipment' => 'Suspension Trainer', 'category_slug' => 'core', 'target_muscles' => ['Core (Entire)', 'Hip Flexors', 'Triceps', 'Shoulders', 'Hamstrings'], 'description' => 'Lift legs and torso into V-shape. Advanced core and hip flexor strength.'],
            ['name' => 'Suspension Trainer Leg Raise (Hanging)', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Core (Lower Abs)', 'Hip Flexors', 'Shoulders', 'Lats'], 'description' => 'Support hold. Raise straight legs to 90° or higher. Strict lower ab work.'],
            ['name' => 'Suspension Trainer Windshield Wiper', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Core (Obliques)', 'Hip Flexors', 'Shoulders', 'Lats', 'Stabilizers'], 'description' => 'L-sit position. Rotate legs side-to-side. Advanced oblique and core control.'],
            ['name' => 'Suspension Trainer Superman (Back Extension)', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Traps'], 'description' => 'Face down with straps under chest. Extend body straight. Lower back and glute emphasis.'],
            ['name' => 'Suspension Trainer Dead Bug', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Core (Transversus)', 'Hip Flexors', 'Shoulders', 'Stabilizers', 'Rectus Abdominis'], 'description' => 'Lie supine with feet in straps. Extend opposite arm/leg. Core stability and coordination.'],
            ['name' => 'Suspension Trainer Ab Rollout (Kneeling)', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Core (Rectus, Transversus)', 'Shoulders', 'Lats', 'Triceps'], 'description' => 'Kneel with hands in straps. Roll forward into extension, pull back. Anti-extension core work.'],
            ['name' => 'Suspension Trainer I-Y-T Raises', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Traps', 'Rhomboids', 'Rear Deltoids', 'Core', 'Rotator Cuff', 'Lats'], 'description' => 'Lean back. Raise arms into I, Y, and T positions. Complete shoulder and upper back development.'],
            ['name' => 'Suspension Trainer Single-Arm Row', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Obliques', 'Forearms', 'Traps'], 'description' => 'Pull with one arm while other stabilizes. Unilateral back work and core anti-rotation.'],
            ['name' => 'Suspension Trainer Single-Arm Press', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Shoulders', 'Core', 'Obliques', 'Stabilizers'], 'description' => 'Push with one arm. Unilateral chest/shoulder work with core anti-rotation.'],
            ['name' => 'Suspension Trainer Archer Push-Up', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Core', 'Obliques', 'Shoulder Stabilizers'], 'description' => 'Push-up with one arm extended wide and other working. Unilateral chest and core.'],
            ['name' => 'Suspension Trainer Spiderman Push-Up', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Core', 'Hip Flexors', 'Adductors', 'Shoulders'], 'description' => 'Push-up while bringing knee to same-side elbow. Dynamic core and hip mobility.'],
            ['name' => 'Suspension Trainer Superman Row', 'equipment' => 'Suspension Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Erector Spinae', 'Core', 'Biceps', 'Rear Deltoids'], 'description' => 'Hang face down with legs extended. Row body to hands. Full posterior chain engagement.'],
        ];

        $sourceDir = public_path('execises/suspension-trainer');
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
