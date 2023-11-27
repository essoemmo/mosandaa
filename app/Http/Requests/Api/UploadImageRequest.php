<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UploadImageRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
             'id'    => ['integer','exists:attachments,id'],
             'title' => ['required','string','max:55'],
             'image' => ['required', 'mimes:png,jpg,jpeg,webp', 'max:2048']
        ];
    }
}
