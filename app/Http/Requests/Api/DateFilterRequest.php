<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class DateFilterRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'start_date' => ['date','format:Y-m-d'],
            'end_date' => ['date','format:Y-m-d'],
        ];
    }
}
