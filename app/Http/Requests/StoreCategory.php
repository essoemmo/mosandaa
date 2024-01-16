<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title_ar' => ['required', 'string', 'max:255'],
            'title_en' => ['required', 'string', 'max:255'],
            'section_id' => ['required', 'string', 'max:255'],
        ];
    }
}
