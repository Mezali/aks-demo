<?php

namespace App\Http\Requests\StationaryBucket;

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
            /**@query */
            'search' => 'string|nullable',
            'page' => 'integer|nullable',
            'type' => 'integer|nullable',
            'type_lid' => 'integer|nullable',
            'user_id' => 'integer|nullable',
            'id' => 'integer|nullable',

        ];
    }
}
