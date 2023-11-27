<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'phone' => ['required', 'digits:9','exists:users,phone'],
            'password' => ['required','min:8'],
            'fcm_token' => ['required','string'],
        ];
    }
}
