<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreKidRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:55'],
            'phone' => ['required', 'digits:9', 'unique:kids'],
            'sex' => ['required', 'in:1,2'],
            'id_number' => ['required', 'digits:10', 'unique:kids'],
            'birth_date' => ['required', 'date_format:Y-m-d'],
            'height' => ['required', 'numeric'],
            'weight' => ['required', 'numeric'],
            'blood_type_id' => ['required', 'exists:blood_types,id'],
            'attachments' => ['array'],
            'attachments.*' => ['exists:attachments,id'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'birth_date' => $this->birth_date ? convert2english($this->birth_date) : null,
            'id_number' => $this->id_number ? convert2english($this->id_number) : null,
            'height' => $this->height ? convert2english($this->height) : null,
            'weight' => $this->weight ? convert2english($this->weight) : null,
        ]);
    }
}
