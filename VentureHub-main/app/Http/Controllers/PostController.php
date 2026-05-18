<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'comments.user', 'tags', 'likes', 'bookmarks'])->latest()->paginate(10);
        return view('dashboard', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'tags' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);
        
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        $post = $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'image_path' => $imagePath,
        ]);

        if ($request->tags) {
            $tagNames = array_map('trim', explode(',', $request->tags));
            $tagIds = [];
            foreach ($tagNames as $tagName) {
                if (empty($tagName)) continue;
                $slug = \Illuminate\Support\Str::slug($tagName);
                $tag = \App\Models\Tag::firstOrCreate(['slug' => $slug], ['name' => $tagName]);
                $tagIds[] = $tag->id;
            }
            $post->tags()->sync($tagIds);
        }

        return redirect()->route('dashboard')->with('success', 'Idea pitched successfully!');
    }
}
