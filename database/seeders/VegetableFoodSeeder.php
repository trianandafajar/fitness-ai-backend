<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Database\Seeder;

class VegetableFoodSeeder extends Seeder
{
    public function run(): void
    {
        $categories = FoodCategory::pluck('id', 'slug');

        $foods = [
            ['name' => 'Brokoli (kukus)', 'category_slug' => 'vegetable', 'calories_per_100g' => 35, 'protein_per_100g' => 2.4, 'carbs_per_100g' => 7.2, 'fat_per_100g' => 0.4, 'serving_unit' => '1 mangkuk (150g)'],
            ['name' => 'Bayam (mentah)', 'category_slug' => 'vegetable', 'calories_per_100g' => 23, 'protein_per_100g' => 2.9, 'carbs_per_100g' => 3.6, 'fat_per_100g' => 0.4, 'serving_unit' => '2 cup (60g)'],
            ['name' => 'Kale (mentah)', 'category_slug' => 'vegetable', 'calories_per_100g' => 49, 'protein_per_100g' => 4.3, 'carbs_per_100g' => 8.8, 'fat_per_100g' => 0.9, 'serving_unit' => '1 cup (67g)'],
            ['name' => 'Asparagus (kukus)', 'category_slug' => 'vegetable', 'calories_per_100g' => 22, 'protein_per_100g' => 2.4, 'carbs_per_100g' => 4.1, 'fat_per_100g' => 0.2, 'serving_unit' => '6 batang (100g)'],
            ['name' => 'Paprika (merah, mentah)', 'category_slug' => 'vegetable', 'calories_per_100g' => 31, 'protein_per_100g' => 1, 'carbs_per_100g' => 6, 'fat_per_100g' => 0.3, 'serving_unit' => '1 buah besar (150g)'],
            ['name' => 'Timun', 'category_slug' => 'vegetable', 'calories_per_100g' => 15, 'protein_per_100g' => 0.7, 'carbs_per_100g' => 3.6, 'fat_per_100g' => 0.1, 'serving_unit' => '1 buah sedang (200g)'],
            ['name' => 'Wortel', 'category_slug' => 'vegetable', 'calories_per_100g' => 41, 'protein_per_100g' => 0.9, 'carbs_per_100g' => 9.6, 'fat_per_100g' => 0.2, 'serving_unit' => '1 buah sedang (61g)'],
        ];

        foreach ($foods as $data) {
            $categoryId = $categories[$data['category_slug']] ?? null;
            unset($data['category_slug']);
            $data['category_id'] = $categoryId;
            Food::create($data);
        }
    }
}
