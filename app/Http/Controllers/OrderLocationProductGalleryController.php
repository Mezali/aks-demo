<?php

namespace App\Http\Controllers;

use App\Models\OrderLocationProductGallery;
use Illuminate\Http\Request;

use App\Http\Resources\{
    OrderLocationProductGalleryCollection,
    OrderLocationProductGalleryResource
};

class OrderLocationProductGalleryController extends Controller
{
    public function index(Request $request)
    {
        $result =  OrderLocationProductGallery::filter($request->all())
            ->sort($request->input('sort', 'id'))
            ->paginate($request->input('per_page', 10), ['*'], 'page', $request->input('page', 1));
        return new OrderLocationProductGalleryCollection($result);
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_location_product_id' => 'required|integer|exists:order_location_products,id',
            'url' => 'required|string',
            'status' => 'required|string'
        ]);

        $item = new OrderLocationProductGallery();
        $item->order_location_product_id = $request->input('order_location_product_id');
        $item->url = $request->input('url');
        $item->status = $request->input('status');
        if ($item->save()) {
            return new OrderLocationProductGalleryResource($item);
        } else {
            return response()->json(['message' => 'Failed to create item'], 500);
        }
    }
}
