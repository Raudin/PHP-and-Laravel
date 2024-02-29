<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'ticket_id',
        'quantity',
        'guest_name',
        'email',
        'phone_number'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }


    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}
