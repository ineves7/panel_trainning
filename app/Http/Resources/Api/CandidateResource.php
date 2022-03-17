<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CandidateResource extends JsonResource
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
            'people_id' => $this->people_id,
            'academic_education_finished_id' => $this->academic_education_finished_id,
            'academic_education_finished_institution' => $this->academic_education_finished_institution,
            'academic_education_finished_init' => $this->academic_education_finished_init,
            'academic_education_finished_end' => $this->academic_education_finished_end,
            'academic_education_inprogress_id' => $this->academic_education_inprogress_id,
            'academic_education_inprogress_institution' => $this->academic_education_inprogress_institution,
            'academic_education_inprogress_init' => $this->academic_education_inprogress_init,
        ];
    }
}