<?php

namespace App\Http\Controllers;

use App\Http\Requests\Charge\StoreRequest;
use App\Http\Resources\OrderResource;
use App\Service\Asaas\Facades\Asaas;
use App\Service\Asaas\Requests\ChargeRequest;

use App\Actions\Order\{
    ChargeOrder,
    CreateOrder
};
use App\Enums\Order\{
    OrderStatusEnum,
    PaymentStatusEnum
};
use App\Models\{
    Cart,
    Order,
    Transaction
};

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {        
        $cart = Cart::find($request->cart_id);
        $order = CreateOrder::run($cart, $request->billingType);        
        ChargeOrder::run($order, $request->all());
        $cart->is_open = false;
        $cart->save();
        return new OrderResource($order->refresh());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
}
