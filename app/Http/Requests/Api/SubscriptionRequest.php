<?php

namespace App\Http\Requests\Api;

use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubscriptionRequest extends ApiFormRequest
{
    public function rules(): array
    {
        if ($this->subscription_id){
            return [];
        }
        $host_type = Package::find($this->package_id)->host_type?->value;
        return [
            'package_id' => ['required', 'numeric', 'exists:packages,id'],
            'daycare_id' => ['required', 'numeric', 'exists:users,id'],
            'period_id' => ['nullable', 'numeric', 'exists:periods,id'],
            'branch_id' => ['required', 'numeric', 'exists:branches,id'],
            'start_date' => ['required', 'date_format:Y-m-d', 'after_or_equal:' . Carbon::now()->format('Y-m-d')],
            'end_date' => ['nullable', 'date_format:Y-m-d', 'after_or_equal:start_date'],
            'time_from' => ['nullable', Rule::requiredIf($host_type == 2), 'date_format:h:i A'],
            'time_to' => ['nullable', Rule::requiredIf($host_type == 2), 'date_format:h:i A'],
            'days_count' => ['nullable', 'numeric'],
            'kids_count' => ['required', 'numeric'],
            'dates' => ['array'],
            'services' => ['array'],
            'services.*' => ['exists:daycare_services,id'],
            'kids' => ['required', 'array'],
            'kids.*' => ['exists:kids,id'],
            'code' => ['exists:offers,code'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'start_date' => $this->start_date ? convert2english($this->start_date) : null,
            'end_date' => $this->end_date ? convert2english($this->end_date) : null,
            'time_from' => $this->time_from ? convert2english($this->time_from) : null,
            'time_to' => $this->time_to ? convert2english($this->time_to) : null,
        ]);
    }


}
