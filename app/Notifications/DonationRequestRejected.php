<?php

namespace App\Notifications;

use App\Models\BloodBank;
use App\Models\DonationRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DonationRequestRejected extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $donation_request;

    public function __construct(DonationRequest $donation_request)
    {
        $this->donation_request = $donation_request;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $bb = BloodBank::where('id', $this->donation_request->blood_bank_id)->first();

        return [
            'type' => static::class,
            // 'date' => $this->donation_request->appointment_date,
            'blood_bank_name' => $bb->name,
        ];
    }
}
