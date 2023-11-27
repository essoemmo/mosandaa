<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionAcceptRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'subscription_id' => ['required','exists:subscriptions,id'],
            'class_room_id' => ['required','exists:class_rooms,id'],
        ];
    }
}
