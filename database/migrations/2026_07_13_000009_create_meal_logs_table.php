<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meal_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('meal_type');
            $table->timestamp('logged_at');
            $table->integer('total_calories');
            $table->decimal('total_protein_g', 5, 1);
            $table->decimal('total_carbs_g', 5, 1);
            $table->decimal('total_fat_g', 5, 1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meal_logs');
    }
};
