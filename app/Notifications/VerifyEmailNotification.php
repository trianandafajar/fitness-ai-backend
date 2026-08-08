<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyEmailNotification extends Notification
{
    public function __construct(
        public string $code,
        public string $email,
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Verify Your Email')
            ->line('Your email verification code is:')
            ->line($this->code)
            ->line('Enter this code to verify your account.')
            ->line('This code is valid for 10 minutes.')
            ->line('If you did not create an account, no further action is required.');
    }
}
