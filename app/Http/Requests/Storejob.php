<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storejob extends FormRequest
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
            'job_type' =>   ['nullable','string'], 
            'job_address' =>['nullable','string'], 
            'job_numb' =>['nullable','string'], 
            'job_city' =>['nullable','string'], 
            'name' =>['required','string'], 
            'sex' =>['required','string'], 
            'national' =>['required','string'],
            'birth_date' =>['required','string'], 
            'birth_place' =>['required','string'],
            'region' =>['required','string'],
            'special' =>['required','string'], 
            'certificate' =>['required','string'],
            'graduation_rate' =>['required','string'],
            'graduation_year' =>['required','string'], 
            'Fellowships' =>['nullable','string'],
            'experience' =>['required','string'],
            'experience_year' =>['required','string'],
            'email' =>['required','string'], 
            'phone' =>['required','string'],
            'note' =>['nullable','string']
        ];
    }
}
