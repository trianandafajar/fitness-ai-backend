<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExerciseDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('exercises')->truncate();
        Storage::disk('public')->deleteDirectory('exercises');
        Storage::disk('public')->makeDirectory('exercises');

        $this->call([
            ExerciseCategorySeeder::class,
            AgilityConesSeeder::class,
            AgilityHurdlesSeeder::class,
            EllipticalTrainerSeeder::class,
            SpeedLadderSeeder::class,
            SpinBikeSeeder::class,
            StationaryBikeSeeder::class,
            TreadmillExerciseSeeder::class,
            SpeedLadderSeeder::class,
            MiniBandSeeder::class,
            ResistanceBandTubeSeeder::class
        ]);
    }
}
