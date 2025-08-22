<?php

namespace App\Notifications;

use App\Models\Donation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DonationCompleted extends Notification
{
    use Queueable;

    public $donation;
    public $sendMail = true; // flag to control email sending

    /**
     * Create a new notification instance.
     */
    public function __construct(Donation $donation, $sendMail = true)
    {
        $this->donation = $donation;
        $this->sendMail = $sendMail;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        $channels = ['database']; // always send to database
        if ($this->sendMail) {
            $channels[] = 'mail'; // add mail channel only if flag is true
        }
        return $channels;
    }

    /**
     * Optional: configure email if mail channel is enabled.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Donation Report')
            ->view('emails.donation-completed', [
                'donation' => $this->donation,
            ]);
    }

    /**
     * Array representation for database notification.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'type' => static::class,
            'donation' => $this->donation->load('donor', 'bloodBank'),
        ];
    }
}
