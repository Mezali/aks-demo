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

class Created
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private Order $order;
    /**
     * Create a new event instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }
}
