<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function toggle(Post $post, Request $request)
    {
        $user = $request->user();
        if ($post->bookmarks()->where('user_id', $user->id)->exists()) {
            $post->bookmarks()->detach($user->id);
            $bookmarked = false;
        } else {
            $post->bookmarks()->attach($user->id);
            $bookmarked = true;
        }

        return response()->json([
            'bookmarked' => $bookmarked,
        ]);
    }
}
