<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'description' => ['required','string','max:455'],
            'attachments' =>['array'],
            'attachments.*' => ['exists:attachments,id'],
        ];
    }
}
