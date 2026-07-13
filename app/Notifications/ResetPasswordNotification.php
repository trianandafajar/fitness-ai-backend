<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    public function __construct(
        public string $token,
        public string $email,
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $appUrl = config('app.url');
        $resetUrl = "{$appUrl}/reset-password?token={$this->token}&email={$this->email}";

        return (new MailMessage)
            ->subject('Reset Password')
            ->line('We received a password reset request for your account.')
            ->action('Reset Password', $resetUrl)
            ->line('This link is valid for 60 minutes.')
            ->line('If you did not request a password reset, please ignore this email.');
    }
}
