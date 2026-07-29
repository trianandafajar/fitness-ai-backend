<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class SwissBarSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Swiss Bar Flat Bench Press (Neutral Grip)', 'equipment' => 'Swiss Bar', 'category_slug' => 'strength', 'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps'], 'description' => 'Lie on a flat bench, grip the neutral handles slightly wider than shoulder-width. Press the bar from mid-chest to full lockout. The neutral grip reduces shoulder strain and emphasizes triceps alongside the chest.'],
            ['name' => 'Swiss Bar Incline Bench Press (Neutral Grip)', 'equipment' => 'Swiss Bar', 'category_slug' => 'strength', 'target_muscles' => ['Upper Pectoralis', 'Anterior Deltoids', 'Triceps'], 'description' => 'Set bench to 30-45°. Press from the upper chest with a neutral grip. Targets the clavicular head while maintaining a joint-friendly wrist and shoulder position.'],
            ['name' => 'Swiss Bar Decline Bench Press (Neutral Grip)', 'equipment' => 'Swiss Bar', 'category_slug' => 'strength', 'target_muscles' => ['Lower Pectoralis', 'Anterior Deltoids', 'Triceps'], 'description' => 'On a decline bench, use a neutral grip to press from the lower sternum. Emphasizes the lower chest with less shoulder impingement risk.'],
            ['name' => 'Swiss Bar Close-Grip Bench Press (Narrow Neutral)', 'equipment' => 'Swiss Bar', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Inner Pectoralis', 'Anterior Deltoids'], 'description' => 'Grip the innermost neutral handles (shoulder-width or narrower). Lower to the lower chest while keeping elbows close, heavily recruiting the triceps.'],
            ['name' => 'Swiss Bar Wide-Grip Bench Press (Wide Neutral)', 'equipment' => 'Swiss Bar', 'category_slug' => 'hypertrophy', 'target_muscles' => ['Pectoralis Major (outer fibers)', 'Anterior Deltoids', 'Triceps'], 'description' => 'Use the widest neutral handles to increase horizontal abduction, stretching the chest maximally and targeting the outer pecs.'],
            ['name' => 'Swiss Bar Floor Press (Neutral Grip)', 'equipment' => 'Swiss Bar', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Pectoralis Major', 'Anterior Deltoids'], 'description' => 'Lie on the floor inside a power rack, press the Swiss Bar from a dead stop on the pins or floor. Emphasizes lockout strength and spares the shoulders.'],
            ['name' => 'Swiss Bar Push Press (Neutral Grip)', 'equipment' => 'Swiss Bar', 'category_slug' => 'power', 'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Quadriceps', 'Core'], 'description' => 'Clean the bar to the shoulders, dip slightly, then drive explosively overhead using leg drive. The neutral grip is easier on the wrists during the drive.'],
            ['name' => 'Swiss Bar Seated Overhead Press (Neutral Grip)', 'equipment' => 'Swiss Bar', 'category_slug' => 'strength', 'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps'], 'description' => 'Sit on a bench with back support, press the bar from shoulder height to lockout overhead using neutral handles. Reduces shoulder impingement.'],
            ['name' => 'Swiss Bar Standing Overhead Press (Neutral Grip)', 'equipment' => 'Swiss Bar', 'category_slug' => 'strength', 'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Core'], 'description' => 'Press the bar from the front rack position overhead while standing. The neutral grip keeps the shoulders in a safer externally rotated position.'],
            ['name' => 'Swiss Bar Bent-Over Row (Neutral Grip)', 'equipment' => 'Swiss Bar', 'category_slug' => 'strength', 'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Middle Traps', 'Biceps', 'Rear Deltoids', 'Erector Spinae'], 'description' => 'Hinge forward, grip a neutral handle, and row the bar to the lower abdomen. The neutral grip allows a stronger lat contraction and reduces forearm fatigue.'],
            ['name' => 'Swiss Bar Pendlay Row (Neutral Grip)', 'equipment' => 'Swiss Bar', 'category_slug' => 'strength', 'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Traps', 'Biceps', 'Erector Spinae'], 'description' => 'Start each rep from the floor, back parallel to the ground, pull explosively to the sternum with a neutral grip, then reset.'],
            ['name' => 'Swiss Bar Chest-Supported Row (Neutral Grip)', 'equipment' => 'Swiss Bar', 'category_slug' => 'strength', 'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Middle Traps', 'Rear Deltoids', 'Biceps'], 'description' => 'Lie face-down on an incline bench, row the Swiss Bar to the bench using a neutral grip, squeezing the shoulder blades.'],
            ['name' => 'Swiss Bar Seal Row (Neutral Grip)', 'equipment' => 'Swiss Bar', 'category_slug' => 'strength', 'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Biceps', 'Rear Deltoids'], 'description' => 'Lie prone on a high bench, row the bar up to the underside. The neutral grip and full support isolate the back without spinal loading.'],
            ['name' => 'Swiss Bar Lying Triceps Extension (Skull Crusher, Neutral Grip)', 'equipment' => 'Swiss Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Triceps Brachii'], 'description' => 'Lie on a flat bench, press the bar overhead with a narrow neutral grip, lower it toward the crown of the head by bending the elbows, then extend.'],
            ['name' => 'Swiss Bar Overhead Triceps Extension (Neutral Grip)', 'equipment' => 'Swiss Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Triceps Brachii (long head)'], 'description' => 'Stand or sit holding the Swiss Bar overhead, lower it behind the head with a narrow neutral grip, then extend to lockout. Deep stretch on the long head.'],
            ['name' => 'Swiss Bar JM Press', 'equipment' => 'Swiss Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Triceps', 'Pectorals'], 'description' => 'Lower the bar to the chin or upper chest with a neutral grip, keeping elbows slightly flared. Drive back up aggressively; a hybrid between a press and an extension.'],
            ['name' => 'Swiss Bar Curl (Neutral Grip / Hammer Curl)', 'equipment' => 'Swiss Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Biceps', 'Brachialis', 'Brachioradialis'], 'description' => 'Stand holding the Swiss Bar with a shoulder-width neutral grip. Curl the bar up, squeezing at the top. Emphasizes the brachialis and brachioradialis due to the neutral wrist.'],
            ['name' => 'Swiss Bar Curl (Supinated Grip)', 'equipment' => 'Swiss Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Biceps Brachii', 'Brachialis'], 'description' => 'If the bar has angled supinated handles, use those to perform a traditional biceps curl, maximizing biceps peak contraction.'],
            ['name' => 'Swiss Bar Reverse Curl (Pronated Grip)', 'equipment' => 'Swiss Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Brachioradialis', 'Wrist Extensors', 'Biceps'], 'description' => 'Grip the overhand (pronated) handles, curl the bar up keeping elbows stationary. Targets the forearms and brachioradialis intensely.'],
            ['name' => 'Swiss Bar Preacher Curl (Neutral Grip)', 'equipment' => 'Swiss Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Biceps', 'Brachialis'], 'description' => 'Use a preacher bench with a narrow or shoulder-width neutral grip. Eliminates momentum and provides constant tension on the arms.'],
            ['name' => 'Swiss Bar Drag Curl', 'equipment' => 'Swiss Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Biceps Brachii', 'Brachialis'], 'description' => 'Slide the bar up the front of the torso, pulling the elbows backward. Keeps the biceps under continuous tension.'],
            ['name' => 'Swiss Bar Upright Row (Neutral Grip)', 'equipment' => 'Swiss Bar', 'category_slug' => 'strength', 'target_muscles' => ['Medial Deltoids', 'Upper Traps', 'Biceps'], 'description' => 'Hold the bar with a close neutral grip, pull it up along the body to chin height, leading with the elbows. Less internal rotation than a straight bar.'],
            ['name' => 'Swiss Bar Shrug (Neutral Grip)', 'equipment' => 'Swiss Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Upper Trapezius', 'Levator Scapulae'], 'description' => 'Hold the bar at arm\'s length, shrug the shoulders straight up toward the ears using a comfortable neutral grip, then lower.'],
            ['name' => 'Swiss Bar Romanian Deadlift', 'equipment' => 'Swiss Bar', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae'], 'description' => 'Hold the bar with a neutral grip at hip level, hinge forward by pushing the hips back, feel the hamstring stretch, then return.'],
            ['name' => 'Swiss Bar Good Morning', 'equipment' => 'Swiss Bar', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core'], 'description' => 'Place the bar on the upper back, grip the neutral handles for a more comfortable shoulder position. Hinge forward at the hips, then stand back up.'],
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
