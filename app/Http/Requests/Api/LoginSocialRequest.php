<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class LoginSocialRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','string'],
            'email'  => ['email','max:155','unique:users,email'],
            'fcm_token' => ['required', 'string'],
            'provider_id' => ['required','string'],
            'social_token' => ['required','string'],
        ];
    }
}

