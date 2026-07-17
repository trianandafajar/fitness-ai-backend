<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

Route::get('/health', function () {
    $database = true;
    $redis = true;

    try {
        DB::select('select 1');
    } catch (\Throwable $e) {
        $database = false;
    }

    try {
        Redis::ping();
    } catch (\Throwable $e) {
        $redis = false;
    }

    $isHealthy = $database && $redis;

    return response()->json([
        'status' => $isHealthy ? 'ok' : 'error',
        'api' => true,
        'database' => $database,
        'redis' => $redis,
    ], $isHealthy ? 200 : 503);
});

Route::get('/', function () {
    return view('welcome');
});

