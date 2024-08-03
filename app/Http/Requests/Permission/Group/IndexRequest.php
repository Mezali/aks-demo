<?php

namespace App\Http\Requests\Permission\Group;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search' => 'string| nullable',
            'page' => 'integer',
        ];
    }
}
