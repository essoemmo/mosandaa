<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'subject_id' =>['nullable','int','exists:subjects,id'],
            'time_from' => ['nullable', 'date_format:h:i A'],
            'time_to' => ['nullable', 'date_format:h:i A']
        ];
    }
}
