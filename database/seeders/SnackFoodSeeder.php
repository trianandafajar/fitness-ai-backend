<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Database\Seeder;

class SnackFoodSeeder extends Seeder
{
    public function run(): void
    {
        $categories = FoodCategory::pluck('id', 'slug');

        $foods = [
            ['name' => 'Almond', 'category_slug' => 'snack', 'calories_per_100g' => 579, 'protein_per_100g' => 21.2, 'carbs_per_100g' => 21.6, 'fat_per_100g' => 49.9, 'serving_unit' => '1 genggam (23 butir, 28g)'],
            ['name' => 'Kacang mete', 'category_slug' => 'snack', 'calories_per_100g' => 553, 'protein_per_100g' => 18.2, 'carbs_per_100g' => 30.2, 'fat_per_100g' => 43.9, 'serving_unit' => '1 genggam (28g)'],
            ['name' => 'Rice cake (plain)', 'category_slug' => 'snack', 'calories_per_100g' => 387, 'protein_per_100g' => 7.7, 'carbs_per_100g' => 81.1, 'fat_per_100g' => 2.8, 'serving_unit' => '1 keping (9g)'],
            ['name' => 'Selai kacang (natural)', 'category_slug' => 'snack', 'calories_per_100g' => 588, 'protein_per_100g' => 25, 'carbs_per_100g' => 20, 'fat_per_100g' => 50, 'serving_unit' => '1 sdm (16g)'],
            ['name' => 'Protein bar rendah gula', 'category_slug' => 'snack', 'calories_per_100g' => 380, 'protein_per_100g' => 33, 'carbs_per_100g' => 20, 'fat_per_100g' => 15, 'serving_unit' => '1 batang (60g)'],
        ];

        foreach ($foods as $data) {
            $categoryId = $categories[$data['category_slug']] ?? null;
            unset($data['category_slug']);
            $data['category_id'] = $categoryId;
            Food::create($data);
        }
    }
}
