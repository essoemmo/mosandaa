<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreService extends FormRequest
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
            'name' =>['required','string'],
            'organization_name' =>['required','string'],
            'email' =>['required','email'], 
            'phone' =>['required','string'],

            'activity_type'=>['required','string'],
            'legal_entity'=>['required','string'], 
            'service_location'=>['required','string'],
            'request_service'=>['required','string'],
            
            'price_offer'=>['nullable','string'], 
            'service_location_desc'=>['nullable','string'], 
            'activity_type_desc'=>['nullable','string'], 

            'commercial_register'=>['nullable', 'mimes:pdf'],
            'found_contract'=>['nullable', 'mimes:pdf'], 
            'financial'=>['nullable', 'mimes:pdf'], 
            'balance'=>['nullable', 'mimes:pdf'],
        ];
    }
}
