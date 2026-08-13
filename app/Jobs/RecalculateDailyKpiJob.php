<?php

namespace App\Jobs;

use App\Models\User;
use App\Services\KpiCalculator;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class RecalculateDailyKpiJob implements ShouldQueue
{
    use Queueable;

    public int $tries = 3;

    public array $backoff = [10, 30, 120];

    public function __construct(
        public int $userId,
        public string $date,
        public string $period = 'daily',
    ) {}

    public function handle(KpiCalculator $kpi): void
    {
        $user = User::find($this->userId);

        if (!$user) {
            return;
        }

        $date = Carbon::parse($this->date);

        if ($this->period === 'weekly') {
            $kpi->calculateWeekly($user, $date);

            return;
        }

        $kpi->calculateDaily($user, $date);
    }
}
