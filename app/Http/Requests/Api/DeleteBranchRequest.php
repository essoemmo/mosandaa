<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class DeleteBranchRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required','exists:branches,id'],
        ];
    }
}
