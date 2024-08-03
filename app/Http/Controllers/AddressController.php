<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use MatanYadaev\EloquentSpatial\Enums\Srid;
use MatanYadaev\EloquentSpatial\Objects\Point;

use App\Http\Requests\Address\{
    DestroyRequest,
    IndexRequest,
    ShowRequest,
    StoreRequest,
    UpdateRequest
};
use App\Http\Resources\{
    AddressCollection,
    AddressResource
};

class AddressController extends Controller
{
    /**
     * Index
     */
    public function index(IndexRequest $request): AddressCollection
    {
        $request->merge(['user_id' => $request->owner->id]);

        $address = Address::filter($request->all())
            ->sort($request->input('sort', 'id'))
            ->paginate($request->input('per_page', 10), ['*'], 'page', $request->input('page', 1));
        return new AddressCollection($address);
    }

    /**
     * Store
     */
    public function store(StoreRequest $request): AddressResource
    {

        $address = new Address();
        $address->fill([
            'user_id' => $request->owner->id,
            'active' => 1,
            "name" => 'Meu endereço',
            "city_id" => $request->city_id,
            "street" => $request->street,
            "number" => $request->number,
            "complement" => $request->complement,
            "district" => $request->district,
            "zip_code" => $request->zip_code,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            "location" => new Point($request->latitude, $request->longitude, Srid::WGS84->value),
        ]);
        if ($address->save()) {
            return new AddressResource($address);
        } else {
            return response()->json(['message' => 'Error creating address'], 500);
        }

        return new AddressResource($address);
    }
    /**
     * Show by ID    
     */
    public function show(ShowRequest $request, Address $address): AddressResource
    {
        return new AddressResource($address);
    }

    /**
     * Update 
     */
    public function update(Request $request, Address $address): AddressResource
    {
        
        if ($request->has('city_id')) {
            $address->city_id = $request->city_id;
        }
        if ($request->has('street')) {
            $address->street = $request->street;
        }
        if ($request->has('number')) {
            $address->number = $request->number;
        }
        if ($request->has('complement')) {
            $address->complement = $request->complement;
        }
        if ($request->has('district')) {
            $address->district = $request->district;
        }
        if ($request->has('zip_code')) {
            $address->zip_code = $request->zip_code;
        }
        if ($request->has('latitude') && $request->has('longitude')) {
            $point = new Point($request->latitude, $request->longitude, Srid::WGS84->value);         
            $address->location = $point;
        }
        if ($request->has('receiver_name')) {
            $address->receiver_name = $request->receiver_name;
        }
        if ($request->has('receiver_document_number')) {
            $address->receiver_document_number = $request->receiver_document_number;
        }
        if ($request->has('receiver_phone')) {
            $address->receiver_phone = $request->receiver_phone;
        }
        if ($request->has('receiver_email')) {
            $address->receiver_email = $request->receiver_email;
        }
        if ($request->has('default')) {
            Address::where('user_id', $address->user_id)->update(['default' => false]);
            $address->default = $request->default;
        }
        if ($address->save()) {
            return new AddressResource($address);
        } else {
            return response()->json(['message' => 'Error updating address'], 500);
        }
    }

    /**
     * Delete
     *
     * @param [type] $id
     * @return void
     */
    public function destroy(DestroyRequest $request, Address $address)
    {
        if ($address->delete()) {
            return response()->json(['message' => 'Address deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Error deleting address'], 500);
        }
    }
}
