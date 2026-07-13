<?php

namespace App\Console\Commands;

use App\Models\WorkoutSchedule;
use App\Notifications\WorkoutReminderNotification;
use Carbon\Carbon;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

#[Signature('workout:send-reminders')]
#[Description('Send workout reminders 15 minutes before and at scheduled time')]
class SendWorkoutReminders extends Command
{
    public function handle(): void
    {
        $now = Carbon::now();
        $dayOfWeek = strtolower($now->format('l'));
        $today = $now->format('Y-m-d');

        $onTime = $now->format('H:i:00');
        $preTime = $now->copy()->addMinutes(15)->format('H:i:00');

        $schedules = WorkoutSchedule::where('day_of_week', $dayOfWeek)
            ->whereIn('scheduled_time', [$onTime, $preTime])
            ->with('user')
            ->get();

        foreach ($schedules as $schedule) {
            $reminderType = $schedule->scheduled_time === $onTime ? 'on_time' : 'pre';

            $alreadySent = DB::table('notifications')
                ->where('type', WorkoutReminderNotification::class)
                ->where('notifiable_id', $schedule->user_id)
                ->where('notifiable_type', get_class($schedule->user))
                ->whereDate('created_at', $today)
                ->where('data', 'like', '%"schedule_id":' . $schedule->id . '%')
                ->where('data', 'like', '%"reminder_type":"' . $reminderType . '"%')
                ->exists();

            if (!$alreadySent) {
                $schedule->user->notify(new WorkoutReminderNotification($schedule, $reminderType));
                $this->info("Reminder {$reminderType} sent to user {$schedule->user_id} for schedule {$schedule->id}");
            }
        }

        if ($schedules->isEmpty()) {
            $this->info('No workout reminders to send.');
        }
    }
}
