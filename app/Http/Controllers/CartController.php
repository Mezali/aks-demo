<?php

namespace App\Http\Controllers;

use App\Enums\ProfileTypeEnum;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request): CartResource
    {
        $cart = Cart::where('user_id', $request->user()->id)
            ->where('profile_id', $request->header('Profile'))
            ->where('is_open', true)
            ->first();

        if ($cart == null) {
            $cart = new Cart();
            $cart->client_id = $request->owner->id;
            $cart->user_id = $request->user()->id;
            $cart->profile_id = $request->header('Profile');
            $cart->is_open = true;
        }

        if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::CUSTOMER_EMPLOYEE())) {
            $cart->client_id = $request->owner->id;
        }

        if ($cart->save())
            return new CartResource($cart);
        else {
            return response()->json([
                'message' => 'Erro ao salvar carrinho'
            ], 500);
        }
    }

    public function show(Cart $cart): CartResource
    {
        return new CartResource($cart);
    }

    public function update(Request $request, Cart $cart): CartResource
    {
        $cart->fill($request->all());

        if ($cart->save())
            return new CartResource($cart);
        else {
            return response()->json([
                'message' => 'Erro ao atualizar carrinho'
            ], 500);
        }
    }

    public function destroy(Cart $cart): CartResource
    {
        if (!$cart->is_open) {
            return response()->json([
                'message' => 'Carrinho já finalizado'
            ], 400);
        }

        if ($cart->delete())
            return new CartResource($cart);
        else {
            return response()->json([
                'message' => 'Erro ao deletar carrinho'
            ], 500);
        }
    }
}
