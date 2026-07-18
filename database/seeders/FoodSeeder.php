<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    public function run(): void
    {
        $foods = [
            // Protein
            ['name' => 'Grilled Chicken Breast', 'category' => 'protein', 'image' => 'https://images.unsplash.com/photo-1604503468506-a8da13d82791?w=400', 'calories_per_100g' => 165, 'protein_per_100g' => 31, 'carbs_per_100g' => 0, 'fat_per_100g' => 3.6, 'serving_unit' => 'gram'],
            ['name' => 'Beef Steak', 'category' => 'protein', 'image' => 'https://images.unsplash.com/photo-1600891964092-4316c288032e?w=400', 'calories_per_100g' => 271, 'protein_per_100g' => 26, 'carbs_per_100g' => 0, 'fat_per_100g' => 19, 'serving_unit' => 'gram'],
            ['name' => 'Salmon Fillet', 'category' => 'protein', 'image' => 'https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?w=400', 'calories_per_100g' => 208, 'protein_per_100g' => 20, 'carbs_per_100g' => 0, 'fat_per_100g' => 13, 'serving_unit' => 'gram'],
            ['name' => 'Whole Egg', 'category' => 'protein', 'image' => 'https://images.unsplash.com/photo-1587486913049-53fc88980cfc?w=400', 'calories_per_100g' => 155, 'protein_per_100g' => 13, 'carbs_per_100g' => 1.1, 'fat_per_100g' => 11, 'serving_unit' => 'piece'],
            ['name' => 'Tofu', 'category' => 'protein', 'image' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400', 'calories_per_100g' => 76, 'protein_per_100g' => 8, 'carbs_per_100g' => 1.9, 'fat_per_100g' => 4.8, 'serving_unit' => 'gram'],
            ['name' => 'Greek Yogurt', 'category' => 'protein', 'image' => 'https://images.unsplash.com/photo-1488477181946-6428a0291777?w=400', 'calories_per_100g' => 59, 'protein_per_100g' => 10, 'carbs_per_100g' => 3.6, 'fat_per_100g' => 0.4, 'serving_unit' => 'gram'],

            // Carbs
            ['name' => 'White Rice', 'category' => 'carb', 'image' => 'https://images.unsplash.com/photo-1586201375761-83865001e31c?w=400', 'calories_per_100g' => 130, 'protein_per_100g' => 2.7, 'carbs_per_100g' => 28, 'fat_per_100g' => 0.3, 'serving_unit' => 'gram'],
            ['name' => 'Sweet Potato', 'category' => 'carb', 'image' => 'https://images.unsplash.com/photo-1596097635121-14b63b7a0c19?w=400', 'calories_per_100g' => 86, 'protein_per_100g' => 1.6, 'carbs_per_100g' => 20, 'fat_per_100g' => 0.1, 'serving_unit' => 'gram'],
            ['name' => 'Oatmeal', 'category' => 'carb', 'image' => 'https://images.unsplash.com/photo-1517677208171-0bc6725a3e60?w=400', 'calories_per_100g' => 71, 'protein_per_100g' => 2.5, 'carbs_per_100g' => 12, 'fat_per_100g' => 1.5, 'serving_unit' => 'gram'],
            ['name' => 'Whole Wheat Bread', 'category' => 'carb', 'image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?w=400', 'calories_per_100g' => 265, 'protein_per_100g' => 9, 'carbs_per_100g' => 49, 'fat_per_100g' => 3.2, 'serving_unit' => 'slice'],
            ['name' => 'Pasta', 'category' => 'carb', 'image' => 'https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?w=400', 'calories_per_100g' => 131, 'protein_per_100g' => 5, 'carbs_per_100g' => 25, 'fat_per_100g' => 1.1, 'serving_unit' => 'gram'],

            // Vegetables
            ['name' => 'Broccoli', 'category' => 'vegetable', 'image' => 'https://images.unsplash.com/photo-1584270354949-c26b0d5b4a0c?w=400', 'calories_per_100g' => 34, 'protein_per_100g' => 2.8, 'carbs_per_100g' => 7, 'fat_per_100g' => 0.4, 'serving_unit' => 'gram'],
            ['name' => 'Spinach', 'category' => 'vegetable', 'image' => 'https://images.unsplash.com/photo-1576045057995-568f588f82fb?w=400', 'calories_per_100g' => 23, 'protein_per_100g' => 2.9, 'carbs_per_100g' => 3.6, 'fat_per_100g' => 0.4, 'serving_unit' => 'gram'],
            ['name' => 'Mixed Salad', 'category' => 'vegetable', 'image' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=400', 'calories_per_100g' => 20, 'protein_per_100g' => 1.5, 'carbs_per_100g' => 3, 'fat_per_100g' => 0.3, 'serving_unit' => 'gram'],
            ['name' => 'Green Beans', 'category' => 'vegetable', 'image' => 'https://images.unsplash.com/photo-1567375698348-5d9d5ae99de0?w=400', 'calories_per_100g' => 31, 'protein_per_100g' => 1.8, 'carbs_per_100g' => 7, 'fat_per_100g' => 0.2, 'serving_unit' => 'gram'],

            // Fruits
            ['name' => 'Banana', 'category' => 'fruit', 'image' => 'https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?w=400', 'calories_per_100g' => 89, 'protein_per_100g' => 1.1, 'carbs_per_100g' => 23, 'fat_per_100g' => 0.3, 'serving_unit' => 'piece'],
            ['name' => 'Apple', 'category' => 'fruit', 'image' => 'https://images.unsplash.com/photo-1560806887-1e4cd0b6cbd6?w=400', 'calories_per_100g' => 52, 'protein_per_100g' => 0.3, 'carbs_per_100g' => 14, 'fat_per_100g' => 0.2, 'serving_unit' => 'piece'],
            ['name' => 'Blueberries', 'category' => 'fruit', 'image' => 'https://images.unsplash.com/photo-1498557850523-fd3d118b962e?w=400', 'calories_per_100g' => 57, 'protein_per_100g' => 0.7, 'carbs_per_100g' => 14, 'fat_per_100g' => 0.3, 'serving_unit' => 'gram'],
            ['name' => 'Avocado', 'category' => 'fruit', 'image' => 'https://images.unsplash.com/photo-1523049673857-eb18f1d7b578?w=400', 'calories_per_100g' => 160, 'protein_per_100g' => 2, 'carbs_per_100g' => 8.5, 'fat_per_100g' => 15, 'serving_unit' => 'piece'],

            // Dairy & Alternatives
            ['name' => 'Low-Fat Milk', 'category' => 'dairy', 'image' => 'https://images.unsplash.com/photo-1563636619-e9143da7973b?w=400', 'calories_per_100g' => 42, 'protein_per_100g' => 3.4, 'carbs_per_100g' => 5, 'fat_per_100g' => 1, 'serving_unit' => 'cup'],
            ['name' => 'Cottage Cheese', 'category' => 'dairy', 'image' => 'https://images.unsplash.com/photo-1488477181946-6428a0291777?w=400', 'calories_per_100g' => 98, 'protein_per_100g' => 11, 'carbs_per_100g' => 3.4, 'fat_per_100g' => 4.3, 'serving_unit' => 'gram'],

            // Healthy Fats & Snacks
            ['name' => 'Almonds', 'category' => 'snack', 'image' => 'https://images.unsplash.com/photo-1508061253366-f7da1583a5fc?w=400', 'calories_per_100g' => 579, 'protein_per_100g' => 21, 'carbs_per_100g' => 22, 'fat_per_100g' => 50, 'serving_unit' => 'gram'],
            ['name' => 'Peanut Butter', 'category' => 'snack', 'image' => 'https://images.unsplash.com/photo-1590779033100-9f8a05ed6eef?w=400', 'calories_per_100g' => 588, 'protein_per_100g' => 25, 'carbs_per_100g' => 20, 'fat_per_100g' => 50, 'serving_unit' => 'tbsp'],
            ['name' => 'Protein Shake', 'category' => 'snack', 'image' => 'https://images.unsplash.com/photo-1622485830553-d6734bf4c6b2?w=400', 'calories_per_100g' => 120, 'protein_per_100g' => 25, 'carbs_per_100g' => 3, 'fat_per_100g' => 1.5, 'serving_unit' => 'scoop'],
        ];

        foreach ($foods as $data) {
            Food::create($data);
        }
    }
}
