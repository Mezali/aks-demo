<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartProductCollection;
use App\Http\Resources\CartProductResource;
use Illuminate\Http\Request;

use App\Models\{
    Cart,
    CartProduct,
    CartProductResidue
};

class CartProductController extends Controller
{
    public function index(Request $request)
    {
        $cart = Cart::where('user_id', $request->user()->id)
            ->where('profile_id', $request->header('Profile'))
            ->where('is_open', true)
            ->first();

        if ($cart == null) {
            return response()->json([
                'message' => 'Carrinho não encontrado'
            ], 404);
        }

        return new CartProductCollection($cart->products);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:stationary_bucket_groups,id',
            'quantity' => 'required|integer|min:1',
            'days' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'address_id' => 'required|integer|exists:addresses,id',
            'type_local' => 'required|string|size:1'

        ]);

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
            $cart->save();
        }

        if ($cart == null) {
            return response()->json([
                'message' => 'Carrinho não encontrado'
            ], 404);
        }

        $cartProduct = new CartProduct();
        $cartProduct->cart_id = $cart->id;
        $cartProduct->productable_type = 'App\Models\StationaryBucketGroup';
        $cartProduct->productable_id = $request->product_id;
        $cartProduct->quantity = $request->quantity;
        $cartProduct->days = $request->days;
        $cartProduct->price = $request->price;
        $cartProduct->address_id = $request->address_id;
        $cartProduct->type_local = $request->type_local;

        if ($cartProduct->save()) {

            $residues = explode(',', $request->residues);
            if (count($residues) > 0) {
                foreach ($residues as $residue) {
                    CartProductResidue::updateOrCreate([
                        'cart_product_id' => $cartProduct->id,
                        'residue_id' => $residue
                    ]);
                }
            }

            return response()->json([
                'message' => 'Produto adicionado ao carrinho'
            ]);
        } else {
            return response()->json([
                'message' => 'Erro ao adicionar produto ao carrinho'
            ], 500);
        }
    }

    public function show(CartProduct $cartProduct)
    {
        ds($cartProduct);
        return new CartProductResource($cartProduct);
    }

    public function update(Request $request, CartProduct $cartProduct): CartProductResource
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
            $cart->save();
        }

        if ($cart == null) {
            return response()->json([
                'message' => 'Carrinho não encontrado'
            ], 404);
        }

        $cartProduct->fill($request->all());

        $residues = explode(',', $request->residues);
        if (count($residues) > 0) {
            foreach ($residues as $residue) {
                CartProductResidue::where([
                    'cart_product_id' => $cartProduct->id,
                ])->delete();
            }
            foreach ($residues as $residue) {
                CartProductResidue::updateOrCreate([
                    'cart_product_id' => $cartProduct->id,
                    'residue_id' => $residue
                ]);
            }
        }

        if ($cartProduct->save()) {
            return new CartProductResource($cartProduct);
        } else {
            return response()->json(['message' => 'Error updating Group'], 500);
        }

    }

    public function destroy(CartProduct $cartProduct)
    {
        if ($cartProduct->delete()) {
            return response()->json(['message' => 'Cart product deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Cart product could not be deleted'], 500);
        }
    }
}
