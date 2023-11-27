<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UserResetPasswordRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'password' => ['required','min:8','confirmed'],
            'email'  => ['required','exists:users,email'],
        ];
    }
}
