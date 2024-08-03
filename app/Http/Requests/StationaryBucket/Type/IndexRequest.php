<?php

namespace App\Http\Requests\StationaryBucket\Type;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'page' => 'integer',
            'search' => 'string|nullable',
            //com volume igual ou maior
            'm3' => 'integer|nullable',
            'id' => 'integer|nullable',
            'sort' => 'string|nullable',
            'per_page' => 'integer|nullable',
            'type' => 'integer|nullable',
            'id' => 'integer|nullable',

        ];
    }
}
