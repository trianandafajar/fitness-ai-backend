<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->nullable();
            $table->string('image')->nullable();
            $table->decimal('calories_per_100g', 7, 1)->nullable();
            $table->decimal('protein_per_100g', 5, 1)->nullable();
            $table->decimal('carbs_per_100g', 5, 1)->nullable();
            $table->decimal('fat_per_100g', 5, 1)->nullable();
            $table->string('serving_unit')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
