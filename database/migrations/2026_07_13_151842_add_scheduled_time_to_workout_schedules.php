<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('workout_schedules', function (Blueprint $table) {
            $table->time('scheduled_time')->nullable()->after('day_of_week');
        });

        Schema::table('workout_schedules', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'day_of_week']);
        });

        Schema::table('workout_schedules', function (Blueprint $table) {
            $table->unique(['user_id', 'day_of_week', 'scheduled_time']);
        });
    }

    public function down(): void
    {
        Schema::table('workout_schedules', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'day_of_week', 'scheduled_time']);
        });

        Schema::table('workout_schedules', function (Blueprint $table) {
            $table->unique(['user_id', 'day_of_week']);
        });

        Schema::table('workout_schedules', function (Blueprint $table) {
            $table->dropColumn('scheduled_time');
        });
    }
};
