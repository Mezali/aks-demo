<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use MatanYadaev\EloquentSpatial\Objects\Point;

use App\Http\Resources\{
    AddressResource,
    UserCollection,
    UserResource
};
use App\Models\{
    Address,
    Profile,
    User
};
use MatanYadaev\EloquentSpatial\Enums\Srid;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): UserCollection
    {
        $request->validate([
            'search' => 'string|nullable',
            'per_page' => 'integer|nullable',
            'page' => 'integer|nullable',
            'sort' => 'string|nullable',
        ]);

        $result = User::filter($request->all())
            ->sort($request->input('sort', 'name'))
            ->paginate($request->input('per_page', 10), ['*'], 'page', $request->input('page', 1));

        return new UserCollection($result);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterUser $request): UserResource
    {
        $user = User::updateOrCreate([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'secondary_email' => $request->secondary_email,
            'secondary_phone' => $request->secondary_phone,
            'document_number' =>  str_replace(['.', '-', '/'], '', $request->document_number),
            'document_type' => $request->document_type,
            'password' => Hash::make('padrao@123'),
            'fantasy_name' => $request->fantasy_name,
            'cnh' => $request->cnh,
            'cnh_expiration_date' => $request->cnh_expiration_date,
            'state_registration' => $request->state_registration,
            'municipal_registration' => $request->municipal_registration,
            'responsible_name' => $request->responsible_name,
            'responsible_document' => $request->responsible_document,
            'responsible_office' => $request->responsible_office,
            'responsible_departament' => $request->responsible_departament,
            'responsible_phone' => $request->responsible_phone,
            'responsible_email' => $request->responsible_email,
            'responsible_secondary_phone' => $request->responsible_secondary_phone,
            'responsible_secondary_email' => $request->responsible_secondary_email,
        ]);

        if (in_array($request->profile_type, ['seller_driver', 'seller'])) {
            $user->cnh = $request->cnh;
            $user->cnh_expiration_date = $request->cnh_expiration_date;
            $user->save();
        }

        if (in_array($request->profile_type, ['seller', 'legal_seller', 'customer', 'legal_customer'])) {
            Address::create([
                'user_id' => $user->id,
                'active' => 1,
                "name" => 'Meu endereço',
                "city_id" => $request->city_id,
                "street" => $request->street,
                "number" => $request->number,
                "complement" => $request->complement,
                "district" => $request->district,
                "zip_code" => $request->zip_code,
                'point' => new Point($request->latitude, $request->longitude),
            ]);
        }

        if (in_array($request->profile_type, ['customer_employee', 'seller_employee', 'seller_driver', 'admin_employee'])) {
            Profile::create([
                'user_id' => $user->id,
                'type' => $request->profile_type,
                'company_id' => $request->owner->id,
                'permissions' => $request->permission
            ]);
        } else {
            Profile::create([
                'user_id' => $user->id,
                'type' => $request->profile_type,
            ]);
        }

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if ($request->has('name')) $user->name = $request->name;
        if ($request->has('description')) $user->description = $request->description;
        if ($request->has('email')) $user->email = $request->email;
        if ($request->has('secondary_email')) $user->secondary_email = $request->secondary_email;
        if ($request->has('phone')) $user->phone = $request->phone;
        if ($request->has('secondary_phone')) $user->secondary_phone = $request->secondary_phone;
        if ($request->has('photo')) $user->photo = $request->photo;
        if ($request->has('cnh')) $user->cnh = $request->cnh;
        if ($request->has('cnh_expiration_date')) $user->cnh_expiration_date = $request->cnh_expiration_date;
        if ($request->has('fantasy_name')) $user->fantasy_name = $request->fantasy_name;
        if ($request->has('state_registration')) $user->state_registration = $request->state_registration;
        if ($request->has('municipal_registration')) $user->municipal_registration = $request->municipal_registration;
        if ($request->has('responsible_name')) $user->responsible_name = $request->responsible_name;
        if ($request->has('responsible_document')) $user->responsible_document = $request->responsible_document;
        if ($request->has('responsible_office')) $user->responsible_office = $request->responsible_office;
        if ($request->has('responsible_departament')) $user->responsible_departament = $request->responsible_departament;
        if ($request->has('responsible_phone')) $user->responsible_phone = $request->responsible_phone;
        if ($request->has('responsible_email')) $user->responsible_email = $request->responsible_email;
        if ($request->has('responsible_secondary_phone')) $user->responsible_secondary_phone = $request->responsible_secondary_phone;
        if ($request->has('responsible_secondary_email')) $user->responsible_secondary_email = $request->responsible_secondary_email;
        if ($request->recover) $user->restore();

        if (in_array($request->profile_type, ['seller', 'legal_seller', 'customer', 'legal_customer'])) {
            
            try {
                Address::where(['user_id' => $user->id, 'active' => 1])->first()->update([
                    'city_id' => $request->city_id,
                    'street' => $request->street,
                    'number' => $request->number,
                    'complement' => $request->complement,
                    'district' => $request->district,
                    'zip_code' => $request->zip_code,
                    'location' => new Point($request->latitude, $request->longitude, Srid::WGS84->value)
                ]);
            } catch (\Throwable $th) {
                Address::create([
                    'active' => 1,
                    'name' => 'Meu endereço',
                    'user_id' => $user->id,
                    'city_id' => $request->city_id,
                    'street' => $request->street,
                    'number' => $request->number,
                    'complement' => $request->complement,
                    'district' => $request->district,
                    'zip_code' => $request->zip_code,
                    'location' => new Point($request->latitude, $request->longitude, Srid::WGS84->value)
                ]);
            }
            
        } else {
            if ($request->has('permission')) {
                $profile = Profile::find(Profile::filter(['userId' => $user->id])->first()->id);
                $profile->permissions = $request->permission;
                $profile->save();
            }
        }

        $user->save();

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return response()->json(['message' => 'User deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'User could not be deleted'], 500);
        }
    }
}
