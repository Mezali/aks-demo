<?php

namespace App\Listeners\OrderLocationProduct;

use App\Models\OrderLocationProduct;
use App\Events\OrderLocationProduct\Updated as OrderLocationProductUpdated;
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
    public function handle(OrderLocationProductUpdated $event): void
    {
        $orderLocationProduct = $event->orderLocationProduct;

        if (
            $orderLocationProduct->driver_id !== $orderLocationProduct->getOriginal('driver_id') ||
            $orderLocationProduct->delivery_location_date !== $orderLocationProduct->getOriginal('delivery_location_date')
        ) {
            Notification::create([
                'user_from_id'  => $orderLocationProduct->orderLocations->provider_id,
                'user_to_id'    => $orderLocationProduct->driver_id,
                'message'       => "Nova entrega agendada para o dia ".date('d/m/Y', strtotime($orderLocationProduct->delivery_location_date)).". Produto ".$orderLocationProduct->product->code,
                'url'           => "/painel/entregasagendadas",
                'color'         => "#6015CF"
            ]);
            Notification::create([
                'user_from_id'  => $orderLocationProduct->orderLocations->provider_id,
                'user_to_id'    => $orderLocationProduct->orderLocations->client_id,
                'message'       => "A entrega do item ".$orderLocationProduct->product->code.", referente ao pedido #".$orderLocationProduct->order_locations_id.", foi agendada para o dia ".date('d/m/Y', strtotime($orderLocationProduct->delivery_location_date)).".",
                'url'           => "/painel/minhascacambas/",
                'color'         => "#6015CF"
            ]);
        }

        if ( $orderLocationProduct->status !== $orderLocationProduct->getOriginal('status') && $orderLocationProduct->status === 'ETL' ) {
            Notification::create([
                'user_from_id'  => $orderLocationProduct->orderLocations->provider_id,
                'user_to_id'    => $orderLocationProduct->orderLocations->client_id,
                'message'       => "Nosso motorista já está a caminho com o item ".$orderLocationProduct->product->code." do seu pedido #".$orderLocationProduct->order_locations_id.". Fique atento!",
                'url'           => "/painel/minhascacambas/",
                'color'         => "#6015CF"
            ]);
            Notification::create([
                'user_from_id'  => $orderLocationProduct->driver_id,
                'user_to_id'    => $orderLocationProduct->orderLocations->provider_id,
                'message'       => "O motorista começou o processo de entrega do item ".$orderLocationProduct->product->code." do pedido #".$orderLocationProduct->order_locations_id.".",
                'url'           => "/painel/emtransitolocacao/",
                'color'         => "#6015CF"
            ]);
        }

        if ( $orderLocationProduct->status !== $orderLocationProduct->getOriginal('status') && $orderLocationProduct->status === 'L' ) {
            Notification::create([
                'user_from_id'  => $orderLocationProduct->orderLocations->provider_id,
                'user_to_id'    => $orderLocationProduct->orderLocations->client_id,
                'message'       => "Locação do item ".$orderLocationProduct->product->code." concluída.",
                'url'           => "/painel/minhascacambas/",
                'color'         => "#6015CF"
            ]);
            Notification::create([
                'user_from_id'  => $orderLocationProduct->driver_id,
                'user_to_id'    => $orderLocationProduct->orderLocations->provider_id,
                'message'       => "O motorista concluiu a locação do item ".$orderLocationProduct->product->code.".",
                'url'           => "/painel/locadas/",
                'color'         => "#6015CF"
            ]);
        }

        if ( $orderLocationProduct->status !== $orderLocationProduct->getOriginal('status') && $orderLocationProduct->status === 'AR' ) {
            Notification::create([
                'user_from_id'  => $orderLocationProduct->orderLocations->client_id,
                'user_to_id'    => $orderLocationProduct->orderLocations->provider_id,
                'message'       => "Pedido de retirada emitido para o item ".$orderLocationProduct->product->code." do pedido#".$orderLocationProduct->order_locations_id.".",
                'url'           => "/painel/aguardandoretirada/",
                'color'         => "#6015CF"
            ]);
        }

        if (
            $orderLocationProduct->withdraw_driver_id !== $orderLocationProduct->getOriginal('withdraw_driver_id') ||
            $orderLocationProduct->delivery_withdrawl_date !== $orderLocationProduct->getOriginal('delivery_withdrawl_date') ||
            $orderLocationProduct->type_destination !== $orderLocationProduct->getOriginal('type_destination')
        ) {
            Notification::create([
                'user_from_id'  => $orderLocationProduct->orderLocations->provider_id,
                'user_to_id'    => $orderLocationProduct->withdraw_driver_id,
                'message'       => "Nova retirada agendada para o dia ".date('d/m/Y', strtotime($orderLocationProduct->delivery_withdrawl_date)).". Produto ".$orderLocationProduct->product->code,
                'url'           => "/painel/retiradasagendadas",
                'color'         => "#6015CF"
            ]);
            Notification::create([
                'user_from_id'  => $orderLocationProduct->orderLocations->provider_id,
                'user_to_id'    => $orderLocationProduct->orderLocations->client_id,
                'message'       => "A entrega do item ".$orderLocationProduct->product->code.", referente ao pedido #".$orderLocationProduct->order_locations_id.", foi agendada para o dia ".date('d/m/Y', strtotime($orderLocationProduct->delivery_withdrawl_date)).".",
                'url'           => "/painel/minhascacambas/",
                'color'         => "#6015CF"
            ]);
            // if ($orderLocationProduct->type_destination === 'go_to_the_final_destination') {
            //     Notification::create([
            //         'user_from_id'  => $orderLocationProduct->orderLocations->provider_id,
            //         'user_to_id'    => $orderLocationProduct->destination_id,
            //         'message'       => "Fique atento! Uma nova entrega foi agendada para o dia ".date('d/m/Y', strtotime($orderLocationProduct->delivery_withdrawl_date)).", pelo locador ".$orderLocationProduct->orderLocations->provider->name.".",
            //         'url'           => "/painel/",
            //         'color'         => "#6015CF"
            //     ]);
            // }
        }

    }
}
