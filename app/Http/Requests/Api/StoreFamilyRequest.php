<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreFamilyRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name'   => ['required','string','max:55'],
            'phone'  => ['required' , 'digits:9' ,'unique:family_members'],
            'id_number' => ['required','digits:10'],
            'birth_date' => ['nullable','date_format:Y-m-d'],
            'relative_id' => ['required','exists:relatives,id'],
            'job' => ['required_if:relative_id,1,2','string'],
            'attachments' =>['array'],
            'attachments.*' => ['exists:attachments,id'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'birth_date' => $this->birth_date ? convert2english($this->birth_date) : null,
        ]);
    }
}
