<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function create(Event $event)
    {
        $tickets = Ticket::where('event_id', $event->id)->get();

        return view('bookings.create', [
            'tickets' => $tickets,
            'event' => $event,
        ]);
    }

    public function store(Request $request, Event $event)
    {
        $data = $request->validate([
            'ticket_id' => 'required',
            'quantity' => 'required',
            'guest_name' => 'required',
            'email' => 'email|required',
            'phone_number' => 'required'
        ]);

        $data['price'] = Ticket::where('id', $data['ticket_id'])->first()->id;

        $data['event_id'] = $event->id;

        Booking::create($data);


        return redirect(route('booking.create'))->with('success', 'Event Created Succesffully');
    }
}
