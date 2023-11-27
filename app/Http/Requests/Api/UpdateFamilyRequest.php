<?php

namespace App\Http\Requests\Api;

use App\Models\FamilyMember;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFamilyRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name'   => ['nullable','string','max:55'],
            'id_number' => ['nullable','digits:10',Rule::unique('family_members')->ignore($this->familyMember->id)],
            'phone'    => ['nullable' , 'digits:9' ,Rule::unique('family_members')->ignore($this->familyMember->id)],
            'relative_id' => ['nullable','exists:relatives,id'],
            'birth_date' => ['nullable','date_format:Y-m-d'],
            'job' => ['nullable','string'],
            'attachments' =>['array'],
            'attachments.*' => ['exists:attachments,id'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $family = FamilyMember::find($this->familyMember->id);
        $this->merge([
            'birth_date' => $this->familyMember->birth_date ? convert2english($this->familyMember->birth_date) : $family->birth_date,
        ]);
    }
}
