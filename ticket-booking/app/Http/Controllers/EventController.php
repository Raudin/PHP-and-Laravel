<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', ['events' => $events]);
    }
    public function create()
    {
        return view('events.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'venue' => 'required',
        ]);

        $newEvent = Event::create($data);

        return redirect(route('event.index'))->with('success', 'Event Created Succesffully');
    }
    public function edit(Event $event)
    {
        return view('events.edit', ['event' => $event]);
    }

    public function update(Event $event, Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'venue' => 'required',
        ]);

        $event->update($data);

        return redirect(route('event.index'))->with('success', 'Event Updated Succesffully');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect(route('event.index'))->with('success', 'Event deleted Succesffully');
    }
}
