<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class GymnasticRingsSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Ring Dip', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core'], 'description' => 'Lower body until shoulders are below rings, then press up. Rings must be turned out at the top for stability.'],
            ['name' => 'Ring Turned-Out Dip (RTO Dip)', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Biceps', 'Core', 'Shoulder Stabilizers'], 'description' => 'Perform a dip but turn rings outward (palms forward) at the top. Increases shoulder and bicep engagement.'],
            ['name' => 'Ring Push-Up', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => 'Plank position with rings under chest. Lower chest between rings, push up, turn rings out at the top.'],
            ['name' => 'Ring Inverted Row', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Back (Lats', 'Rhomboids)', 'Biceps', 'Rear Deltoids', 'Core'], 'description' => 'Lie under rings, pull chest to rings while keeping body straight. Squeeze shoulder blades together.'],
            ['name' => 'Ring Pull-Up', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Rear Deltoids', 'Core'], 'description' => 'Hang from rings and pull chin above rings. Keep rings stable and turn them out at the top.'],
            ['name' => 'Ring Muscle-Up', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Biceps', 'Core', 'Shoulders'], 'description' => 'Explosive pull-up transitioning into a dip above the rings. Requires false grip and powerful hip drive.'],
            ['name' => 'Ring False Grip Pull-Up', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Forearms', 'Core'], 'description' => 'Pull-up with wrists deep in the rings (false grip). Prepares wrists for muscle-ups and ring transitions.'],
            ['name' => 'Ring L-Sit Pull-Up', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Core (Hip Flexors', 'Abs)', 'Shoulders'], 'description' => 'Pull up while holding legs straight out in front (L-position). Engages core throughout the entire movement.'],
            ['name' => 'Ring L-Sit', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'core', 'target_muscles' => ['Core (Rectus Abdominis', 'Hip Flexors)', 'Triceps', 'Shoulders'], 'description' => 'Support hold with legs straight out horizontally. Push rings down and externally rotate shoulders.'],
            ['name' => 'Ring Support Hold', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'core', 'target_muscles' => ['Chest', 'Triceps', 'Shoulders', 'Core', 'Stabilizers'], 'description' => 'Hold locked-out position on rings with arms straight. Turn rings out (RTO) for maximum stability.'],
            ['name' => 'Ring Front Lever', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Core (Entire)', 'Glutes', 'Hamstrings', 'Shoulders'], 'description' => 'Hang and raise body to horizontal straight line facing up. Advanced static hold requiring massive lat and core strength.'],
            ['name' => 'Ring Back Lever', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Lower Back', 'Lats', 'Glutes', 'Hamstrings', 'Shoulders', 'Core'], 'description' => 'Hang and raise body to horizontal straight line facing down. Arms locked, rings turned out. Advanced.'],
            ['name' => 'Ring Planche Lean', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Shoulders', 'Biceps', 'Core', 'Hip Flexors'], 'description' => 'Lean forward with rings at hip level, body straight. Shoulders protract and depress intensely. Advanced.'],
            ['name' => 'Ring Skin the Cat', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Lats', 'Core', 'Biceps', 'Chest'], 'description' => 'From hang, pull knees to chest, roll backward into german hang, then reverse to starting position. Full shoulder rotation.'],
            ['name' => 'Ring German Hang', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'mobility', 'target_muscles' => ['Shoulders (Anterior)', 'Biceps', 'Chest', 'Lats', 'Core'], 'description' => 'Hang upside down with rings behind your back, arms extended. Deep shoulder stretch and strength hold.'],
            ['name' => 'Ring Pelican Curl (Bicep Curl)', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Chest', 'Shoulders'], 'description' => 'From inverted hang, curl body up by flexing elbows until rings reach hips. Extreme bicep and shoulder exercise.'],
            ['name' => 'Ring Bulgarian Split Squat', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Place one foot in a ring behind you. Perform single-leg squat with front leg. Rings provide suspension and instability.'],
            ['name' => 'Ring Hamstring Curl', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core'], 'description' => 'Lie on back with heels in rings. Bridge hips up and curl heels toward glutes by flexing knees.'],
            ['name' => 'Ring Fallout (Ring Rollout)', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Core (Abs)', 'Shoulders', 'Lats', 'Triceps'], 'description' => 'Kneel with arms extended holding rings. Lean forward until body is parallel, then pull back. Ab wheel-like anti-extension.'],
            ['name' => 'Ring Archer Pull-Up', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Core', 'Shoulders', 'Stabilizers'], 'description' => 'Pull up while extending one arm fully and pulling with the other. Shift weight to one side. Advanced unilateral pull.'],
            ['name' => 'Ring Archer Push-Up', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Core', 'Shoulder Stabilizers'], 'description' => 'Push-up position with one arm extended wide, other arm does the push. Shift weight to working side.'],
            ['name' => 'Ring Fly (Chest Fly)', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Pecs)', 'Anterior Deltoids', 'Core'], 'description' => 'Stand lean-forward with arms extended to sides. Bring rings together in front of chest in a hugging motion.'],
            ['name' => 'Ring Rear Delt Fly', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Traps', 'Core'], 'description' => 'Lean back with arms extended forward. Pull rings apart to sides with straight arms, squeezing shoulder blades.'],
            ['name' => 'Ring Face Pull', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Upper Traps', 'Rhomboids', 'Rotator Cuff'], 'description' => 'Set rings at face height. Pull rings toward your face with elbows high. Great for shoulder health and posture.'],
            ['name' => 'Ring Triceps Extension (Skull Crusher)', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Triceps (Long Head)', 'Core', 'Shoulders'], 'description' => 'Lie under rings with arms extended overhead. Lower rings to sides of head by flexing elbows, then extend.'],
            ['name' => 'Ring Knee Tuck', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'core', 'target_muscles' => ['Core (Lower Abs)', 'Hip Flexors', 'Shoulders'], 'description' => 'In support hold, tuck knees to chest while keeping arms locked. Engages abs dynamically.'],
            ['name' => 'Ring Toes-to-Bar (Toes-to-Rings)', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'core', 'target_muscles' => ['Core (Lower Abs', 'Obliques)', 'Lats', 'Hip Flexors'], 'description' => 'Hang from rings and lift straight legs to touch rings. Core-intensive with shoulder stability demand.'],
            ['name' => 'Ring Windshield Wiper', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'core', 'target_muscles' => ['Core (Obliques)', 'Hip Flexors', 'Lats'], 'description' => 'Hang with legs straight up (90°). Rotate legs side to side like windshield wipers. Advanced oblique and core work.'],
            ['name' => 'Ring Hollow Body Hold', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'core', 'target_muscles' => ['Core (Entire)', 'Shoulders', 'Hip Flexors'], 'description' => 'Hang with body in hollow position (rounded back, legs raised). Engages deep core stabilizers.'],
            ['name' => 'Ring Archer Row', 'equipment' => 'Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core'], 'description' => 'Inverted row position. Pull with one arm while extending the other. Shifts load to one side for unilateral back work.'],
        ];

        foreach ($exercises as $data) {
            Exercise::create([
                'name' => $data['name'],
                'equipment' => $data['equipment'],
                'category_id' => $categories[$data['category_slug']],
                'target_muscles' => $data['target_muscles'],
                'description' => $data['description'],
            ]);
        }
    }
}
