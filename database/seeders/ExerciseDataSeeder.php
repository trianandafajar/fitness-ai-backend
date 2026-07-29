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
            ResistanceBandTubeSeeder::class,
            ChainsSeeder::class,
            RowingMachineSeeder::class,
            StairClimberSeeder::class,
            StepmillSeeder::class,
            ArcTrainerSeeder::class,
            AirBikeSeeder::class,
            SkiErgSeeder::class,
            VerticalClimberSeeder::class,
            JacobLadderSeeder::class,
            TreadclimberSeeder::class,
            BenchPressFlatSeeder::class,
            BenchPressInclineSeeder::class,
            BenchPressDeclineSeeder::class,
            SmithMachineSeeder::class,
            SquatRackSeeder::class,
            PowerRackSeeder::class,
            MonoliftSeeder::class,
            LegPressMachineSeeder::class,
            HackSquatMachineSeeder::class,
            LegExtensionMachineSeeder::class,
            LegCurlMachineSeeder::class,
            CalfRaiseMachineSeeder::class,
            GluteKickbackMachineSeeder::class,
            HipAbductorMachineSeeder::class,
            ChestPressMachineSeeder::class,
            ShoulderPressMachineSeeder::class,
            BackExtensionMachineSeeder::class,
            LateralRaiseMachineSeeder::class,
            PecDeckMachineSeeder::class,
            RearDeltMachineSeeder::class,
            AbdominalCrunchMachineSeeder::class,
            RotaryTorsoMachineSeeder::class,
            DipStationSeeder::class,
            TricepsExtensionMachineSeeder::class,
            ArmCurlMachineSeeder::class,
            PreacherCurlBenchSeeder::class,
            AssistedPullupDipMachineSeeder::class,
            FunctionalTrainerSeeder::class,
            CableCrossoverMachineSeeder::class,
            SeatedRowMachineSeeder::class,
            LatPulldownMachineSeeder::class,
            GluteHamDeveloperSeeder::class,
            NordicHamstringBenchSeeder::class,
            SissySquatMachineSeeder::class,
            HipThrustMachineSeeder::class,
            PendulumSquatMachineSeeder::class,
            BeltSquatMachineSeeder::class,
            DumbbellSeeder::class,
            BarbellSeeder::class,
            EZCurlBarSeeder::class,
            TrapBarSeeder::class,
            SwissBarSeeder::class,
            CamberedBarSeeder::class,
            SafetySquatBarSeeder::class,
            LogBarSeeder::class,
            AxleBarSeeder::class,
            WeightPlatesSeeder::class,
            KettlebellSeeder::class,
        ]);
    }
}
