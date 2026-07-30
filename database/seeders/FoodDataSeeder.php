<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FoodDataSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('foods')->truncate();

        $this->call([
            FoodCategorySeeder::class,
            FoodSeeder::class,
            CarbFoodSeeder::class,
        ]);
    }
}
