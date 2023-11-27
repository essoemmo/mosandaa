<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdatePasswordRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'old_password' => ['required','min:8'],
            'password'  => ['required','min:8','confirmed'],
        ];
    }
}
