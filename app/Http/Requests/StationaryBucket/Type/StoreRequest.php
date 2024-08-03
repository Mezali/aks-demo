<?php

namespace App\Http\Requests\StationaryBucket\Type;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    { 
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'm3' => ['required', 'numeric'],
            'letter_a' => ['required', 'numeric'],
            'letter_b' => ['required', 'numeric'],
            'letter_c' => ['required', 'numeric'],
            'letter_d' => ['required', 'numeric'],
            'letter_e' => ['required', 'numeric'],
            'letter_f' => ['required', 'numeric'],
            'photo' => ['nullable', 'string'],
        ];
    }
}
