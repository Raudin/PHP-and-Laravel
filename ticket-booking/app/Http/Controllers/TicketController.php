<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Event;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', ['tickets' => $tickets]);
    }
    public function create()
    {
        $events = Event::all();
        return view('tickets.create', compact('events'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'ticket_type' => 'required',
            'event_id' => 'required',
            'price' => 'required',
            'maximum_attendees' => 'required',
        ]);


        $newTicket = Ticket::create($data);

        return redirect(route('ticket.index'))->with('success', 'Ticket Created Succesffully');
    }
    public function edit(Ticket $ticket)
    {
        $events = Event::all();
        return view('tickets.edit', [
            'ticket' => $ticket,
            'events' => $events
        ]);
    }

    public function update(Ticket $ticket, Request $request)
    {
        $data = $request->validate([
            'ticket_type' => 'required',
            'event_id' => 'required',
            'price' => 'required',
            'maximum_attendees' => 'required',
        ]);


        $ticket->update($data);

        return redirect(route('ticket.index'))->with('success', 'Ticket Updated Succesffully');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect(route('ticketsindex'))->with('success', 'Ticket deleted Succesffully');
    }
}
