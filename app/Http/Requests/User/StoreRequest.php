<?php

namespace App\Http\Requests\User;

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
            'document_number' => 'required|string|max:30',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'secondary_email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:30',
            'secondary_phone' => 'nullable|string|max:30',
            'zip_code' => 'required|string|max:30',
            'street' => 'required|string|max:255',
            'number' => 'required|string|max:30',
            'district' => 'required|string|max:255',
            'city_id' => 'required|integer',
            'fantasy_name' => 'nullable|string|max:255',
            'state_registration' => 'nullable|string|max:30',
            'municipal_registration' => 'nullable|string|max:30',
            'responsible_name' => 'nullable|string|max:255',
            'responsible_document' => 'nullable|string|max:30',
            'responsible_office' => 'nullable|string|max:255',
            'responsible_departament' => 'nullable|string|max:255',
            'responsible_phone' => 'nullable|string|max:30',
            'responsible_email' => 'nullable|email|max:255',
            'responsible_secondary_phone' => 'nullable|string|max:30',
            'responsible_secondary_email' => 'nullable|email|max:255',
            'description' => 'nullable|string',
            'cnh' => 'nullable|string|max:30',
        ];
    }
}
