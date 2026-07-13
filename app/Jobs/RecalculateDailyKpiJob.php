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

    public function __construct(
        public int $userId,
        public string $date,
    ) {}

    public function handle(KpiCalculator $kpi): void
    {
        $user = User::find($this->userId);

        if (!$user) {
            return;
        }

        $date = Carbon::parse($this->date);

        $kpi->calculateDaily($user, $date);
    }
}
