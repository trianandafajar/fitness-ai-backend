<?php

namespace App\Services;

use App\Models\Attendance;
use App\Models\User;
use App\Models\WorkoutSchedule;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class StreakService
{
    public const STATUS_STREAK = 'streak';

    public const STATUS_FAILED = 'failed';

    public const STATUS_PENDING = 'pending';

    public const STATUS_NEUTRAL = 'neutral';

    public const STATUS_NOT_STARTED = 'not_started';

    public function getCalendar(User $user, string $month): array
    {
        $monthStart = Carbon::createFromFormat('Y-m', $month, config('app.timezone'))->startOfMonth();
        $monthEnd = $monthStart->copy()->endOfMonth();
        $days = $this->getStatuses($user, $monthStart, $monthEnd, Carbon::today());

        return [
            'month' => $monthStart->format('Y-m'),
            'summary' => [
                'streak_days' => collect($days)->where('status', self::STATUS_STREAK)->count(),
                'failed_days' => collect($days)->where('status', self::STATUS_FAILED)->count(),
                'pending_days' => collect($days)->where('status', self::STATUS_PENDING)->count(),
            ],
            'days' => array_values($days),
        ];
    }

    public function currentCount(User $user, ?Carbon $asOf = null): int
    {
        $today = Carbon::today();
        $referenceDate = ($asOf?->copy() ?? $today)->setTimezone(config('app.timezone'))->startOfDay();

        if ($referenceDate->gt($today)) {
            $referenceDate = $today;
        }

        $registrationDate = $this->registrationDate($user);
        if ($registrationDate->gt($referenceDate)) {
            return 0;
        }

        $days = $this->getStatuses($user, $registrationDate, $referenceDate, $referenceDate);
        $streak = 0;

        for ($date = $referenceDate->copy(); $date->gte($registrationDate); $date->subDay()) {
            $status = $days[$date->toDateString()]['status'] ?? self::STATUS_NEUTRAL;

            if (in_array($status, [self::STATUS_NEUTRAL, self::STATUS_NOT_STARTED, self::STATUS_PENDING], true)) {
                continue;
            }

            if ($status === self::STATUS_FAILED) {
                break;
            }

            $streak++;
        }

        return $streak;
    }

    private function getStatuses(User $user, Carbon $start, Carbon $end, Carbon $referenceDate): array
    {
        $registrationDate = $this->registrationDate($user);
        $schedules = WorkoutSchedule::where('user_id', $user->id)
            ->get()
            ->keyBy(fn (WorkoutSchedule $schedule) => strtolower($schedule->day_of_week));

        $attendances = new Collection();
        $queryStart = $start->copy()->max($registrationDate);

        if ($queryStart->lte($end)) {
            $attendances = Attendance::where('user_id', $user->id)
                ->whereBetween('checked_in_at', [$queryStart->copy()->startOfDay(), $end->copy()->endOfDay()])
                ->get()
                ->groupBy(fn (Attendance $attendance) => $attendance->checked_in_at
                    ->copy()
                    ->setTimezone(config('app.timezone'))
                    ->toDateString());
        }

        $days = [];
        for ($date = $start->copy(); $date->lte($end); $date->addDay()) {
            $dateKey = $date->toDateString();
            $hasSchedule = $schedules->has(strtolower($date->format('l')));
            $dateAttendances = $attendances->get($dateKey, collect());

            $days[$dateKey] = [
                'date' => $dateKey,
                'status' => $this->getStatus(
                    $date,
                    $referenceDate,
                    $registrationDate,
                    $hasSchedule,
                    $dateAttendances,
                ),
                'has_schedule' => $hasSchedule,
                'has_attendance' => $dateAttendances->isNotEmpty(),
            ];
        }

        return $days;
    }

    private function getStatus(
        Carbon $date,
        Carbon $referenceDate,
        Carbon $registrationDate,
        bool $hasSchedule,
        Collection $attendances,
    ): string {
        if ($date->lt($registrationDate)) {
            return self::STATUS_NOT_STARTED;
        }

        if (!$hasSchedule || $date->gt($referenceDate)) {
            return self::STATUS_NEUTRAL;
        }

        if ($attendances->contains(fn (Attendance $attendance) => $attendance->status === 'verified')) {
            return self::STATUS_STREAK;
        }

        if ($date->isSameDay($referenceDate)
            && $attendances->contains(fn (Attendance $attendance) => $attendance->status === 'pending')) {
            return self::STATUS_STREAK;
        }

        if ($attendances->contains(fn (Attendance $attendance) => $attendance->status === 'pending')) {
            return self::STATUS_PENDING;
        }

        if ($date->isSameDay($referenceDate) && $attendances->isEmpty()) {
            return self::STATUS_PENDING;
        }

        return self::STATUS_FAILED;
    }

    private function registrationDate(User $user): Carbon
    {
        return $user->created_at
            ->copy()
            ->setTimezone(config('app.timezone'))
            ->startOfDay();
    }
}
