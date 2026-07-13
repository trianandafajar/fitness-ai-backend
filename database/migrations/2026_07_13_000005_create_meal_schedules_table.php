<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meal_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('day_of_week');
            $table->string('meal_time');
            $table->time('time')->nullable();
            $table->json('items');
            $table->timestamps();

            $table->unique(['user_id', 'day_of_week', 'meal_time']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meal_schedules');
    }
};
