<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectCartRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|min:80|max:100',
            'number_of_team_members' => 'required|integer|min:1',
            'deadline' => 'required|date|after:' . now(),
        ];
    }
}

