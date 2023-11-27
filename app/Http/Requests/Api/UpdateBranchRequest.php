<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBranchRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['nullable','string'],
            'city_id'    => ['nullable','exists:cities,id', 'numeric'],
            'state_id'   => ['nullable','exists:states,id', 'numeric'],
            'lat'  => ['nullable', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'lang' => ['nullable', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'address' => ['nullable','string','max:255'],
        ];
    }
}
