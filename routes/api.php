<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ExerciseController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\KpiTrackingController;
use App\Http\Controllers\Api\MealLogController;
use App\Http\Controllers\Api\MealScheduleController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\OnboardingController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\StreakController;
use App\Http\Controllers\Api\WeightLogController;
use App\Http\Controllers\Api\WorkoutScheduleController;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;

// Auth
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/auth/reset-password', [AuthController::class, 'resetPassword']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth/me', [AuthController::class, 'me']);
    Route::post('/auth/logout', [AuthController::class, 'logout']);

    Route::post('/onboarding/step1', [OnboardingController::class, 'step1']);
    Route::post('/onboarding/step2', [OnboardingController::class, 'step2']);
    Route::post('/onboarding/step3', [OnboardingController::class, 'step3']);
    Route::post('/onboarding/step4', [OnboardingController::class, 'step4']);
    Route::post('/onboarding/step5', [OnboardingController::class, 'step5']);
    Route::post('/onboarding/complete', [OnboardingController::class, 'complete']);

    Route::get('/workout-schedules', [WorkoutScheduleController::class, 'index']);
    Route::post('/workout-schedules', [WorkoutScheduleController::class, 'store']);
    Route::post('/workout-schedules/sync', [WorkoutScheduleController::class, 'sync']);
    Route::post('/workout-schedules/enrich-exercise', [WorkoutScheduleController::class, 'enrichExercise']);
    Route::put('/workout-schedules/{workout_schedule}', [WorkoutScheduleController::class, 'update']);
    Route::delete('/workout-schedules/{workout_schedule}', [WorkoutScheduleController::class, 'destroy']);

    Route::get('/meal-schedules', [MealScheduleController::class, 'index']);
    Route::post('/meal-schedules', [MealScheduleController::class, 'store']);
    Route::post('/meal-schedules/sync', [MealScheduleController::class, 'sync']);
    Route::put('/meal-schedules/{meal_schedule}', [MealScheduleController::class, 'update']);
    Route::delete('/meal-schedules/{meal_schedule}', [MealScheduleController::class, 'destroy']);

    Route::get('/weight-logs', [WeightLogController::class, 'index']);
    Route::post('/weight-logs', [WeightLogController::class, 'store']);
    Route::put('/weight-logs/{weight_log}', [WeightLogController::class, 'update']);
    Route::delete('/weight-logs/{weight_log}', [WeightLogController::class, 'destroy']);

    Route::get('/attendances', [AttendanceController::class, 'index']);
    Route::get('/attendances/today', [AttendanceController::class, 'today']);
    Route::post('/attendances', [AttendanceController::class, 'store']);
    Route::get('/attendances/{attendance}', [AttendanceController::class, 'show']);

    Route::get('/meal-logs', [MealLogController::class, 'index']);
    Route::get('/meal-logs/today', [MealLogController::class, 'today']);
    Route::post('/meal-logs', [MealLogController::class, 'store']);
    Route::put('/meal-logs/{meal_log}', [MealLogController::class, 'update']);
    Route::delete('/meal-logs/{meal_log}', [MealLogController::class, 'destroy']);

    Route::get('/kpi', [KpiTrackingController::class, 'index']);
    Route::get('/kpi/current', [KpiTrackingController::class, 'current']);

    Route::get('/streak/calendar', [StreakController::class, 'calendar']);
    Route::get('/streak/count', [StreakController::class, 'count']);

    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::get('/notifications/unread-count', [NotificationController::class, 'unreadCount']);
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead']);
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead']);
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy']);

    Route::get('/exercises', [ExerciseController::class, 'index']);
    Route::get('/foods', [FoodController::class, 'index']);
    Route::get('/ai-analysis', function (\Illuminate\Http\Request $r) {
        $profile = $r->user()->profile;
        return response()->json(['data' => $profile?->ai_analysis]);
    });

    Route::put('/profile', [ProfileController::class, 'update']);

    // Admin routes
    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard']);

        Route::post('/exercises', [ExerciseController::class, 'store']);
        Route::put('/exercises/{exercise}', [ExerciseController::class, 'update']);
        Route::delete('/exercises/{exercise}', [ExerciseController::class, 'destroy']);

        Route::post('/foods', [FoodController::class, 'store']);
        Route::put('/foods/{food}', [FoodController::class, 'update']);
        Route::delete('/foods/{food}', [FoodController::class, 'destroy']);
    });
});

Broadcast::routes(['middleware' => ['auth:sanctum']]);
