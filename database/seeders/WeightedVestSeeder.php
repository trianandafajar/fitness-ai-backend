<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class WeightedVestSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Weighted Vest Push-Up', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => 'Wear weighted vest. Perform standard push-ups. Added load increases chest and triceps demand.'],
            ['name' => 'Weighted Vest Pull-Up', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Rhomboids', 'Rear Deltoids', 'Core', 'Forearms'], 'description' => 'Wear weighted vest. Perform pull-ups. Increased resistance for back and biceps development.'],
            ['name' => 'Weighted Vest Chin-Up', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Rhomboids', 'Core', 'Forearms', 'Brachialis'], 'description' => 'Wear weighted vest. Perform chin-ups (supinated grip). Bicep-dominant pull-up variation with added load.'],
            ['name' => 'Weighted Vest Dip', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => 'Wear weighted vest. Perform parallel bar dips. Added load increases chest and triceps intensity.'],
            ['name' => 'Weighted Vest Squat', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Wear weighted vest. Perform bodyweight squats. Added resistance for lower body strength.'],
            ['name' => 'Weighted Vest Jump Squat', 'equipment' => 'Weighted Vest', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Hip Flexors'], 'description' => 'Wear weighted vest. Perform explosive jump squats. Increased power and plyometric intensity.'],
            ['name' => 'Weighted Vest Lunge (Walking)', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Wear weighted vest. Perform walking lunges. Unilateral leg strength with added load.'],
            ['name' => 'Weighted Vest Reverse Lunge', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Wear weighted vest. Perform reverse lunges. Knee-friendly unilateral work with added resistance.'],
            ['name' => 'Weighted Vest Lateral Lunge', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Stabilizers'], 'description' => 'Wear weighted vest. Perform lateral lunges. Targets inner thighs and hip stabilizers with added load.'],
            ['name' => 'Weighted Vest Bulgarian Split Squat', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Stabilizers', 'Calves'], 'description' => 'Wear weighted vest. Rear foot elevated, single-leg squat. Advanced unilateral leg strength.'],
            ['name' => 'Weighted Vest Pistol Squat', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Calves', 'Stabilizers'], 'description' => 'Wear weighted vest. Perform single-leg pistol squat. Extreme unilateral leg strength with added load.'],
            ['name' => 'Weighted Vest Step-Up', 'equipment' => 'Weighted Vest, Box/Platform', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Wear weighted vest. Step up onto platform. Unilateral leg strength with added resistance.'],
            ['name' => 'Weighted Vest Lateral Step-Up', 'equipment' => 'Weighted Vest, Box/Platform', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Adductors', 'Quadriceps', 'Core', 'Stabilizers'], 'description' => 'Wear weighted vest. Step up sideways. Targets hip abductors and adductors with added load.'],
            ['name' => 'Weighted Vest Hip Thrust', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Flexors', 'Lower Back'], 'description' => 'Wear weighted vest. Bridge hips up, squeeze glutes. Glute-dominant hip extension with added load.'],
            ['name' => 'Weighted Vest Single-Leg Glute Bridge', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Extensors', 'Stabilizers'], 'description' => 'Wear weighted vest. Single-leg glute bridge. Unilateral glute and hamstring strength with added load.'],
            ['name' => 'Weighted Vest Deadlift (Bodyweight)', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Forearms'], 'description' => 'Wear weighted vest. Hinge at hips, lower torso, return. Bodyweight deadlift with added resistance.'],
            ['name' => 'Weighted Vest Single-Leg Deadlift', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Forearms', 'Traps', 'Stabilizers'], 'description' => 'Wear weighted vest. Balance on one leg, hinge forward. Unilateral posterior chain with added load.'],
            ['name' => 'Weighted Vest Good Morning', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core', 'Traps', 'Forearms'], 'description' => 'Wear weighted vest. Hinge forward at hips. Posterior chain emphasis with added load.'],
            ['name' => 'Weighted Vest Calf Raise', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Wear weighted vest. Rise up on toes, lower with control. Calf development with added load.'],
            ['name' => 'Weighted Vest Single-Leg Calf Raise', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Wear weighted vest. One-legged calf raise. Unilateral calf development with added resistance.'],
            ['name' => 'Weighted Vest Plank', 'equipment' => 'Weighted Vest', 'category_slug' => 'core', 'target_muscles' => ['Core', 'Shoulders', 'Chest', 'Triceps', 'Glutes', 'Stabilizers'], 'description' => 'Wear weighted vest. Hold plank position. Increased core and upper body stabilization demand.'],
            ['name' => 'Weighted Vest Side Plank', 'equipment' => 'Weighted Vest', 'category_slug' => 'core', 'target_muscles' => ['Obliques', 'Core', 'Shoulders', 'Glutes', 'Hip Abductors', 'Stabilizers'], 'description' => 'Wear weighted vest. Hold side plank position. Increased oblique and stabilizer demand.'],
            ['name' => 'Weighted Vest Mountain Climber', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Hip Flexors', 'Shoulders', 'Quadriceps', 'Stabilizers'], 'description' => 'Wear weighted vest. Plank position, alternate driving knees. Added resistance to dynamic core work.'],
            ['name' => 'Weighted Vest Knee Tuck', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Core (Lower Abs)', 'Hip Flexors', 'Shoulders', 'Quadriceps', 'Stabilizers'], 'description' => 'Wear weighted vest. Plank with feet on sliders or floor. Tuck both knees to chest. Added lower ab resistance.'],
            ['name' => 'Weighted Vest V-Up', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Core', 'Shoulders', 'Quadriceps'], 'description' => 'Wear weighted vest. Simultaneously raise legs and torso to V. Full core with added load.'],
            ['name' => 'Weighted Vest Leg Raise', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Iliopsoas', 'Quadriceps'], 'description' => 'Wear weighted vest. Raise straight legs to 90°, lower with control. Lower ab and hip flexor strength.'],
            ['name' => 'Weighted Vest Russian Twist', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Shoulders', 'Quadriceps'], 'description' => 'Wear weighted vest. Sit with knees bent, rotate torso side to side. Rotational core with added load.'],
            ['name' => 'Weighted Vest Bicycle Crunch', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Hip Flexors', 'Core', 'Quadriceps'], 'description' => 'Wear weighted vest. Bicycle crunch motion. Oblique and core with added resistance.'],
            ['name' => 'Weighted Vest Bear Crawl', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Shoulders', 'Quadriceps', 'Glutes', 'Calves', 'Stabilizers'], 'description' => 'Wear weighted vest. Bear crawl forward/backward. Full-body stability with added load.'],
            ['name' => 'Weighted Vest Farmer\'s Walk', 'equipment' => 'Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Quadriceps', 'Glutes', 'Calves', 'Traps', 'Stabilizers'], 'description' => 'Wear weighted vest. Walk forward with upright posture. Total body loaded carry.'],
            ['name' => 'Weighted Vest Walking (Rucking)', 'equipment' => 'Weighted Vest', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Hip Flexors', 'Stabilizers'], 'description' => 'Wear weighted vest. Walk at brisk pace. Cardiovascular conditioning with added resistance.'],
            ['name' => 'Weighted Vest Incline Walking', 'equipment' => 'Weighted Vest', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Hamstrings', 'Stabilizers'], 'description' => 'Wear weighted vest. Walk uphill or on incline. Increased cardiovascular and leg demand.'],
            ['name' => 'Weighted Vest Stair Climbing', 'equipment' => 'Weighted Vest', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Hip Flexors', 'Stabilizers'], 'description' => 'Wear weighted vest. Climb stairs. High-intensity leg conditioning with added load.'],
            ['name' => 'Weighted Vest Running (Jogging)', 'equipment' => 'Weighted Vest', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Hip Flexors', 'Stabilizers'], 'description' => 'Wear weighted vest. Jog or run. Increases cardiovascular intensity and leg strength.'],
            ['name' => 'Weighted Vest Sprint Intervals', 'equipment' => 'Weighted Vest', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Hip Flexors'], 'description' => 'Wear weighted vest. Sprint intervals. Explosive power and conditioning with added resistance.'],
            ['name' => 'Weighted Vest Burpee', 'equipment' => 'Weighted Vest', 'category_slug' => 'cardio', 'target_muscles' => ['Chest', 'Triceps', 'Core', 'Quadriceps', 'Glutes', 'Shoulders'], 'description' => 'Wear weighted vest. Perform burpees. Full-body metabolic conditioning with added load.'],
            ['name' => 'Weighted Vest Box Jump', 'equipment' => 'Weighted Vest, Box/Platform', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Hip Flexors'], 'description' => 'Wear weighted vest. Jump onto box. Explosive plyometric power with added resistance.'],
            ['name' => 'Weighted Vest Broad Jump', 'equipment' => 'Weighted Vest', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core', 'Hip Flexors'], 'description' => 'Wear weighted vest. Jump forward for distance. Explosive horizontal power with added load.'],
            ['name' => 'Weighted Vest Depth Jump', 'equipment' => 'Weighted Vest, Box/Platform', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Wear weighted vest. Step off box, jump up on landing. Reactive strength with added resistance.'],
            ['name' => 'Weighted Vest Shadow Boxing', 'equipment' => 'Weighted Vest', 'category_slug' => 'cardio', 'target_muscles' => ['Core', 'Shoulders', 'Lats', 'Hip Rotators', 'Quadriceps'], 'description' => 'Wear weighted vest. Perform shadow boxing. Cardio and endurance with added upper body load.'],
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
