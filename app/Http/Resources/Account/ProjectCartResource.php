<?php

namespace App\Http\Resources\Account;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectCartResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'short_description' => $this->short_description,
            'number_of_team_members' => $this->number_of_team_members,
            'deadline' => $this->deadline,
        ];
    }
}
