<?php

namespace App\Http\Resources\Api\Address;

use App\Http\Resources\Api\AddressResource as Address;
use App\Http\Resources\Api\CityResource;
use App\Http\Resources\Api\StateResource;
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
            $this->merge(Address::make($this)),
            $this->merge(CityResource::make($this->city)),
            $this->mergeWhen($this->city->state, StateResource::make($this->city->state)),
        ];
    }
}
