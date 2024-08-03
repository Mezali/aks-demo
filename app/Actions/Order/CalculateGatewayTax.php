<?php

namespace App\Actions\Order;

use App\Actions\Platform\GetPlatformConfig;
use Lorisleiva\Actions\Concerns\AsAction;

use App\Enums\{
    Order\BillingTypeEnum,
    PlatformConfigsEnum
};
use App\Models\{
    Order,
    PlatformConfig
};

class CalculateGatewayTax
{
    use AsAction;

    public function handle(Order $order): Order
    {
        if (!$order->isEmpty()) {
            throw new \Exception('Order not found');
        }

        if ($order->payment_type == BillingTypeEnum::CREDIT_CARD()) {
            $order->gateway_cost =
                round($order->total * GetPlatformConfig::get(PlatformConfigsEnum::CREDIT_CARD_PERCENTAGE_TAX()), 2)
                 + GetPlatformConfig::get(PlatformConfigsEnum::CREDIT_CARD_FIXED_TAX());
        } elseif ($order->payment_type == BillingTypeEnum::PIX()) {
            $order->gateway_cost = GetPlatformConfig::get(PlatformConfigsEnum::PIX_FIXED_TAX());
        } elseif ($order->payment_type == BillingTypeEnum::BANK_SLIP()) {
            $order->gateway_cost = GetPlatformConfig::get(PlatformConfigsEnum::BANK_SLIP_FIXED_TAX());
        }

        return $order;
    }
}
