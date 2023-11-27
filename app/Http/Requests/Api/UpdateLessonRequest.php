<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'lesson_id' => ['required','int','exists:lessons,id'],
        ];
    }
}
