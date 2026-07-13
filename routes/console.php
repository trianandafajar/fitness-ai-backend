<?php

use App\Jobs\GenerateWeeklyKpiReportJob;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::job(new GenerateWeeklyKpiReportJob)
    ->weekly()
    ->mondays()
    ->at('00:10')
    ->description('Generate weekly KPI reports with AI summary');

Schedule::command('workout:send-reminders')
    ->everyMinute()
    ->description('Send workout reminders 15 min before and at scheduled time');
