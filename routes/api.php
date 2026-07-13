<?php

use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MealScheduleController;
use App\Http\Controllers\Api\OnboardingController;
use App\Http\Controllers\Api\WeightLogController;
use App\Http\Controllers\Api\WorkoutScheduleController;
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

    Route::get('/workout-schedules', [WorkoutScheduleController::class, 'index']);
    Route::post('/workout-schedules', [WorkoutScheduleController::class, 'store']);
    Route::post('/workout-schedules/sync', [WorkoutScheduleController::class, 'sync']);
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
});
