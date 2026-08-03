<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class IndianClubSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Indian Club Front Swing (Single Arm)', 'equipment' => 'Indian Club', 'category_slug' => 'mobility', 'target_muscles' => ['Shoulders', 'Rotator Cuff', 'Forearms', 'Core'], 'description' => 'Hold a club in one hand, swing it forward from the shoulder, letting the club drop behind the shoulder, then reverse the arc. The light weight improves shoulder mobility and coordination.'],
            ['name' => 'Indian Club Outside Swing (Single Arm)', 'equipment' => 'Indian Club', 'category_slug' => 'mobility', 'target_muscles' => ['Shoulders', 'Rotator Cuff', 'Forearms', 'Obliques'], 'description' => 'Swing the club in a full arc outside the arm, circling behind the shoulder and returning to the front. Enhances external rotation and shoulder range of motion.'],
            ['name' => 'Indian Club Inside Swing (Single Arm)', 'equipment' => 'Indian Club', 'category_slug' => 'mobility', 'target_muscles' => ['Shoulders', 'Rotator Cuff', 'Forearms', 'Core'], 'description' => 'Swing the club in a circular arc across the front of the body, from the opposite hip to behind the same shoulder. Internal and external rotation in a smooth pattern.'],
            ['name' => 'Indian Club Double Front Swing', 'equipment' => 'Indian Club', 'category_slug' => 'mobility', 'target_muscles' => ['Shoulders', 'Rotator Cuff', 'Forearms', 'Core'], 'description' => 'Hold a club in each hand, swing both forward simultaneously in matching arcs behind the shoulders and back. Develops symmetrical shoulder mobility.'],
            ['name' => 'Indian Club Double Outside Swing', 'equipment' => 'Indian Club', 'category_slug' => 'mobility', 'target_muscles' => ['Shoulders', 'Rotator Cuff', 'Forearms', 'Obliques'], 'description' => 'With a club in each hand, swing both in outside arcs simultaneously, circling behind the shoulders. Maximizes shoulder flexion and external rotation.'],
            ['name' => 'Indian Club Double Inside Swing', 'equipment' => 'Indian Club', 'category_slug' => 'mobility', 'target_muscles' => ['Shoulders', 'Rotator Cuff', 'Forearms', 'Core'], 'description' => 'Swing both clubs in inside arcs across the front of the body simultaneously. Emphasizes internal rotation and cross-body coordination.'],
            ['name' => 'Indian Club Alternating Outside Swing', 'equipment' => 'Indian Club', 'category_slug' => 'coordination', 'target_muscles' => ['Shoulders', 'Rotator Cuff', 'Forearms', 'Core'], 'description' => 'Swing one club forward while the other swings back in outside arcs, creating a continuous alternating rhythm. Challenges coordination and bilateral mobility.'],
            ['name' => 'Indian Club Alternating Inside Swing', 'equipment' => 'Indian Club', 'category_slug' => 'coordination', 'target_muscles' => ['Shoulders', 'Rotator Cuff', 'Forearms', 'Core'], 'description' => 'Alternate the inside swing pattern, one club circling while the other reverses. Builds rhythm and cross-body motor control.'],
            ['name' => 'Indian Club Parallel Swing (Matching)', 'equipment' => 'Indian Club', 'category_slug' => 'mobility', 'target_muscles' => ['Shoulders', 'Rotator Cuff', 'Forearms'], 'description' => 'Swing both clubs side by side in identical arcs, moving together like a single unit. Synchronized motion enhances shoulder stability.'],
            ['name' => 'Indian Club Hip Circle (Front Plane)', 'equipment' => 'Indian Club', 'category_slug' => 'mobility', 'target_muscles' => ['Shoulders', 'Forearms', 'Core'], 'description' => 'Hold a club in each hand, make large circles in front of the body, moving the clubs around each other or in unison. Opens the chest and improves shoulder control.'],
            ['name' => 'Indian Club Figure-Eight (Single Arm)', 'equipment' => 'Indian Club', 'category_slug' => 'coordination', 'target_muscles' => ['Shoulders', 'Rotator Cuff', 'Forearms', 'Core'], 'description' => 'Trace a continuous figure-eight pattern with a single club, crossing the midline of the body. Develops intricate shoulder control and timing.'],
            ['name' => 'Indian Club Figure-Eight (Double)', 'equipment' => 'Indian Club', 'category_slug' => 'coordination', 'target_muscles' => ['Shoulders', 'Rotator Cuff', 'Forearms', 'Core'], 'description' => 'Trace figure-eight patterns with both clubs simultaneously, weaving in and out. Advanced rhythm and bilateral coordination exercise.'],
            ['name' => 'Indian Club Overhead Pendulum', 'equipment' => 'Indian Club', 'category_slug' => 'mobility', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Forearms'], 'description' => 'Hold a club in one hand overhead, let it pendulum down behind the head and back up. Stretches the shoulder into deep flexion and external rotation.'],
            ['name' => 'Indian Club Shoulder Cast (Front Rack Extension)', 'equipment' => 'Indian Club', 'category_slug' => 'mobility', 'target_muscles' => ['Anterior Deltoids', 'Triceps', 'Core', 'Forearms'], 'description' => 'From a front rack position (club resting on forearm and shoulder), extend the arm forward and upward to lockout, then return. Builds shoulder stability and triceps endurance.'],
            ['name' => 'Indian Club Rotator Cuff Drill (Internal/External Rotation)', 'equipment' => 'Indian Club', 'category_slug' => 'mobility', 'target_muscles' => ['Rotator Cuff', 'Infraspinatus', 'Teres Minor', 'Subscapularis'], 'description' => 'Hold a club with elbow bent at 90° and upper arm against the body. Rotate the arm externally and internally, using the club\'s leverage to strengthen the rotator cuff.'],
            ['name' => 'Indian Club Uppercut Swing (Diagonal)', 'equipment' => 'Indian Club', 'category_slug' => 'mobility', 'target_muscles' => ['Shoulders', 'Obliques', 'Core', 'Forearms'], 'description' => 'Swing the club diagonally upward across the body, like an uppercut punch, then let it arc behind the shoulder. Merges rotational core motion with shoulder mobility.'],
            ['name' => 'Indian Club Chop Swing (Diagonal Down)', 'equipment' => 'Indian Club', 'category_slug' => 'core', 'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Shoulders', 'Forearms'], 'description' => 'Swing the club diagonally downward across the body, finishing at the opposite hip. Controlled return through the same path. Engages the obliques and shoulders.'],
            ['name' => 'Indian Club Wrist Circles (Single Hand)', 'equipment' => 'Indian Club', 'category_slug' => 'mobility', 'target_muscles' => ['Wrist Flexors', 'Wrist Extensors', 'Forearms'], 'description' => 'Hold the club near the handle end, rotate the wrist in small circles clockwise and counterclockwise. Improves wrist mobility and forearm endurance.'],
            ['name' => 'Indian Club Squat Hold with Swings', 'equipment' => 'Indian Club', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Shoulders', 'Forearms'], 'description' => 'Hold a bodyweight squat, maintain the position while performing continuous club swings. Combines lower body endurance with shoulder mobility.'],
            ['name' => 'Indian Club Lunge with Swings', 'equipment' => 'Indian Club', 'category_slug' => 'coordination', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Shoulders'], 'description' => 'Perform a forward or reverse lunge while simultaneously swinging the clubs in an outside or inside pattern. Integrates full-body movement and coordination.'],
            ['name' => 'Indian Club Walking Swings', 'equipment' => 'Indian Club', 'category_slug' => 'coordination', 'target_muscles' => ['Shoulders', 'Rotator Cuff', 'Core', 'Quadriceps', 'Glutes'], 'description' => 'Walk forward slowly while continuously swinging the clubs in any pattern. Challenges the ability to maintain rhythm and shoulder mobility during locomotion.'],
            ['name' => 'Indian Club Kneeling Overhead Reach', 'equipment' => 'Indian Club', 'category_slug' => 'mobility', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Hip Flexors'], 'description' => 'Kneel on one knee, hold a club in one hand overhead, then lower it behind the back while keeping the torso upright. Stretches the shoulder and opens the hip flexor.'],
            ['name' => 'Indian Club Side Bend (Single Arm)', 'equipment' => 'Indian Club', 'category_slug' => 'core', 'target_muscles' => ['Obliques', 'Quadratus Lumborum', 'Shoulders'], 'description' => 'Hold a club in one hand overhead, bend laterally at the waist toward the opposite side, return. The club\'s leverage increases the stretch and oblique engagement.'],
            ['name' => 'Indian Club Good Morning (with Club on Back)', 'equipment' => 'Indian Club', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core'], 'description' => 'Rest a club across the upper back, holding the handle. Hinge forward at the hips until a hamstring stretch, then stand. The club adds light resistance for mobility.'],
            ['name' => 'Indian Club Overhead Squat (Single Club)', 'equipment' => 'Indian Club', 'category_slug' => 'mobility', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Shoulders', 'Core'], 'description' => 'Hold a club overhead with one arm locked. Squat as deep as possible while keeping the club stable. Tests shoulder mobility and core stability.'],
            ['name' => 'Indian Club Shrug', 'equipment' => 'Indian Club', 'category_slug' => 'isolation', 'target_muscles' => ['Upper Trapezius', 'Levator Scapulae'], 'description' => 'Hold a club in each hand, arms straight down. Shrug the shoulders up toward the ears, squeeze, and lower.'],
            ['name' => 'Indian Club Lateral Raise', 'equipment' => 'Indian Club', 'category_slug' => 'isolation', 'target_muscles' => ['Medial Deltoids', 'Supraspinatus'], 'description' => 'Hold a light club in one or both hands, raise the arm(s) out to the side to shoulder height, then lower. The club\'s length creates a longer lever arm.'],
            ['name' => 'Indian Club Front Raise', 'equipment' => 'Indian Club', 'category_slug' => 'isolation', 'target_muscles' => ['Anterior Deltoids'], 'description' => 'Hold a club in one or both hands in front of thighs, raise it straight forward to shoulder height, lower with control.'],
            ['name' => 'Indian Club Biceps Curl', 'equipment' => 'Indian Club', 'category_slug' => 'isolation', 'target_muscles' => ['Biceps Brachii', 'Brachialis'], 'description' => 'Hold a club with palms up, curl it by flexing the elbows, squeeze at the top. The club\'s top-heavy design makes the curl slightly harder at the top.'],
            ['name' => 'Indian Club Hammer Curl', 'equipment' => 'Indian Club', 'category_slug' => 'isolation', 'target_muscles' => ['Biceps', 'Brachialis', 'Brachioradialis'], 'description' => 'Hold clubs with neutral grip, curl them up keeping the wrists straight.'],
            ['name' => 'Indian Club Reverse Curl', 'equipment' => 'Indian Club', 'category_slug' => 'isolation', 'target_muscles' => ['Brachioradialis', 'Wrist Extensors', 'Biceps'], 'description' => 'Grip the clubs palms down, curl them upward, keeping elbows stationary.'],
            ['name' => 'Indian Club Overhead Triceps Extension', 'equipment' => 'Indian Club', 'category_slug' => 'isolation', 'target_muscles' => ['Triceps Brachii (Long Head)'], 'description' => 'Hold a club with both hands overhead, lower it behind the head by bending elbows, then extend.'],
            ['name' => 'Indian Club Calf Raise', 'equipment' => 'Indian Club', 'category_slug' => 'isolation', 'target_muscles' => ['Gastrocnemius', 'Soleus'], 'description' => 'Hold a club in each hand or rest one across the shoulders, raise the heels off a step, squeeze, and lower.'],
            ['name' => 'Indian Club Breath and Flow Sequence', 'equipment' => 'Indian Club', 'category_slug' => 'mobility', 'target_muscles' => ['Full Body', 'Shoulders', 'Core', 'Lungs'], 'description' => 'Combine multiple swing patterns (front, outside, inside) into a flowing sequence coordinated with deep, rhythmic breathing. Promotes relaxation, mobility, and full-body coordination.'],
        ];

        $sourceDir = public_path('execises/indian-club');
        $files = glob($sourceDir . '/*.png');
        sort($files);

        foreach ($execises as $i => $data) {
            $sourceFile = $files[$i] ?? null;

            if ($sourceFile) {
                $data['image'] = Storage::disk('public')->putFile('exercises', new File($sourceFile));
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
