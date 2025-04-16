<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FlightPositionUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;



    public $icao24;
    public $position;


    /**
     * Create a new event instance.
     */
    public function __construct($icao24, $position)
    {
        $this->icao24 = $icao24;
        $this->position = $position;
    }

    
    public function broadcastOn()
    {
       return new Channel('flights');
    }

    public function broadcastWith(){
        return [
            'icao24' => $this->icao24,
            'position' => $this->position 
        ];
    }


    public function broadCastAs(){
        return 'position.updated';
    }
}
