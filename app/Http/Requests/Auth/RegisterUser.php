<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['', 'string', 'min:6',],
            'document_number' => ['', 'string', 'max:25'],
            'type' => [
                'required', 'string', 'max:30',
                Rule::in([
                    'customer',
                    'seller',
                    'final_destination',
                ])
            ],
            'cnh' => ['string', 'max:20', 'required_if:profile_type,seller_driver'],
            'cnh_expiration_date' => ['date', 'required_if:profile_type,seller_driver'],

        ];
    }
}
