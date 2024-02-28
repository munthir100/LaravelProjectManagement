<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:100',
            'number_of_team_members' => 'required|integer|min:1',
            'deadline' => 'required|date|after:' . now(),
            'description' => 'string',
            'goals' => 'string',
            'vision' => 'string',
            'priority' => 'string',
            'type' => 'string',
            'budget' => 'numeric|min:0',
            'parent_id' => 'nullable|exists:projects,id',
        ];
    }
}
