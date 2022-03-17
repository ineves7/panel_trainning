<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectorResource extends JsonResource
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
            'unit_id' => $this->unit_id,
            'name' => $this->name,
            'sigla' => $this->sigla,
            'responsible' => $this->responsible,
            'phone' => $this->phone,
            'email' => $this->email,
        ];
    }
}