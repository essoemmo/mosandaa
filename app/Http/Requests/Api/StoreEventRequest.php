<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required','string','max:255'],
            'description' => ['required','string','max:455'],
            'date' => ['required', 'date_format:Y-m-d'],
            'lat' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'lang' => ['required', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'address' => ['required', 'string', 'max:255'],
            'class_rooms' => ['required','array'],
            'class_rooms.*' => ['exists:class_rooms,id'],
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
