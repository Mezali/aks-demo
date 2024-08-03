<?php

namespace App\Actions\Order;

use App\Models\Order;
use App\Models\OrderSplit;
use Lorisleiva\Actions\Concerns\AsAction;

class CalculateSplits
{
    use AsAction;

    public function handle(Order $order): Order
    {
        $splits = json_decode($order->splits, true);

        $total = $order->total;
        $totalSplits = 0;

        foreach ($splits as $split) {
            $totalSplits += $split['total'];
        }

        if ($totalSplits != $total) {
            throw new \Exception('Splits total is different from order total');
        }

        foreach ($splits as $key => $split) {
            OrderSplit::create([
                'order_id' => $order->id,
                'user_id' => $split['id'],
                'type' => 'provider',
                'comission' => $order->comission * $split['percentage'],
                'transaction_cost' => $order->gateway_cost * $split['percentage'],
                'platform_cost' => $order->platform_cost * $split['percentage'],
                'total' => $split['total']
            ]);
        }

        return $order;
    }
}
