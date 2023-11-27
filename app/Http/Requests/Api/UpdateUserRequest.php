<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name'   => ['nullable','string','max:55'],
            'email'  => ['nullable','email','max:155',Rule::unique('users')->ignore(auth()->user()->id)],
            'id_number' => ['nullable','digits:10',Rule::unique('users')->ignore(auth()->user()->id)],
            'phone'    => ['nullable' , 'digits:9' ,Rule::unique('users')->ignore(auth()->user()->id)],
            'city_id'  => ['nullable','exists:cities,id'],
            'state_id'  => ['nullable','exists:states,id',Rule::exists('states','id')->where(function ($query) {
                return $query->where('city_id', $this->city_id);
            })],

            'sex'  => ['nullable','in:1,2'],
            'lat'  => ['nullable', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'lang' => ['nullable', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'address' => ['nullable','string','max:255'],
            'job'     => ['nullable','string','max:255'],
            'birth_date' => ['nullable','date_format:Y-m-d'],
            'description' => ['nullable','string','max:455'],
            'socials' => ['array'],
            'attachments' =>['array'],
            'attachments.*' => ['exists:attachments,id'],
        ];
    }

    protected function prepareForValidation():void
    {
        $this->merge([
            'birth_date' => $this->birth_date ? convert2english($this->birth_date) : auth()->user()->birth_date,
            'id_number' => $this->id_number ? convert2english($this->id_number) : auth()->user()->id_number,
        ]);
    }
}
