<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Database\Seeder;

class FatSeedFoodSeeder extends Seeder
{
    public function run(): void
    {
        $categories = FoodCategory::pluck('id', 'slug');

        $foods = [
            ['name' => 'Minyak zaitun', 'category_slug' => 'fat', 'calories_per_100g' => 884, 'protein_per_100g' => 0, 'carbs_per_100g' => 0, 'fat_per_100g' => 100, 'serving_unit' => '1 sdm (14g)'],
            ['name' => 'Biji chia', 'category_slug' => 'fat', 'calories_per_100g' => 486, 'protein_per_100g' => 16.5, 'carbs_per_100g' => 42.1, 'fat_per_100g' => 30.7, 'serving_unit' => '1 sdm (15g)'],
            ['name' => 'Biji rami', 'category_slug' => 'fat', 'calories_per_100g' => 534, 'protein_per_100g' => 18.3, 'carbs_per_100g' => 28.9, 'fat_per_100g' => 42.2, 'serving_unit' => '1 sdm (10g)'],
            ['name' => 'Kenari', 'category_slug' => 'fat', 'calories_per_100g' => 654, 'protein_per_100g' => 15.2, 'carbs_per_100g' => 13.7, 'fat_per_100g' => 65.2, 'serving_unit' => '1 genggam (28g)'],
        ];

        foreach ($foods as $data) {
            $categoryId = $categories[$data['category_slug']] ?? null;
            unset($data['category_slug']);
            $data['category_id'] = $categoryId;
            Food::create($data);
        }
    }
}
