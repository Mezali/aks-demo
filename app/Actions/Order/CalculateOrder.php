<?php

namespace App\Actions\Order;

use App\Models\Cart;
use Lorisleiva\Actions\Concerns\AsAction;

class CalculateOrder
{
    use AsAction;

    public function handle(Cart $cart)
    {
        if ($cart->isEmpty() || $cart->isClosed()) {
            throw new \Exception('Cart is empty or closed');
        }

        $total = 0;
        $splits = [];        
        foreach ($cart->products as $product) {
            $total += $product->quantity * $product->price;            
            $provider = $product->productable->provider;
            if (!isset($splits[$provider->id])) {
                $splits[$provider->id] = ['id' => $provider->id, 'total' => 0];
            }
            $splits[$provider->id]['total'] += $product->quantity * $product->price;            
        }

        foreach ($splits as $key => $split) {
            $splits[$key]['percentage'] = $split['total'] / $total;
        }

        return [
            'total' => $total,
            'splits' => $splits
        ];
    }
}
