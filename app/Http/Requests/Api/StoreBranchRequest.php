<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'branches' => ['array'],
            'branches.*.city_id'    => ['required_if:type,1','exists:cities,id', 'numeric'],
            'branches.*.title'    => ['required_if:type,1', 'string'],
            'branches.*.state_id'   => ['required_if:type,1','exists:states,id', 'numeric'],
            'branches.*.lat'  => ['required_if:type,1', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'branches.*.lang' => ['required_if:type,1', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'branches.*.address' => ['required_if:type,1','string','max:255'],
        ];
    }
}
