<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class FarmersWalkHandlesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Farmer\'s Walk (Standard)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Traps', 'Core', 'Quadriceps', 'Glutes', 'Calves', 'Lats'], 'description' => 'Pick up handles with straight arms. Walk forward with upright posture. Grip and core heavily taxed.'],
            ['name' => 'Farmer\'s Walk (Heavy Load)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Traps', 'Core', 'Quadriceps', 'Glutes', 'Calves', 'Erector Spinae'], 'description' => 'Load handles to near-maximum. Walk short distance with controlled pace. Maximal grip and full-body tension.'],
            ['name' => 'Farmer\'s Walk (Long Distance)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Traps', 'Core', 'Quadriceps', 'Glutes', 'Calves', 'Stabilizers'], 'description' => 'Use moderate weight. Walk long distance (50-100m). Builds muscular endurance and grip stamina.'],
            ['name' => 'Farmer\'s Walk (Single-Arm)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Forearms', 'Traps', 'Quadriceps', 'Glutes', 'Calves'], 'description' => 'Carry one handle only. Walk forward while resisting lateral tilt. Intense oblique and anti-lateral flexion work.'],
            ['name' => 'Farmer\'s Walk (Alternating Arms)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Core', 'Obliques', 'Traps', 'Quadriceps', 'Glutes', 'Stabilizers'], 'description' => 'Switch handle between hands at intervals. Corrects imbalances and challenges core dynamically.'],
            ['name' => 'Farmer\'s Walk (Rack Carry)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Traps', 'Core', 'Quadriceps', 'Glutes', 'Calves', 'Deltoids', 'Forearms'], 'description' => 'Hold handles at shoulder level (front rack). Walk forward. Emphasizes upper back and shoulder stability.'],
            ['name' => 'Farmer\'s Walk (Overhead Carry)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Traps', 'Quadriceps', 'Glutes', 'Stabilizers'], 'description' => 'Press handles overhead with arms locked. Walk forward. Extreme shoulder stability and core engagement.'],
            ['name' => 'Farmer\'s Walk (Zercher Carry)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Quadriceps', 'Glutes', 'Traps', 'Lats'], 'description' => 'Hold handles in crook of elbows (Zercher position). Walk forward. Biceps and core intensively engaged.'],
            ['name' => 'Farmer\'s Walk (Waiter\'s Walk)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Obliques', 'Forearms', 'Quadriceps', 'Glutes'], 'description' => 'Hold one handle overhead and one at side simultaneously. Walk forward. Anti-lateral flexion and shoulder stability.'],
            ['name' => 'Farmer\'s Walk (Suitcase Carry)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Forearms', 'Traps', 'Quadriceps', 'Glutes', 'Stabilizers'], 'description' => 'Carry one handle at side. Walk forward. Named for suitcase-like carry. Excellent for core anti-lateral flexion.'],
            ['name' => 'Farmer\'s Walk (Goblet Carry)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Forearms', 'Traps', 'Quadriceps', 'Glutes', 'Biceps', 'Chest'], 'description' => 'Hold one handle vertically in front of chest (goblet position). Walk forward. Core and upper body engaged.'],
            ['name' => 'Farmer\'s Walk (Dumbbell Style on Handles)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Traps', 'Core', 'Quadriceps', 'Glutes', 'Calves', 'Lats'], 'description' => 'Hold handles like dumbbells at sides. Walk with controlled steps. Standard farmer\'s carry mechanics.'],
            ['name' => 'Farmer\'s Walk with Pause (Static Hold)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Traps', 'Core', 'Quadriceps', 'Glutes', 'Lats', 'Stabilizers'], 'description' => 'Walk then stop and hold handles for 5-10 seconds. Resumes walking. Increases time under tension.'],
            ['name' => 'Farmer\'s Walk (Backward Walking)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Forearms', 'Traps', 'Hamstrings'], 'description' => 'Walk backward while carrying handles. Great for knee health and quadriceps development.'],
            ['name' => 'Farmer\'s Walk (Lateral Shuffle)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Adductors', 'Core', 'Forearms', 'Traps', 'Quadriceps', 'Calves'], 'description' => 'Carry handles and shuffle sideways. Targets hip stabilizers and agility while loaded.'],
            ['name' => 'Farmer\'s Walk (Cross-Over Carry)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Biceps', 'Core', 'Traps', 'Quadriceps', 'Glutes', 'Stabilizers'], 'description' => 'Cross arms while holding handles in front. Walks forward. Unusual grip position challenges forearms differently.'],
            ['name' => 'Farmer\'s Walk (Bear Hug Carry)', 'equipment' => 'Farmer\'s Walk Handles (with load)', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Core', 'Traps', 'Quadriceps', 'Glutes', 'Lats', 'Forearms'], 'description' => 'Hug load against chest while holding handles. Walk forward. Engages chest and core intensely.'],
            ['name' => 'Farmer\'s Walk (Shrug Walk)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Traps (Upper)', 'Levator Scapulae', 'Forearms', 'Core', 'Quadriceps', 'Glutes'], 'description' => 'Walk while continuously shrugging shoulders up and down. Adds trap hypertrophy to the carry.'],
            ['name' => 'Farmer\'s Walk (Farmers Squat)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Forearms', 'Traps', 'Hamstrings', 'Calves'], 'description' => 'Hold handles at sides. Perform squats while maintaining grip. Combines squat and grip strength.'],
            ['name' => 'Farmer\'s Walk (Lunge Walk)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Forearms', 'Traps', 'Stabilizers'], 'description' => 'Hold handles and perform walking lunges. Unilateral leg work combined with loaded carry.'],
            ['name' => 'Farmer\'s Walk (Side Lunge)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Quadriceps', 'Glutes', 'Core', 'Forearms', 'Traps', 'Stabilizers'], 'description' => 'Carry handles and step into lateral lunges. Targets inner thighs and hip abductors under load.'],
            ['name' => 'Farmer\'s Walk (High Knee March)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Hip Flexors', 'Quadriceps', 'Core', 'Forearms', 'Traps', 'Glutes', 'Calves'], 'description' => 'March in place with high knees while holding handles. Dynamic stability and hip flexor engagement.'],
            ['name' => 'Farmer\'s Walk (Dead Stop Pickup)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Traps', 'Core', 'Erector Spinae', 'Quadriceps', 'Glutes', 'Hamstrings'], 'description' => 'Start handles on floor. Pick up from dead stop. Walk. Repeat. Builds explosive picking strength.'],
            ['name' => 'Farmer\'s Walk (Frame Carry Variation)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Traps', 'Core', 'Quadriceps', 'Glutes', 'Calves', 'Lats', 'Rhomboids'], 'description' => 'Wider grip stance on handles. Walks forward. Emphasizes lats and upper back more intensely.'],
            ['name' => 'Farmer\'s Walk (Narrow Grip Carry)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Biceps', 'Core', 'Traps', 'Quadriceps', 'Glutes', 'Chest'], 'description' => 'Hold handles close together in front. Walk forward. Challenges forearms and biceps differently.'],
            ['name' => 'Farmer\'s Walk (Towel Grip Carry)', 'equipment' => 'Farmer\'s Walk Handles, Towel', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Traps', 'Core', 'Quadriceps', 'Glutes', 'Calves'], 'description' => 'Wrap towel around handles for thicker grip. Walk forward. Dramatically increases forearm and grip difficulty.'],
            ['name' => 'Farmer\'s Walk (Bent-Over Row Carry)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Hamstrings', 'Forearms', 'Traps'], 'description' => 'Bend over holding handles. Row to chest while walking. Combination carry and rowing movement.'],
            ['name' => 'Farmer\'s Walk (Uphill Carry)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Forearms', 'Traps', 'Hamstrings'], 'description' => 'Walk uphill while carrying handles. Increases leg and cardio demand significantly.'],
            ['name' => 'Farmer\'s Walk (Downhill Carry)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Calves', 'Core', 'Forearms', 'Traps', 'Glutes', 'Hamstrings'], 'description' => 'Walk downhill with handles. Eccentric leg loading and increased stability requirement.'],
            ['name' => 'Farmer\'s Walk (Variable Pace)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Traps', 'Core', 'Quadriceps', 'Glutes', 'Calves', 'Stabilizers'], 'description' => 'Alternate between slow and fast walking speeds. Challenges different muscle fibers and energy systems.'],
            ['name' => 'Farmer\'s Walk (Figure 8 Pattern)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Obliques', 'Forearms', 'Traps', 'Quadriceps', 'Glutes', 'Stabilizers'], 'description' => 'Walk in figure-8 pattern while carrying handles. Adds rotational demand to core and hip stabilizers.'],
            ['name' => 'Farmer\'s Walk (Overload Dropset)', 'equipment' => 'Farmer\'s Walk Handles', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Traps', 'Core', 'Quadriceps', 'Glutes', 'Calves', 'Lats'], 'description' => 'Start heavy, walk 10m, drop to medium weight, walk 10m, drop to light. Progressive overload dropset.'],
        ];

        foreach ($execises as $data) {
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
