<?php

namespace App\Events\Order;

use App\Models\Order;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Broadcasting\{
    Channel,
    InteractsWithSockets,
    PresenceChannel,
    PrivateChannel
};

class StatusUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    
    /**
     * Create a new event instance.
     */
    public function __construct(public Order $order)
    {
        
    }
}
