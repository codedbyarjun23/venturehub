<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('user')->latest()->get();
        return view('projects.index', compact('projects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'required_skills' => 'nullable|string',
            'status' => 'required|string|in:open,closed',
        ]);
        
        $request->user()->projects()->create($validated);

        return back()->with('success', 'Project posted successfully!');
    }

    public function apply(Request $request, Project $project)
    {
        $request->validate(['message' => 'nullable|string']);
        
        $application = $project->applications()->create([
            'user_id' => $request->user()->id,
            'message' => $request->message,
        ]);

        if ($project->user_id !== $request->user()->id) {
            $project->user->notify(new \App\Notifications\ProjectApplied($request->user(), $project));
        }

        return back()->with('success', 'Application submitted!');
    }

    public function updateApplication(Request $request, \App\Models\ProjectApplication $application)
    {
        if ($application->project->user_id !== $request->user()->id) {
            abort(403);
        }

        $request->validate(['status' => 'required|in:accepted,rejected']);
        $application->update(['status' => $request->status]);

        return back()->with('success', 'Application status updated!');
    }
}
