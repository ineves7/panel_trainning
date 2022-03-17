<?php

namespace App\Http\Resources\Api\People;

use App\Http\Resources\Api\Address\AddressResource;
use App\Http\Resources\Api\EmailResource;
use App\Http\Resources\Api\PhoneResource;
use App\Http\Resources\Api\SocialMediaResource;
use App\Models\IndividualPeople;
use App\Models\LegalPeople;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PeopleResource extends JsonResource
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
                \App\Http\Resources\Api\PeopleResource::make($this),
            ),
            $this->mergeWhen(
                $this->peopleable_type === IndividualPeople::class,
                \App\Http\Resources\Api\IndividualPeopleResource::make($this->peopleable)
            ),
            $this->mergeWhen(
                $this->peopleable_type === LegalPeople::class,
                \App\Http\Resources\Api\LegalPeopleResource::make($this->peopleable)
            ),
            'phones' => $this->merge(PhoneResource::collection($this->phones))->data,
            'addresses' => $this->merge(AddressResource::collection($this->addresses))->data,
            'emails' => $this->merge(EmailResource::collection($this->emails))->data,
            'social_media' => $this->merge(SocialMediaResource::collection($this->social_media))->data,
        ];
    }
}
