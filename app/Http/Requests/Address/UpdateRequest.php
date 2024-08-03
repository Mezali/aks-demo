<?php

namespace App\Http\Requests\Address;

use App\Models\Address;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {

        // if ($this->address->user_id == $this->user()->id) {
        //     return true;
        // }
        // return false;
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
            'city_id' => ['sometimes', 'integer'],
            'street' => ['sometimes', 'string'],
            'number' => ['sometimes', 'string'],
            'complement' => ['nullable', 'string'],
            'district' => ['sometimes', 'string'],
            'zip_code' => ['sometimes', 'string'],
            'latitude' => ['nullable', 'string'],
            'longitude' => ['nullable', 'string'],
            'default' => ['sometimes', 'boolean'],
        ];
    }
}
