<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class syncFacilityEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // public $facilities;
    // public $token;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->facilities = $facilities;
        // $this->token = $token;
        // dd($facilities);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
