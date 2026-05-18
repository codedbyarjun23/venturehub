<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggle(Post $post, Request $request)
    {
        $user = $request->user();
        if ($post->likes()->where('user_id', $user->id)->exists()) {
            $post->likes()->detach($user->id);
            $liked = false;
        } else {
            $post->likes()->attach($user->id);
            $liked = true;
            if ($post->user_id !== $user->id) {
                $post->user->notify(new \App\Notifications\PostLiked($user, $post));
            }
        }

        return response()->json([
            'liked' => $liked,
            'likes_count' => $post->likes()->count(),
        ]);
    }
}
