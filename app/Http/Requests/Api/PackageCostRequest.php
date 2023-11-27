<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PackageCostRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'services' => ['array'],
            'services.*' => ['exists:daycare_services,id'],
            'package_id' => ['required','numeric','exists:packages,id'],
            'code' => ['exists:offers,code'],
            'days_count' => ['numeric'],
            'kids_count' => ['required','numeric']
        ];
    }
}
