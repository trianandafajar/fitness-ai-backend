<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();

            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();

            $table->decimal('height_cm', 5, 1)->nullable();
            $table->decimal('weight_kg', 5, 1)->nullable();
            $table->string('fitness_goal')->nullable();
            $table->string('activity_level')->nullable();
            $table->decimal('goal_weight_kg', 5, 1)->nullable();

            $table->json('dietary_preferences')->nullable();
            $table->json('dietary_restrictions')->nullable();
            $table->json('allergies')->nullable();
            $table->text('medical_conditions')->nullable();

            $table->string('exercise_frequency')->nullable();
            $table->json('exercise_types')->nullable();
            $table->text('injuries')->nullable();

            $table->unsignedTinyInteger('onboarding_step')->default(0);
            $table->boolean('profile_completed')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
