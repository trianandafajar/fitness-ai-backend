<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Database\Seeder;

class FruitFoodSeeder extends Seeder
{
    public function run(): void
    {
        $categories = FoodCategory::pluck('id', 'slug');

        $foods = [
            ['name' => 'Pisang', 'category_slug' => 'fruit', 'calories_per_100g' => 89, 'protein_per_100g' => 1.1, 'carbs_per_100g' => 22.8, 'fat_per_100g' => 0.3, 'serving_unit' => '1 buah sedang (120g)'],
            ['name' => 'Apel', 'category_slug' => 'fruit', 'calories_per_100g' => 52, 'protein_per_100g' => 0.3, 'carbs_per_100g' => 13.8, 'fat_per_100g' => 0.2, 'serving_unit' => '1 buah sedang (180g)'],
            ['name' => 'Blueberry', 'category_slug' => 'fruit', 'calories_per_100g' => 57, 'protein_per_100g' => 0.7, 'carbs_per_100g' => 14.5, 'fat_per_100g' => 0.3, 'serving_unit' => '1 cup (148g)'],
            ['name' => 'Stroberi', 'category_slug' => 'fruit', 'calories_per_100g' => 32, 'protein_per_100g' => 0.7, 'carbs_per_100g' => 7.7, 'fat_per_100g' => 0.3, 'serving_unit' => '1 cup (150g)'],
            ['name' => 'Jeruk', 'category_slug' => 'fruit', 'calories_per_100g' => 47, 'protein_per_100g' => 0.9, 'carbs_per_100g' => 11.8, 'fat_per_100g' => 0.1, 'serving_unit' => '1 buah sedang (150g)'],
            ['name' => 'Semangka', 'category_slug' => 'fruit', 'calories_per_100g' => 30, 'protein_per_100g' => 0.6, 'carbs_per_100g' => 7.6, 'fat_per_100g' => 0.2, 'serving_unit' => '1 potong besar (300g)'],
            ['name' => 'Alpukat', 'category_slug' => 'fruit', 'calories_per_100g' => 160, 'protein_per_100g' => 2, 'carbs_per_100g' => 8.5, 'fat_per_100g' => 14.7, 'serving_unit' => '½ buah (68g)'],
            ['name' => 'Kurma', 'category_slug' => 'fruit', 'calories_per_100g' => 282, 'protein_per_100g' => 2.5, 'carbs_per_100g' => 75, 'fat_per_100g' => 0.4, 'serving_unit' => '3 butir (24g)'],
        ];

        foreach ($foods as $data) {
            $categoryId = $categories[$data['category_slug']] ?? null;
            unset($data['category_slug']);
            $data['category_id'] = $categoryId;
            Food::create($data);
        }
    }
}
