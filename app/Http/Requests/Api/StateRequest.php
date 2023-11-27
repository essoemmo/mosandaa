<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StateRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'city_id'  => ['required','exists:cities,id'],
        ];
    }
}
