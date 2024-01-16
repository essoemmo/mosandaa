<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategory extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title_ar' => ['string', 'max:255'],
            'title_en' => ['string', 'max:255'],
        ];
    }
}
