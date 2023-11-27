<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AddReportRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'kids' => ['required', 'array'],
            'kids.*' => ['exists:kids,id'],
        ];
    }
}
