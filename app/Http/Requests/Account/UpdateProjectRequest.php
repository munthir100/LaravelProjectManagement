<?php

namespace App\Http\Requests\Account;

use App\Models\Status;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'string|max:255',
            'short_description' => 'required|string|max:100',
            'number_of_team_members' => 'integer|min:1',
            'deadline' => 'date',
            'description' => 'string',
            'goals' => 'string',
            'vision' => 'string',
            'priority' => 'string',
            'type' => 'string',
            'budget' => 'numeric|min:0',
            'status_id' => Rule::in(Status::NEW, Status::CANCELED, Status::IN_PROGRESS, Status::FAILD),
            'parent_id' => 'nullable|exists:projects,id',
        ];
    }
}
