<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Project;
use App\Models\Post;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        
        if (!$query) {
            return back();
        }

        $users = User::where('name', 'like', "%{$query}%")
                     ->orWhere('skills', 'like', "%{$query}%")
                     ->get();

        $projects = Project::where('title', 'like', "%{$query}%")
                           ->orWhere('description', 'like', "%{$query}%")
                           ->where('status', 'open')
                           ->get();

        $posts = Post::where('title', 'like', "%{$query}%")
                     ->orWhere('content', 'like', "%{$query}%")
                     ->get();

        return view('search.index', compact('users', 'projects', 'posts', 'query'));
    }
}
