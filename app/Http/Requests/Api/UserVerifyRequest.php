<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UserVerifyRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'code'  => ['required', 'numeric','digits:4','exists:users,code']
        ];
    }
}
