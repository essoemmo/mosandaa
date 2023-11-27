<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AddCommentRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'report_id' => ['required', 'int','exists:reports,id'],
            'review' => ['required', 'string','max:500'],
        ];
    }
}
