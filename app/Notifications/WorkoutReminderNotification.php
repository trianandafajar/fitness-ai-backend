<?php

namespace App\Notifications;

use App\Models\WorkoutSchedule;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class WorkoutReminderNotification extends Notification implements ShouldBroadcast
{
    use Queueable;

    public function __construct(
        public WorkoutSchedule $schedule,
        public string $reminderType,
    ) {}

    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    public function toDatabase(object $notifiable): array
    {
        $message = $this->reminderType === 'pre'
            ? "Workout in 15 minutes!"
            : "Time to workout!";

        return [
            'schedule_id' => $this->schedule->id,
            'day_of_week' => $this->schedule->day_of_week,
            'scheduled_time' => $this->schedule->scheduled_time,
            'exercises' => $this->schedule->exercises,
            'reminder_type' => $this->reminderType,
            'message' => $message,
            'description' => $this->reminderType === 'pre'
                ? 'Get ready for your scheduled workout.'
                : 'Your scheduled workout is starting now.',
        ];
    }

    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage($this->toDatabase($notifiable));
    }

    public function broadcastType(): string
    {
        return 'workout.reminder';
    }
}
