<?php

namespace App\Actions\Order;

use Lorisleiva\Actions\Concerns\AsAction;

use App\Enums\Order\{
    OrderStatusEnum,
    PaymentStatusEnum
};
use App\Models\{
    Cart,
    Order
};

class CreateOrder
{
    use AsAction;

    public function handle(Cart $cart, string $billingType): Order
    {
        if ($cart->isEmpty() || $cart->isClosed()) {
            throw new \Exception('Cart is empty or closed');
        }

        $calculatedOrder = CalculateOrder::run($cart);

        $order = new Order();

        $order->total = $calculatedOrder['total'];
        $order->cart_id = $cart->id;
        $order->client_id = $cart->client_id;
        $order->user_id = $cart->user_id;
        $order->provider_id = $cart->user_id;
        $order->status = OrderStatusEnum::CREATED();
        $order->payment_type = $billingType;
        $order->payment_status = PaymentStatusEnum::PENDING();
        $order->splits = json_encode($calculatedOrder['splits']);

        $order = CalculateGatewayTax::run($order);
        $order = CalculatePlatformTax::run($order);
        $order->save();
        $order = CalculateSplits::run($order);

        return $order;
    }
}
