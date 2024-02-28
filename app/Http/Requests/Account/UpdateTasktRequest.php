<?php

namespace App\Http\Requests\Account;

use App\Rules\TaskProgressPercentageRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTasktRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'priority' => 'sometimes|integer',
            'progress_percentage' => ['sometimes', 'integer', 'min:0', 'max:100', new TaskProgressPercentageRule],
            'deadline' => 'sometimes|date',
            'status_id' => ['sometimes', 'exists:statuses,id', new TaskProgressPercentageRule],
            'project_id' => 'sometimes|exists:projects,id',
        ];
    }
}
