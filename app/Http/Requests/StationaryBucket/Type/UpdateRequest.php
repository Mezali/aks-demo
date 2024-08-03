<?php

namespace App\Http\Requests\StationaryBucket\Type;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => ['string'],
            'm3' => ['numeric'],
            'letter_a' => ['numeric'],
            'letter_b' => ['numeric'],
            'letter_c' => ['numeric'],
            'letter_d' => ['numeric'],
            'letter_e' => ['numeric'],
            'letter_f' => ['numeric'],
            'photo' => ['string'],
            'recover' => ['string'],
        ];
    }
}
