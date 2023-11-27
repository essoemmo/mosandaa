<?php

namespace App\Http\Requests\Api;

use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOfferRequest extends ApiFormRequest
{

    public function rules(): array
    {
        return [
            'title' => ['nullable','string','max:255'],
            'description' => ['nullable','string','max:455'],
            'discount' => ['nullable','numeric','min:3'],
            'min_value' => ['nullable','numeric','min:3'],
            'max_value' => ['nullable','numeric','min:3'],
            'code'  => ['nullable','size:6',Rule::unique('offers')->ignore($this->offer->id)],
            'start_date' => ['nullable', 'date_format:Y-m-d','after_or_equal:' . Carbon::now()->format('Y-m-d')],
            'end_date' => ['nullable', 'date_format:Y-m-d','after:start_date'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $offer = Offer::find($this->offer->id);
        $this->merge([
            'start_date' => $this->start_date ? convert2english($this->start_date) : $offer->start_date,
            'end_date' => $this->end_date ? convert2english($this->end_date) : $offer->end_date,
        ]);
    }
}
