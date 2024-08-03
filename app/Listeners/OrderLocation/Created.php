<?php

namespace App\Listeners\OrderLocation;

use App\Models\OrderLocation;
use App\Events\OrderLocation\Created as OrderLocationCreated;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Created
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderLocationCreated $event): void
    {
        $orderLocation = $event->orderLocation;
        Notification::create([
            'user_from_id'  => $orderLocation->client_id,
            'user_to_id'    => $orderLocation->provider_id,
            'message'       => "Você recebeu um novo pedido.",
            'url'           => "/painel/pedidoscacamba/".$orderLocation->id."/detalhes",
            'color'         => "#6015CF"
        ]);
        Notification::create([
            'user_from_id'  => $orderLocation->provider_id,
            'user_to_id'    => $orderLocation->client_id,
            'message'       => "Oba! Recebemos seu pedido.",
            'url'           => "/painel/meuspedidos/".$orderLocation->id."/detalhes",
            'color'         => "#6015CF"
        ]);
    }
}
