<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Ticket;
use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create Event
        collect([
            [
                'title' => 'Birthday',
                'description' => 'A birthday',
                'venue' => 'Two Rivers'
            ],
            [
                'title' => 'Ruracio',
                'description' => 'A Traditional wedding',
                'venue' => 'Junction'
            ],
            [
                'title' => 'Wedding',
                'description' => 'A wedding',
                'venue' => 'Church',
            ],

        ])->map(fn ($attributes) => Event::firstOrCreate($attributes));


        //Create Ticket
        collect([
            [
                'ticket_type' => 'VIP',
                'event_id' => Event::first()->id,
                'price' => 1000,
                'maximum_attendees' =>  10,
            ],
            [
                'ticket_type' => 'Regular',
                'event_id' => Event::where('id', 2)->first()->id,
                'price' => 2000,
                'maximum_attendees' =>  15,
            ],
            [
                'ticket_type' => 'VIP',
                'event_id' => Event::where('id', 3)->first()->id,
                'price' => 3000,
                'maximum_attendees' =>  20,
            ],

        ])->map(fn ($attributes) => Ticket::firstOrCreate($attributes));

        //Create Booking 
        collect([
            [
                'ticket_id' => Ticket::first()->id,
                'event_id' => Event::first()->id,
                'quantity' => 2,
                'guest_name' => 'Opiyo Wendati',
                'email' => 'opiyo@email.com',
                'phone_number' => '0781917819'
            ],
            [
                'ticket_id' => Ticket::where('id', 2)->first()->id,
                'event_id' => Event::where('id', 2)->first()->id,
                'quantity' => 3,
                'guest_name' => 'Joseph Waleta',
                'email' => 'joseph@email.com',
                'phone_number' => '0781917829'
            ],
            [
                'ticket_id' => Ticket::where('id', 3)->first()->id,
                'event_id' => Event::where('id', 3)->first()->id,
                'quantity' => 4,
                'guest_name' => 'Luga Njoki',
                'email' => 'luga@email.com',
                'phone_number' => '0781917839'
            ],
        ])->map(fn ($attributes) => Booking::firstOrCreate($attributes));
    }
}
