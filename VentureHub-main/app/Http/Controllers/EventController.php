<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('organizer')->orderBy('event_date', 'asc')->get();
        return view('events.index', compact('events'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'location' => 'nullable|string|max:255',
        ]);

        $request->user()->events()->create($validated);

        return back()->with('success', 'Event scheduled successfully!');
    }

    public function rsvp(Request $request, Event $event)
    {
        $user = $request->user();
        if ($event->attendees()->where('user_id', $user->id)->exists()) {
            $event->attendees()->detach($user->id);
            $message = 'You are no longer attending this event.';
        } else {
            $event->attendees()->attach($user->id);
            $message = 'RSVP successful! See you there.';
        }
        return back()->with('success', $message);
    }
}
