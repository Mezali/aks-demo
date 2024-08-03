<?php

namespace App\Events\OrderLocationProduct;

use App\Models\OrderLocationProduct;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Broadcasting\{
    Channel,
    InteractsWithSockets,
    PresenceChannel,
    PrivateChannel
};

class Updated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public OrderLocationProduct $orderLocationProduct;
    /**
     * Create a new event instance.
     */
    public function __construct(OrderLocationProduct $orderLocationProduct)
    {
        $this->orderLocationProduct = $orderLocationProduct;
    }

}
