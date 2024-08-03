<?php

namespace App\Events\OrderLocation;

use App\Models\OrderLocation;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Broadcasting\{
    Channel,
    InteractsWithSockets,
    PresenceChannel,
    PrivateChannel
};

class Created
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public OrderLocation $orderLocation;
    /**
     * Create a new event instance.
     */
    public function __construct(OrderLocation $orderLocation)
    {
        $this->orderLocation = $orderLocation;
    }

}
