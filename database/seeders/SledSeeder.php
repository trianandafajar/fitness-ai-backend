<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class SledSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Sled Forward Push (High Handle)', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Shoulders'], 'description' => 'Push sled forward using high handles with body at 45° angle. Drive through legs and maintain core tightness.'],
            ['name' => 'Sled Forward Push (Low Handle)', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Chest'], 'description' => 'Push sled forward using low handles with body almost horizontal. Engages chest and shoulders more intensely.'],
            ['name' => 'Sled Backward Pull (Walking)', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'], 'description' => 'Face sled and walk backward while pulling ropes or handles. Great for knee health and quad development.'],
            ['name' => 'Sled Backward Drag (Rope Pull)', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Lats', 'Biceps', 'Forearms'], 'description' => 'Stand facing sled with rope attached. Walk backward while pulling rope hand over hand. Full posterior chain.'],
            ['name' => 'Sled Forward Drag (Rope Pull)', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Forearms', 'Core', 'Glutes', 'Hamstrings'], 'description' => 'Sit or kneel facing sled. Pull rope hand over hand to drag sled toward you. Upper back and arm dominant.'],
            ['name' => 'Sled Lateral Shuffle (Side Push)', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Adductors', 'Quadriceps', 'Core', 'Calves'], 'description' => 'Stand sideways to sled. Push laterally with hip and legs while shuffling. Great for hip stabilizers and agility.'],
            ['name' => 'Sled Sprint Push', 'equipment' => 'Sled', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Shoulders', 'Hip Flexors'], 'description' => 'Push sled at max speed with light to moderate weight. Explosive sprinting movement for power and conditioning.'],
            ['name' => 'Sled Hill Sprint Push', 'equipment' => 'Sled', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Hip Flexors', 'Hamstrings'], 'description' => 'Push sled uphill at sprint pace. Extreme leg power and cardiovascular conditioning challenge.'],
            ['name' => 'Sled Jog Push', 'equipment' => 'Sled', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Shoulders'], 'description' => 'Push sled forward at steady jogging pace. Builds muscular endurance and aerobic capacity.'],
            ['name' => 'Sled Walk (Heavy Load)', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Traps', 'Forearms'], 'description' => 'Walk forward pushing or pulling heavily loaded sled. Builds total body strength and work capacity.'],
            ['name' => 'Sled Farmer\'s Walk (Pull)', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Traps', 'Core', 'Glutes', 'Hamstrings', 'Quadriceps'], 'description' => 'Attach ropes to sled and walk forward while pulling. Carry tension in arms and back. Grip and core intensive.'],
            ['name' => 'Sled Single-Arm Pull', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Obliques', 'Forearms'], 'description' => 'Pull sled with one arm while walking backward or forward. Corrects imbalances and targets obliques.'],
            ['name' => 'Sled Single-Arm Push', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Shoulders', 'Core', 'Obliques', 'Quadriceps'], 'description' => 'Push sled with one arm only. Engages core rotationally and corrects unilateral strength differences.'],
            ['name' => 'Sled Squat Push', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Calves', 'Hip Flexors'], 'description' => 'Push sled from deep squat position. Maintains constant tension on quads and glutes through full range.'],
            ['name' => 'Sled Lunge Push', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Push sled while performing walking lunges. Unilateral leg strength and hip stability challenged.'],
            ['name' => 'Sled Lateral Lunge Push', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Quadriceps', 'Glutes', 'Core', 'Hip Stabilizers'], 'description' => 'Push sled while stepping into lateral lunges. Targets inner thighs and lateral hip muscles.'],
            ['name' => 'Sled Backward Walk (Heavy)', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Hamstrings', 'Core'], 'description' => 'Walk backward while pulling sled facing away. Superior for quad and knee health development.'],
            ['name' => 'Sled Rope Pull (Seated)', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Forearms', 'Core', 'Rhomboids', 'Traps'], 'description' => 'Sit on floor facing sled. Pull rope hand-over-hand to drag sled toward you. Upper back and arm focus.'],
            ['name' => 'Sled Rope Pull (Standing Lean)', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Core', 'Glutes', 'Hamstrings', 'Forearms'], 'description' => 'Stand leaning back holding ropes. Pull sled toward you using upper body while bracing core.'],
            ['name' => 'Sled Overhead Push', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Core', 'Quadriceps', 'Glutes'], 'description' => 'Push sled with arms extended overhead. Unusual angle demands shoulder stability and leg drive.'],
            ['name' => 'Sled Low Crawl Push', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Shoulders', 'Chest', 'Triceps', 'Hip Flexors', 'Quadriceps'], 'description' => 'Push sled while in bear crawl or low squat position. Full body stability and coordination workout.'],
            ['name' => 'Sled Prowler Burpee', 'equipment' => 'Sled', 'category_slug' => 'cardio', 'target_muscles' => ['Chest', 'Triceps', 'Core', 'Quadriceps', 'Glutes', 'Shoulders'], 'description' => 'Push sled length, drop into burpee, then push sled back. Metabolic conditioning and total body work.'],
            ['name' => 'Sled Sled Pull (Face Away)', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Lats', 'Biceps', 'Forearms'], 'description' => 'Face away from sled with ropes over shoulders. Walk forward pulling sled behind. Resistance walking.'],
            ['name' => 'Sled Sled Push (Resisted Start)', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Hip Flexors', 'Shoulders'], 'description' => 'Start from dead stop with heavy sled. Explode forward from static position. Builds starting power.'],
            ['name' => 'Sled Interval Push (Tabata)', 'equipment' => 'Sled', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Shoulders', 'Hip Flexors'], 'description' => 'Push sled at max effort for 20s, rest 10s. Repeat 8 rounds. High-intensity conditioning workout.'],
            ['name' => 'Sled Partner Push (Resisted)', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Shoulders', 'Hamstrings'], 'description' => 'One partner pushes sled while other provides additional resistance or rides on sled. Partner conditioning.'],
            ['name' => 'Sled Side-to-Side Shuffle Push', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Adductors', 'Quadriceps', 'Core', 'Calves'], 'description' => 'Push sled while shuffling laterally. Change direction frequently. Agility and hip stability work.'],
            ['name' => 'Sled Reverse Lunge with Pull', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Biceps', 'Lats'], 'description' => 'Hold ropes and perform reverse lunges while pulling sled. Combines lower body with upper back work.'],
            ['name' => 'Sled One-Leg Push', 'equipment' => 'Sled', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Stabilizers', 'Hip Flexors'], 'description' => 'Push sled using only one leg. Other leg is elevated or drags behind. Extreme unilateral leg strength.'],
            ['name' => 'Sled Car Push (Prowler Run)', 'equipment' => 'Sled', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Shoulders', 'Chest'], 'description' => 'Push sled continuously for distance or time. Simulates car pushing. Great for endurance and mental toughness.'],
            ['name' => 'Sled Plate Push (Weighted)', 'equipment' => 'Sled, Weight Plates', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Calves', 'Shoulders', 'Triceps'], 'description' => 'Load sled with weight plates. Push for prescribed distance. Progressive overload for strength gains.'],
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
