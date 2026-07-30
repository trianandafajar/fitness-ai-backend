<?php

namespace Database\Seeders;

use App\Models\FoodCategory;
use Illuminate\Database\Seeder;

class FoodCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Protein', 'slug' => 'protein'],
            ['name' => 'Carb', 'slug' => 'carb'],
            ['name' => 'Vegetable', 'slug' => 'vegetable'],
            ['name' => 'Fruit', 'slug' => 'fruit'],
            ['name' => 'Dairy', 'slug' => 'dairy'],
            ['name' => 'Snack', 'slug' => 'snack'],
        ];

        foreach ($categories as $cat) {
            FoodCategory::firstOrCreate(
                ['slug' => $cat['slug']],
                ['name' => $cat['name']]
            );
        }
    }
}
