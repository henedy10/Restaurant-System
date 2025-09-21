<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewItem extends Notification
{
    use Queueable;
    protected $subscriberEmail;

    /**
     * Create a new notification instance.
     */
    public function __construct($subscriberEmail)
    {
        $this->subscriberEmail=$subscriberEmail;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Hello, '.$this->subscriberEmail)
            ->line('Our restaurant has added a new item.')
            ->line('We hope you see our new item.')
            ->action('View New Item', route('newItem'))
            ->line('Thank you for subscribing to our restaurant.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
