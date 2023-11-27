<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UserResetCodeRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'phone'  => ['required' , 'digits:9','exists:users,phone'],
        ];
    }
}
