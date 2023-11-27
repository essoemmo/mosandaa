<?php

namespace App\Http\Requests\Api;

use App\Models\Kid;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateKidRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name'   => ['nullable','string','max:55'],
            'id_number' => ['nullable','digits:10',Rule::unique('kids')->ignore($this->kid->id)],
            'phone'    => ['nullable' , 'digits:9' ,Rule::unique('kids')->ignore($this->kid->id)],
            'sex'      => ['nullable','in:1,2'],
            'birth_date' => ['nullable','date_format:Y-m-d'],
            'height' => ['nullable','numeric'],
            'weight' => ['nullable','numeric'],
            'blood_type_id' => ['nullable','exists:blood_types,id'],
            'attachments' =>['array'],
            'attachments.*' => ['exists:attachments,id'],
        ];

    }

    protected function prepareForValidation(): void
    {

        $this->merge([
            'birth_date' => $this->birth_date ? convert2english($this->birth_date) : $this->kid->birth_date,
            'id_number' => $this->id_number ? convert2english($this->id_number) : $this->kid->id_number,
            'height' => $this->height ? convert2english($this->height) : $this->kid->height,
            'weight' => $this->weight ? convert2english($this->weight) : $this->kid->weight,
        ]);
    }
}
