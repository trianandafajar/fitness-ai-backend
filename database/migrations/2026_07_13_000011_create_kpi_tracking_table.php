<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kpi_tracking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('period_type');
            $table->date('period_start');
            $table->date('period_end');
            $table->integer('workouts_completed')->default(0);
            $table->integer('workouts_target')->default(0);
            $table->decimal('workout_compliance_pct', 5, 2)->default(0);
            $table->decimal('current_weight_kg', 5, 2)->nullable();
            $table->decimal('weight_change_kg', 5, 2)->nullable();
            $table->decimal('weight_trend_score', 5, 2)->default(0);
            $table->integer('nutrition_score')->default(0);
            $table->integer('consistency_score')->default(0);
            $table->integer('engagement_score')->default(0);
            $table->integer('overall_score')->default(0);
            $table->text('ai_summary')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'period_type', 'period_start']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kpi_tracking');
    }
};
