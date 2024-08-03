<?php

namespace App\Http\Requests\StationaryBucket\Group;

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
            'stationary_bucket_type_id' => 'integer|exists:stationary_bucket_types,id',
            'color' => 'string',
            'material' => 'string',
            'weight' => 'numeric',
            'type_lid' => 'string',
            'type_local' => 'string',
            'price_internal' => 'numeric',
            'price_external' => 'numeric',
            'days_internal' => 'integer',
            "days_external" => 'integer'
        ];
    }
}
