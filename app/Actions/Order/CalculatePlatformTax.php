<?php

namespace App\Actions\Order;

use App\Actions\Platform\GetPlatformConfig;
use App\Actions\User\GetUserConfig;
use Lorisleiva\Actions\Concerns\AsAction;

use App\Enums\{
    PlatformConfigsEnum,
    UserConfigsEnum
};
use App\Models\Order;

class CalculatePlatformTax
{
    use AsAction;

    public function handle(Order $order): Order
    {
        if (!$order->isEmpty()) {
            throw new \Exception('Order not found');
        }

        $order->platform_cost = round($order->total * GetPlatformConfig::get(PlatformConfigsEnum::PLATFORM_TAX()), 2);

        return $order;
    }
}
