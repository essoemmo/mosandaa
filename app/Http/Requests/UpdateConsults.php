<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConsults extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_ar' => [ 'string', 'max:255'], 
            'name_en' => [ 'string', 'max:255'],
            'position_ar' => [ 'string', 'max:255'],
            'position_en' => [ 'string', 'max:255'],
            'title_ar' => [ 'string', 'max:255'],
            'title_en' => [ 'string', 'max:255'],
            'image' => [ 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'description_ar' => [ 'string', 'max:255'],
            'description_en' => [ 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
        ];
    }
}
