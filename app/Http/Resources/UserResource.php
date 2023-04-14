<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'name'        => $this->name,
            'national_id' => $this->national_id,
            'status'      => $this->status,
            'date_hired'  => $this->date_hired,
            'phone'       => $this->phone
        ];
    }
}
