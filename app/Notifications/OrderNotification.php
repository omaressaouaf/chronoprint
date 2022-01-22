<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public string $message,
        public string $url,
        public bool $notifyLocally = false
    ) {
    }

    public function via(mixed $notifiable): array
    {
        $via = ["mail"];
        if ($this->notifyLocally) {
            $via[] = "database";
            $via[] = "broadcast";
        }

        return $via;
    }

    public function toArray(mixed $notifiable): array
    {
        return [
            'url' => $this->url,
            'message' => $this->message
        ];
    }

    public function toMail(mixed $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("Notification de commande")
            ->markdown('mail.order', [
                'url' => $this->url,
                'message' => $this->message
            ]);
    }
}
