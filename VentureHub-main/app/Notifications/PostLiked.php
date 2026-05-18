<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Models\Post;

class PostLiked extends Notification
{
    use Queueable;

    public $liker;
    public $post;

    public function __construct(User $liker, Post $post)
    {
        $this->liker = $liker;
        $this->post = $post;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message' => "{$this->liker->name} liked your post: {$this->post->title}",
            'url' => route('network.show', $this->liker),
            'user_id' => $this->liker->id,
            'type' => 'like'
        ];
    }
}
