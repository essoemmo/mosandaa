<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class EventCostRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'kids_count' => ['required','int'],
        ];
    }
}
