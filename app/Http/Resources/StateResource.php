<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StateResource extends JsonResource
{
    public function toArray($request): array
    {
        self::wrap('states');
        return [
            'id' => (int)$this->id,
            'title' => (string)$this->title
        ];
    }
}
