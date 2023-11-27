<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'title_ar' => ['nullable','string','max:255'],
            'title_en' => ['nullable','string','max:255'],
            'description_ar' => ['nullable','string','max:455'],
            'description_en' => ['nullable','string','max:455'],
            'date' => ['nullable', 'date_format:Y-m-d'],
            'lat' => ['nullable', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'lang' => ['nullable', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'address' => ['nullable', 'string', 'max:255'],
            'attachments' => ['array'],
            'attachments.*' => ['exists:attachments,id'],
            'price' => ['nullable','string']
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([

            'date' => $this->date ? convert2english($this->date) : null,
        ]);
    }
}
