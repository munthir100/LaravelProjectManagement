<?php

namespace App\Http\Requests\Account;

use App\Rules\TaskProgressPercentageRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateTasktRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|integer',
            'progress_percentage' => ['required', 'integer', 'min:0', 'max:100', new TaskProgressPercentageRule],
            'deadline' => 'required|date|after:' . now(),
            'project_id' => 'required|exists:projects,id',
            'status_id' => ['exists:statuses,id', new TaskProgressPercentageRule],
        ];
    }
}
