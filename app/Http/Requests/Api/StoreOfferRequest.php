<?php

namespace App\Http\Requests\Api;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreOfferRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required','string','max:255'],
            'description' => ['required','string','max:455'],
            'code'  => ['required','string','size:6','unique:offers,code'],
            'discount' => ['required','numeric','min:3'],
            'min_value' => ['required','numeric','min:3'],
            'max_value' => ['required','numeric','min:3'],
            'start_date' => ['required', 'date_format:Y-m-d','after_or_equal:' . Carbon::now()->format('Y-m-d')],
            'end_date' => ['required', 'date_format:Y-m-d','after:start_date'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'start_date' => convert2english($this->start_date),
            'end_date' => convert2english($this->end_date),
        ]);
    }
}
