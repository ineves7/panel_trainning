<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CandidateJobResource extends JsonResource
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
            'candidate_id' => $this->candidate_id,
            'institution' => $this->institution,
            'country' => $this->country,
            'job_bond_id' => $this->job_bond_id,
            'role' => $this->role,
            'year_init' => $this->year_init,
            'year_end' => $this->year_end,
            'selectable' => $this->selectable,
            'description' => $this->description,
            'current' => $this->selectable,
        ];
    }
}