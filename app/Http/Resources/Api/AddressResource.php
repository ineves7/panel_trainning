<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'street' => $this->street,
            'complement' => $this->complement,
            'number' => $this->number,
            'postal_code' => $this->postal_code,
            'neighborhood' => $this->neighborhood,
        ];
    }
}
