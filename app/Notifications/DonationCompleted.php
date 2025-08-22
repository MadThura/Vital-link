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

    /**
     * Create a new notification instance.
     */
    public $donation;

    public function __construct(Donation $donation)
    {
        $this->donation = $donation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Donation Report')
            ->view('emails.donation-completed', [
                'donation' => $this->donation,
            ])
            ->attach(storage_path('app/public/files/report.pdf'), [
                'as' => 'Donation-Report.pdf',
                'mime' => 'application/pdf',
            ]);

    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'type' => static::class,
            'note' => $this->donation->note
        ];
    }
}
