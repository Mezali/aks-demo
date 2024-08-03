<?php

namespace App\Http\Requests\Charge;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'billingType' => 'required|string|in:BOLETO,CREDIT_CARD,PIX',
            'cart_id' => 'required|integer',
            'holder_name' => 'required|string',
            'card_number' => 'required|string',
            'expiry_month' => 'required|string',
            'expiry_year' => 'required|string',
            'ccv' => 'required|string',
            'use_client_info' => 'required|boolean',
            'email' => 'required_if:use_client_info,false|string',
            'document_number' => 'required_if:use_client_info,false|string',
            'zip_code' => 'required_if:use_client_info,false|string',
            'number' => 'required_if:use_client_info,false|string',
            'phone' => 'required_if:use_client_info,false|string',            
        ];
    }
}
