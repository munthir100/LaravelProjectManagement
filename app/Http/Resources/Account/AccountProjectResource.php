<?php

namespace App\Http\Resources\Account;

use App\Http\Resources\StatusResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountProjectResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'short_description' => $this->short_description,
            'number_of_team_members' => $this->number_of_team_members,
            'deadline' => $this->deadline,
            'description' => $this->description,
            'goals' => $this->goals,
            'vision' => $this->vision,
            'priority' => $this->priority,
            'type' => $this->type,
            'progress_percentage' => $this->progress_percentage,
            'budget' => $this->budget,
            'status' => new StatusResource($this->status),
            // Add other fields as needed
        ];
    }
}
