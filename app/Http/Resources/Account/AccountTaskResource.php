<?php

namespace App\Http\Resources\Account;

use App\Http\Resources\StatusResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Account\AccountProjectResource;

class AccountTaskResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'priority' => $this->priority,
            'progress_percentage' => $this->progress_percentage,
            'deadline' => $this->deadline,
            'status' => StatusResource::make($this->whenLoaded('status')),
            'project' => ProjectCartResource::make($this->whenLoaded('project')),
        ];
    }
}
