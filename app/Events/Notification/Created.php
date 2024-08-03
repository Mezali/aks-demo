<?php

namespace App\Events\Notification;

use App\Models\Notification;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Broadcasting\{
    Channel,
    InteractsWithSockets,
    PresenceChannel,
    PrivateChannel
};

class Created implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Notification $notification;
    /**
     * Create a new event instance.
     */
    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function broadcastOn(): Channel {
        return new Channel('notifications');
    }

}
