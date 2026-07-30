<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class InnerOuterThighComboSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Inner Thigh Adduction Standard', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Adductors (Adductor Longus, Adductor Magnus, Gracilis, Pectineus)', 'Core', 'Hip Flexors'], 'description' => 'Sit on machine, pads on inner thighs. Squeeze legs together. Hold peak contraction. Lower with control.'],
            ['name' => 'Outer Thigh Abduction Standard', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'Tensor Fasciae Latae', 'Core', 'Hip Abductors'], 'description' => 'Sit on machine, pads on outer thighs. Push legs apart. Squeeze glute medius at peak. Lower with control.'],
            ['name' => 'Inner Thigh Isometric Hold (Peak Contraction)', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'core', 'target_muscles' => ['Adductors', 'Core', 'Hip Flexors', 'Pelvic Floor'], 'description' => 'Squeeze legs together and hold at peak. Static adductor contraction.'],
            ['name' => 'Outer Thigh Isometric Hold (Peak Contraction)', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'core', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Push legs apart and hold at peak. Static abductor contraction.'],
            ['name' => 'Inner Thigh Pause Reps (Peak)', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Core', 'Hip Flexors', 'Pelvic Floor'], 'description' => 'Adduct, hold 2-3 seconds at peak. Increases time under tension.'],
            ['name' => 'Outer Thigh Pause Reps (Peak)', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Abduct, hold 2-3 seconds at peak. Increases time under tension.'],
            ['name' => 'Inner Thigh Slow Tempo (3-1-3)', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Core', 'Hip Flexors', 'Pelvic Floor'], 'description' => '3 sec adduct, 1 sec hold, 3 sec release. Time under tension.'],
            ['name' => 'Outer Thigh Slow Tempo (3-1-3)', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => '3 sec abduct, 1 sec hold, 3 sec release. Time under tension.'],
            ['name' => 'Inner Thigh Eccentric Focus (Slow Negative)', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Core', 'Hip Flexors', 'Pelvic Floor'], 'description' => 'Adduct quickly, release extremely slow (4-5 sec). Eccentric overload.'],
            ['name' => 'Outer Thigh Eccentric Focus (Slow Negative)', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Abduct quickly, release extremely slow (4-5 sec). Eccentric overload.'],
            ['name' => 'Inner Thigh Explosive Concentric', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Fast-Twitch Fibers', 'Core', 'Hip Flexors'], 'description' => 'Explosive adduction, slow controlled release. Power development.'],
            ['name' => 'Outer Thigh Explosive Concentric', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'Fast-Twitch Fibers', 'Core'], 'description' => 'Explosive abduction, slow controlled release. Power development.'],
            ['name' => 'Inner Thigh Drop Set', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Core', 'Hip Flexors'], 'description' => 'Start heavy, adduct to failure, reduce weight, continue. Adductor hypertrophy dropset.'],
            ['name' => 'Outer Thigh Drop Set', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core'], 'description' => 'Start heavy, abduct to failure, reduce weight, continue. Abductor hypertrophy dropset.'],
            ['name' => 'Inner Thigh Rest-Pause Set', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Core', 'Hip Flexors'], 'description' => 'Adduct to failure, rest 10 sec, continue. Density training.'],
            ['name' => 'Outer Thigh Rest-Pause Set', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core'], 'description' => 'Abduct to failure, rest 10 sec, continue. Density training.'],
            ['name' => 'Inner Thigh Partial Reps (Top Half)', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Adductors (Peak)', 'Core', 'Hip Flexors'], 'description' => 'Partial adductions in top half. Emphasizes peak contraction.'],
            ['name' => 'Outer Thigh Partial Reps (Top Half)', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus (Peak)', 'Core'], 'description' => 'Partial abductions in top half. Emphasizes peak contraction.'],
            ['name' => 'Inner Thigh Partial Reps (Bottom Half)', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Adductors (Stretched)', 'Core', 'Hip Flexors'], 'description' => 'Partial adductions in bottom half. Emphasizes stretch.'],
            ['name' => 'Outer Thigh Partial Reps (Bottom Half)', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus (Stretched)', 'Core'], 'description' => 'Partial abductions in bottom half. Emphasizes stretch.'],
            ['name' => 'Inner Thigh 1.5 Reps', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Core', 'Hip Flexors'], 'description' => 'Full adduct, half release, full adduct again. Extended TUT.'],
            ['name' => 'Outer Thigh 1.5 Reps', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core'], 'description' => 'Full abduct, half release, full abduct again. Extended TUT.'],
            ['name' => 'Inner Thigh 21s', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Core', 'Hip Flexors'], 'description' => '7 bottom half, 7 top half, 7 full reps. Complete adductor development.'],
            ['name' => 'Outer Thigh 21s', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core'], 'description' => '7 bottom half, 7 top half, 7 full reps. Complete abductor development.'],
            ['name' => 'Inner Thigh Pulse Reps (Small Range)', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Core', 'Hip Flexors'], 'description' => 'Small pulsing adductions at peak. Builds pump and endurance.'],
            ['name' => 'Outer Thigh Pulse Reps (Small Range)', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core'], 'description' => 'Small pulsing abductions at peak. Builds pump and endurance.'],
            ['name' => 'Inner Thigh Band Resisted', 'equipment' => 'Inner/Outer Thigh Combo, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Core', 'Hip Flexors'], 'description' => 'Attach band for variable resistance. Accommodating resistance.'],
            ['name' => 'Outer Thigh Band Resisted', 'equipment' => 'Inner/Outer Thigh Combo, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core'], 'description' => 'Attach band for variable resistance. Accommodating resistance.'],
            ['name' => 'Inner Thigh Heavy Slow Negative', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Core', 'Hip Flexors'], 'description' => 'Use heavy weight, adduct with assistance, release alone. Extreme eccentric.'],
            ['name' => 'Outer Thigh Heavy Slow Negative', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core'], 'description' => 'Use heavy weight, abduct with assistance, release alone. Extreme eccentric.'],
            ['name' => 'Inner Thigh Isometric at Mid-Range', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'core', 'target_muscles' => ['Adductors', 'Core', 'Hip Flexors'], 'description' => 'Hold at mid-point of adduction. Static adductor strength.'],
            ['name' => 'Outer Thigh Isometric at Mid-Range', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'core', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core'], 'description' => 'Hold at mid-point of abduction. Static abductor strength.'],
            ['name' => 'Inner Thigh Seated Adduction (No Machine)', 'equipment' => 'Inner/Outer Thigh Combo, Ankle Weight/Ball', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Core', 'Hip Flexors'], 'description' => 'Squeeze ball or pillow between knees. Home-friendly adduction.'],
            ['name' => 'Outer Thigh Seated Abduction (No Machine)', 'equipment' => 'Inner/Outer Thigh Combo, Ankle Weight/Band', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core'], 'description' => 'Use band or ankle weights for abduction. Home-friendly abductor work.'],
            ['name' => 'Inner Thigh 3-Second Peak Squeeze', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Core', 'Hip Flexors'], 'description' => 'Adduct and squeeze inner thighs for 3 seconds at peak. Maximal contraction.'],
            ['name' => 'Outer Thigh 3-Second Peak Squeeze', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core'], 'description' => 'Abduct and squeeze glute medius for 3 seconds at peak. Maximal contraction.'],
            ['name' => 'Inner Thigh Alternating Tempo', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Core', 'Hip Flexors'], 'description' => 'Fast adduction, slow release or vice versa. Varied TUT.'],
            ['name' => 'Outer Thigh Alternating Tempo', 'equipment' => 'Inner/Outer Thigh Combo', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core'], 'description' => 'Fast abduction, slow release or vice versa. Varied TUT.'],
        ];

        $sourceDir = public_path('execises/inner-outer-thigh-combo');
        $files = glob($sourceDir . '/*.png');
        sort($files);

        foreach ($exercises as $i => $data) {
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
