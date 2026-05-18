<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Models\Post;

class CommentAdded extends Notification
{
    use Queueable;

    public $commenter;
    public $post;

    public function __construct(User $commenter, Post $post)
    {
        $this->commenter = $commenter;
        $this->post = $post;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message' => "{$this->commenter->name} commented on your post: {$this->post->title}",
            'url' => route('network.show', $this->commenter),
            'user_id' => $this->commenter->id,
            'type' => 'comment'
        ];
    }
}
