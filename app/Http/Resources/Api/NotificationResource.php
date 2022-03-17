<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'type_id' => $this->type_id,
            'status_id' => $this->status_id,
            'sender_id' => $this->sender_id,
            'title' => $this->title,
            'content' => $this->content,
            'scheduled_at' => $this->scheduled_at,
        ];
    }
}