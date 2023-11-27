<?php

namespace App\Http\Requests\Api;

class EventSubscriptionRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'kids'   => ['required', 'array'],
            'kids.*' => ['exists:kids,id'],
            'email'  => ['required','email','max:155'],
            'phone'  => ['required' , 'digits:9'],
            'code'   => ['nullable','exists:offers,code'],
        ];
    }
}
