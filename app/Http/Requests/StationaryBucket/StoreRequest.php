<?php

namespace App\Http\Requests\StationaryBucket;

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
            'stationary_bucket_group_id' => 'integer|exists:stationary_bucket_groups,id',           
            'code' => 'string|nullable',
            'status' => 'string|nullable',
        ];
    }
}
