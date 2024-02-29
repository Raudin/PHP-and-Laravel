<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_type',
        'event_id',
        'price',
        'maximum_attendees'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
