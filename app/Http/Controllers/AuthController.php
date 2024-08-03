<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\{
    RegisterUser,
    UserLoginRequest
};
use App\Http\Resources\Auth\{
    Me\UserResource,
    MeResource
};
use App\Models\{
    Address,
    Profile,
    User
};
use Illuminate\Http\{
    JsonResponse,
    Request
};
use Illuminate\Support\Facades\{
    Auth,
    Hash
};
use Log;
use Point;

class AuthController extends Controller
{
    /**
     * @unauthenticated
     */
    public function register(RegisterUser $request): JsonResponse
    {
        $user = User::updateOrCreate([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'secondary_email' => $request->secondary_email,
            'secondary_phone' => $request->secondary_phone,
            'document_type' => $request->document_type,
            'document_number' => $request->document_number,
            'password' => Hash::make('padrao123'),
            'fantasy_name' => $request->fantasy_name,
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
            "latitude" => $request->latitude,
            "longitude" => $request->longitude,
            'point' => new Point($request->latitude, $request->longitude),
        ]);

        $profile_type = "";
        switch ($request->type) {
            case 'customer':
                $profile_type = $request->document_type === 'cpf' ? 'customer' : 'legal_customer';
                break;
            case 'seller':
                $profile_type = $request->document_type === 'cpf' ? 'seller' : 'legal_seller';
                break;
            case 'final_destination':
                $profile_type = $request->document_type === 'cpf' ? 'final_destination' : 'legal_final_destination';
                break;
            default:
                # code...
                break;
        }

        Profile::create([
            'user_id' => $user->id,
            'type' => $profile_type
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token], 201);
    }

    /**
     * @unauthenticated
     */
    public function login(UserLoginRequest $request): JsonResponse
    {

        Log::info('Login attempt', [
            'document_number' => $request->document_number,
            'password' => $request->password,
        ]);
        if (!Auth::attempt(['document_number' => str_replace(['.', '-', '/'], '', $request->document_number), 'password' => $request->password])) {
            return response()->json([
                'message' => 'Usuário ou senha inválidos',
            ], 401);
        }

        $user = User::where('document_number', str_replace(['.', '-', '/'], '', $request->document_number))->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out'], 200);
    }

    public function me(Request $request): MeResource
    {
        if (!$request->user()) {
            abort(401);
        }

        return new MeResource(Auth::user());
    }

    public function verify(Request $request): JsonResponse
    {
        $profile = Profile::where('user_id', $request->user()->id)->where('id', $request->header('Profile'))->firstOrFail();

        return response()->json($profile, 200);
    }

    public function changePassword(Request $request): JsonResponse
    {
        $request->validate([
            'old_password' => 'required|string|min:6',
            'password' => 'required|string|min:6',
        ]);

        $user = $request->user();

        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['message' => 'Invalid old password'], 400);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['message' => 'Password changed successfully'], 200);
    }
}
