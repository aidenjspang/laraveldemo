<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class BookingsEvent
{
    use InteractsWithSockets, SerializesModels;

    public $booking;
    public $action;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(\App\Booking $booking, \App\Supplier $supplier, $action = 'created')
    {
        $this->booking = $booking;
        $this->supplier = $supplier;
        $this->action = $action;
    }
}
