<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreComplainRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'daycare_id' =>['required','exists:users,id'],
            'title' => ['required','string','max:255'],
            'description' => ['required','string','max:455'],
            'attachments' =>['array'],
            'attachments.*' => ['exists:attachments,id'],
        ];
    }
}
