<?php

namespace App\Http\Resources\Api\People;

use App\Http\Resources\Api\Address\AddressResource;
use App\Http\Resources\Api\EmailResource;
use App\Http\Resources\Api\PhoneResource;
use App\Http\Resources\Api\SocialMediaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\PeopleResource;

class IndividualPeopleResource extends JsonResource
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
            $this->merge(
                PeopleResource::make($this->peopleable),
            ),
            $this->merge(
                \App\Http\Resources\Api\IndividualPeopleResource::make($this),
            ),
            'phones' => $this->merge(PhoneResource::collection($this->peopleable->phones))->data,
            'addresses' => $this->merge(AddressResource::collection($this->peopleable->addresses))->data,
            'emails' => $this->merge(EmailResource::collection($this->peopleable->emails))->data,
            'social_media' => $this->merge(SocialMediaResource::collection($this->peopleable->social_media))->data,
        ];
    }
}
