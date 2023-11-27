<?php

namespace App\Http\Requests\Api;


class CostEventRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'kids' => ['required', 'array'],
            'kids.*' => ['exists:kids,id'],
            'code' => ['exists:offers,code'],
        ];
    }
}
