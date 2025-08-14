<?php

namespace App\Notifications;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class NewBlogUploaded extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
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
            ->subject('New Blog Published')
            ->line("A new blog titled '{$this->blog->title}' has been published.")
            ->action('Read Blog', url("/blogs/{$this->blog->id}"))
            ->line('Thank you for reading!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => $this->blog->title,
            'intro' => Str::limit($this->blog->body, 20, '...'),
            'id' => $this->blog->id,
            'url' => url("/blogs-show/{$this->blog->id}")
        ];
    }
}
