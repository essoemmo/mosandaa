<?php

namespace App\Http\Requests\Api;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DaycareCompleteInfoRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'daycare_type' => ['required', 'in:1,2'],
            'daycare_name' => ['required', 'string', 'max:55'],
            'end_commercial_date' => ['required', 'date_format:Y-m-d', 'after_or_equal:' . Carbon::now()->format('Y-m-d')],

            'city_id' => ['required_if:type,2', 'exists:cities,id'],
            'state_id' => ['required_if:type,2', 'exists:states,id', Rule::exists('states', 'id')->where(function ($query) {
                return $query->where('city_id', $this->city_id);
            })],
            'lat' => ['required_if:type,2', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'lang' => ['required_if:type,2', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'address' => ['required_if:type,2', 'string', 'max:255'],
            'rooms_count' => ['required_if:type,2', 'int','nullable'],
            'teacher_count' => ['required_if:type,2', 'int','nullable'],
            'attachments' => ['array'],
            'attachments.*' => ['exists:attachments,id'],

            'branches' => ['array'],
            'branches.*.city_id'    => ['required_if:type,1','exists:cities,id'],
            'branches.*.state_id'   => ['required_if:type,1','exists:states,id'],
            'branches.*.lat'  => ['required_if:type,1', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'branches.*.lang' => ['required_if:type,1', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'branches.*.address' => ['required_if:type,1','string','max:255'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'end_commercial_date' => $this->end_commercial_date ? convert2english($this->end_commercial_date): null,
            'rooms_count' => $this->rooms_count ? convert2english($this->rooms_count) : null,
            'teacher_count' => $this->teacher_count ? convert2english($this->teacher_count) : null,

        ]);
    }
}
