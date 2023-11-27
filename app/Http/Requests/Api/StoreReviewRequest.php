<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'daycare_id' => ['int','exists:users,id'],
            'rate' => ['required','int'],
            'comment' => ['required','string'],
        ];
    }
}
