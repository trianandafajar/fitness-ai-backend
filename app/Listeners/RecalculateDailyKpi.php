<?php

namespace App\Listeners;

use App\Events\AttendanceLogged;
use App\Events\MealLogged;
use App\Events\WeightLogged;
use App\Jobs\RecalculateDailyKpiJob;
use Carbon\Carbon;
use Illuminate\Events\Dispatcher;

class RecalculateDailyKpi
{
    public function handleAttendanceLogged(AttendanceLogged $event): void
    {
        RecalculateDailyKpiJob::dispatch(
            $event->attendance->user_id,
            $event->attendance->checked_in_at,
        );
    }

    public function handleWeightLogged(WeightLogged $event): void
    {
        $weekStart = Carbon::parse($event->weightLog->week_start)->startOfWeek(Carbon::MONDAY);

        for ($i = 0; $i < 7; $i++) {
            RecalculateDailyKpiJob::dispatch(
                $event->weightLog->user_id,
                $weekStart->copy()->addDays($i)->format('Y-m-d'),
            );
        }
    }

    public function handleMealLogged(MealLogged $event): void
    {
        RecalculateDailyKpiJob::dispatch(
            $event->mealLog->user_id,
            $event->mealLog->logged_at,
        );
    }

    public function subscribe(Dispatcher $events): void
    {
        $events->listen(
            AttendanceLogged::class,
            [self::class, 'handleAttendanceLogged'],
        );

        $events->listen(
            WeightLogged::class,
            [self::class, 'handleWeightLogged'],
        );

        $events->listen(
            MealLogged::class,
            [self::class, 'handleMealLogged'],
        );
    }
}
