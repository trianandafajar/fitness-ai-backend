<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Database\Seeder;

class BeverageFoodSeeder extends Seeder
{
    public function run(): void
    {
        $categories = FoodCategory::pluck('id', 'slug');

        $foods = [
            ['name' => 'Air kelapa', 'category_slug' => 'beverage', 'calories_per_100g' => 19, 'protein_per_100g' => 0.7, 'carbs_per_100g' => 3.7, 'fat_per_100g' => 0.2, 'serving_unit' => '1 gelas (250ml)'],
            ['name' => 'Teh hijau (seduh)', 'category_slug' => 'beverage', 'calories_per_100g' => 1, 'protein_per_100g' => 0.1, 'carbs_per_100g' => 0, 'fat_per_100g' => 0, 'serving_unit' => '1 cangkir (240ml)'],
            ['name' => 'Kopi hitam', 'category_slug' => 'beverage', 'calories_per_100g' => 2, 'protein_per_100g' => 0.1, 'carbs_per_100g' => 0, 'fat_per_100g' => 0, 'serving_unit' => '1 cangkir (240ml)'],
        ];

        foreach ($foods as $data) {
            $categoryId = $categories[$data['category_slug']] ?? null;
            unset($data['category_slug']);
            $data['category_id'] = $categoryId;
            Food::create($data);
        }
    }
}
