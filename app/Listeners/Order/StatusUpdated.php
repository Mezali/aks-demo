<?php

namespace App\Listeners\Order;

use App\Events\Order\StatusUpdated as OrderStatusUpdated;
use DB;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Enums\{
    Order\OrderStatusEnum,
    OrderLocationStatusEnum
};
use App\Models\{
    CartProduct,
    OrderLocation,
    User
};

class StatusUpdated
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
    public function handle(OrderStatusUpdated $event): void
    {
        $order = $event->order;

        if ($order->status !== $order->getOriginal('status') && $order->status === OrderStatusEnum::CONFIRMED()) {
            $cart_products = $order->getCart()->products;

            /** @var CartProduct $cart_product */
            foreach ($cart_products as $cart_product) {
                /** @var User $provider */
                $provider = $cart_product->productable->provider;
                $providerAddress = $provider->getActiveAddress();
                $address = $cart_product->address;
                $distance = DB::select(
                    "
                    SELECT ST_DISTANCE_SPHERE(
                        ST_GeomFromText(CONCAT('POINT(', ?, ' ', ?, ')')),
                        ST_GeomFromText(CONCAT('POINT(', ?, ' ', ?, ')'))
                    ) AS distance
                ",
                    [
                        $providerAddress->latitude, $providerAddress->longitude,
                        $address->latitude, $address->longitude
                    ]
                )[0]->distance;

                $order_location = OrderLocation::create([
                    'order_id' => $order->id,
                    'client_id' => $order->client_id,
                    'user_id' => $order->user_id,
                    'provider_id' => $provider->id,
                    'cart_product_id' => $cart_product->id,
                    'status' => OrderLocationStatusEnum::AGUARDANDO_CONFIRMACAO(),
                    'days' => $cart_product->days,
                    'price' => $cart_product->price,
                    'quantity' => $cart_product->quantity,
                    'address_id' => $cart_product->address_id,
                    'distance' => $distance,
                    'type_local' => $cart_product->type_local,

                ]);
            }
        }
    }
}
