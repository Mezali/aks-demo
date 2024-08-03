<?php

namespace App\Listeners\OrderLocation;

use App\Models\OrderLocation;
use App\Events\OrderLocation\Updated as OrderLocationUpdated;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Updated
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
    public function handle(OrderLocationUpdated $event): void
    {
        $orderLocation = $event->orderLocation;
        if ($orderLocation->status === 'PA') {
            Notification::create([
                'user_from_id'  => $orderLocation->provider_id,
                'user_to_id'    => $orderLocation->client_id,
                'message'       => "Que legal! O seu pedido #".$orderLocation->id." foi aceito.",
                'url'           => "/painel/meuspedidos/".$orderLocation->id."/detalhes",
                'color'         => "#6015CF"
            ]);
        } else if ($orderLocation->status === 'PR') {
            Notification::create([
                'user_from_id'  => $orderLocation->provider_id,
                'user_to_id'    => $orderLocation->client_id,
                'message'       => "Infelizmente, seu pedido #".$orderLocation->id." foi recusado.",
                'url'           => "/painel/meuspedidos/".$orderLocation->id."/detalhes",
                'color'         => "#6015CF"
            ]);
        } else if ($orderLocation->status === 'PC') {
            Notification::create([
                'user_to_id'    => $orderLocation->provider_id,
                'user_from_id'  => $orderLocation->client_id,
                'message'       => "Seu cliente cancelou o pedido #".$orderLocation->id,
                'url'           => "/painel/meuspedidos/".$orderLocation->id."/detalhes",
                'color'         => "#6015CF"
            ]);
        }
    }
}
