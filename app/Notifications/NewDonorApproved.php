<?php

namespace App\Notifications;

use App\Models\Donor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewDonorApproved extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $donor;

    public function __construct(Donor $donor)
    {
        $this->donor = $donor;
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
            ->subject('Approved Donor')
            ->view('emails.donor-approved', [
                'donor' => $this->donor->load('user'),
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
            //
        ];
    }
}
