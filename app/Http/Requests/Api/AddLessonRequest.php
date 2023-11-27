<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddLessonRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'report_id' => ['required','int','exists:reports,id'],
            'lesson_id' => ['required','int','exists:lessons,id'],
        ];
    }
}
