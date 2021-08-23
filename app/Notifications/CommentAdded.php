<?php

namespace App\Notifications;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CommentAdded extends Notification
{
    use Queueable;

    public $comment;
    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->subject('You Have New Comment on Voting app')
            ->markdown('emails.comment-added', [
                'comment' => $this->comment,
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => 'Your Idea has New Comment!',
            'idea_id' => $this->comment->idea->id,
            'idea_title' => $this->comment->idea->title,
            'idea_slug' => $this->comment->idea->slug,
            'idea_desc' => $this->comment->idea->desc,
            'comment_id' => $this->comment->id,
            'comment' => $this->comment->comment,
        ];
    }
}
