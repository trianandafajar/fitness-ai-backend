<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class GripTrainerSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Grip Trainer Standard Squeeze', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Finger Flexors', 'Grip Muscles', 'Thenar Muscles', 'Lumbricals'], 'description' => 'Hold grip trainer in palm. Squeeze fully, hold peak, release with control. Builds crushing grip strength.'],
            ['name' => 'Grip Trainer Finger Squeeze (Individual)', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Finger Flexors', 'Forearm Flexors', 'Lumbricals', 'Interossei', 'Grip Muscles'], 'description' => 'Squeeze using individual fingers one at a time. Corrects grip imbalances and finger independence.'],
            ['name' => 'Grip Trainer Thumb Squeeze', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Thumb Muscles', 'Thenar Eminence', 'Forearm Flexors', 'Grip Muscles', 'Opponens Pollicis'], 'description' => 'Squeeze using thumb only. Emphasizes thumb and thenar muscle development.'],
            ['name' => 'Grip Trainer Pinch Grip', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Pinch Grip Muscles', 'Thenar Muscles', 'Hypothenar Muscles', 'Finger Flexors', 'Forearm Flexors'], 'description' => 'Hold grip trainer between fingertips and thumb. Squeeze with pinch grip. Builds key pinch strength.'],
            ['name' => 'Grip Trainer Isometric Hold', 'equipment' => 'Grip Trainer', 'category_slug' => 'core', 'target_muscles' => ['Forearm Flexors', 'Finger Flexors', 'Grip Muscles', 'Lumbricals', 'Thenar Muscles'], 'description' => 'Squeeze and hold at peak contraction for 5-30 seconds. Static grip endurance.'],
            ['name' => 'Grip Trainer Isometric Hold (Half Squeeze)', 'equipment' => 'Grip Trainer', 'category_slug' => 'core', 'target_muscles' => ['Forearm Flexors', 'Finger Flexors', 'Grip Muscles', 'Lumbricals', 'Interossei'], 'description' => 'Hold at 50% squeeze. Builds grip control and endurance at submaximal levels.'],
            ['name' => 'Grip Trainer Negative Reps (Eccentric)', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Finger Flexors', 'Grip Muscles', 'Lumbricals', 'Thenar Muscles'], 'description' => 'Squeeze with two hands, release slowly with one hand. Eccentric grip hypertrophy.'],
            ['name' => 'Grip Trainer Continuous Squeeze (Reps)', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Finger Flexors', 'Grip Muscles', 'Lumbricals', 'Brachioradialis'], 'description' => 'Perform continuous repetitions without rest. Builds muscular endurance and grip stamina.'],
            ['name' => 'Grip Trainer Slow Squeeze (Tempo)', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Finger Flexors', 'Grip Muscles', 'Lumbricals', 'Interossei'], 'description' => '3-5 second squeeze, hold, 3-5 second release. Time under tension grip training.'],
            ['name' => 'Grip Trainer Fast Squeeze (Explosive)', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Finger Flexors', 'Grip Muscles', 'Fast-Twitch Fibers', 'Lumbricals'], 'description' => 'Squeeze as fast as possible. Explosive grip power and neural drive development.'],
            ['name' => 'Grip Trainer Finger Curl Only', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Finger Flexors', 'Flexor Digitorum Profundus', 'Flexor Digitorum Superficialis', 'Lumbricals'], 'description' => 'Curl only fingers without wrist movement. Isolates deep finger flexors.'],
            ['name' => 'Grip Trainer Wrist Flexion Squeeze', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Flexor Carpi Radialis', 'Flexor Carpi Ulnaris', 'Grip Muscles'], 'description' => 'Squeeze while flexing wrist downward. Combines grip with wrist flexion.'],
            ['name' => 'Grip Trainer Wrist Extension Squeeze', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Extensors', 'Extensor Carpi Radialis', 'Extensor Digitorum', 'Grip Muscles'], 'description' => 'Squeeze while extending wrist upward. Combines grip with wrist extension.'],
            ['name' => 'Grip Trainer Radial Deviation Squeeze', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Muscles', 'Extensor Carpi Radialis', 'Flexor Carpi Radialis', 'Grip Muscles'], 'description' => 'Squeeze while deviating wrist toward thumb side. Targets radial side forearm muscles.'],
            ['name' => 'Grip Trainer Ulnar Deviation Squeeze', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Muscles', 'Flexor Carpi Ulnaris', 'Extensor Carpi Ulnaris', 'Grip Muscles'], 'description' => 'Squeeze while deviating wrist toward pinky side. Targets ulnar side forearm muscles.'],
            ['name' => 'Grip Trainer Pronation Squeeze', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Pronator Teres', 'Pronator Quadratus', 'Forearm Flexors', 'Grip Muscles'], 'description' => 'Squeeze while rotating forearm into pronation. Combines grip with pronation strength.'],
            ['name' => 'Grip Trainer Supination Squeeze', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Supinator', 'Biceps Brachii', 'Forearm Extensors', 'Grip Muscles'], 'description' => 'Squeeze while rotating forearm into supination. Combines grip with supination strength.'],
            ['name' => 'Grip Trainer Arm Extension (Triceps Squeeze)', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Triceps', 'Shoulders', 'Core'], 'description' => 'Squeeze while extending arms fully. Adds shoulder and triceps engagement.'],
            ['name' => 'Grip Trainer Behind Back Squeeze', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Rear Deltoids', 'Rhomboids', 'Traps'], 'description' => 'Squeeze grip trainer behind back. Unusual angle challenges grip differently.'],
            ['name' => 'Grip Trainer Overhead Squeeze', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Shoulders', 'Triceps', 'Core', 'Traps'], 'description' => 'Squeeze with arms overhead. Adds shoulder stability demand to grip work.'],
            ['name' => 'Grip Trainer Single-Finger Squeeze (Index)', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Flexor Digitorum Profundus', 'Lumbricals', 'Interossei', 'Forearm Flexors', 'Index Finger'], 'description' => 'Squeeze using only index finger. Corrects finger-specific strength imbalances.'],
            ['name' => 'Grip Trainer Single-Finger Squeeze (Middle)', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Flexor Digitorum Profundus', 'Lumbricals', 'Interossei', 'Forearm Flexors', 'Middle Finger'], 'description' => 'Squeeze using only middle finger. Isolates middle finger flexors.'],
            ['name' => 'Grip Trainer Single-Finger Squeeze (Ring)', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Flexor Digitorum Profundus', 'Lumbricals', 'Interossei', 'Forearm Flexors', 'Ring Finger'], 'description' => 'Squeeze using only ring finger. Often weakest finger, great for balancing grip.'],
            ['name' => 'Grip Trainer Single-Finger Squeeze (Pinky)', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Flexor Digitorum Profundus', 'Lumbricals', 'Interossei', 'Forearm Flexors', 'Pinky'], 'description' => 'Squeeze using only pinky finger. Critical for overall grip strength.'],
            ['name' => 'Grip Trainer Pause Squeeze (Reps with Hold)', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Finger Flexors', 'Grip Muscles', 'Lumbricals', 'Thenar Muscles'], 'description' => 'Squeeze, hold 2-3 seconds, release. Each rep includes isometric hold.'],
            ['name' => 'Grip Trainer Drop Set Squeeze', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Finger Flexors', 'Grip Muscles', 'Lumbricals', 'Interossei'], 'description' => 'Start heavy, squeeze to failure, drop to lighter grip trainer, continue. Grip dropset.'],
            ['name' => 'Grip Trainer 21s (Partial Reps)', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Finger Flexors', 'Grip Muscles', 'Lumbricals', 'Brachioradialis'], 'description' => '7 bottom half, 7 top half, 7 full squeeze. Total grip development.'],
            ['name' => 'Grip Trainer Pulse Squeeze (Small Reps)', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Finger Flexors', 'Grip Muscles', 'Fast-Twitch Fibers', 'Lumbricals'], 'description' => 'Small rapid pulses at peak contraction. Builds endurance and pump.'],
            ['name' => 'Grip Trainer Finger Walk', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Finger Flexors', 'Grip Muscles', 'Interossei', 'Lumbricals'], 'description' => 'Walk fingers up and down grip trainer individually. Finger independence and control.'],
            ['name' => 'Grip Trainer Plate Pinch Hybrid', 'equipment' => 'Grip Trainer, Weight Plate', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Pinch Grip', 'Thenar Muscles', 'Finger Flexors', 'Grip Muscles'], 'description' => 'Squeeze grip trainer while pinch holding weight plate. Combines crushing and pinch grip.'],
            ['name' => 'Grip Trainer Farmer\'s Walk Hybrid', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Core', 'Quadriceps', 'Glutes', 'Calves', 'Stabilizers'], 'description' => 'Squeeze grip trainer while walking. Adds grip work to loaded carry.'],
            ['name' => 'Grip Trainer Squat Squeeze', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Quadriceps', 'Glutes', 'Core', 'Calves'], 'description' => 'Squeeze grip trainer while performing squats. Combines leg and forearm work.'],
            ['name' => 'Grip Trainer Lunge Squeeze', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Quadriceps', 'Glutes', 'Core', 'Stabilizers'], 'description' => 'Squeeze grip trainer while lunging. Unilateral leg and grip combination.'],
            ['name' => 'Grip Trainer Deadlift Hold Squeeze', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Glutes', 'Hamstrings', 'Core', 'Erector Spinae'], 'description' => 'Squeeze grip trainer in deadlift bottom position. Full-body grip strengthening.'],
            ['name' => 'Grip Trainer Band Assisted Squeeze', 'equipment' => 'Grip Trainer, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Finger Flexors', 'Grip Muscles', 'Lumbricals', 'Thenar Muscles'], 'description' => 'Wrap band around grip trainer for variable resistance. Progressive overload.'],
            ['name' => 'Grip Trainer Twisting Squeeze', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Rotators', 'Pronator Teres', 'Supinator', 'Grip Muscles', 'Brachioradialis'], 'description' => 'Squeeze while twisting grip trainer. Combines grip with rotational strength.'],
            ['name' => 'Grip Trainer Crossover Squeeze', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Pecs', 'Shoulders', 'Core', 'Stabilizers'], 'description' => 'Squeeze grip trainer while crossing arms in front. Adds chest and shoulder engagement.'],
            ['name' => 'Grip Trainer Endurance Set (AMRAP)', 'equipment' => 'Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Finger Flexors', 'Grip Muscles', 'Lumbricals', 'Interossei'], 'description' => 'As many reps as possible in 60 seconds. Grip muscular endurance test.'],
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
