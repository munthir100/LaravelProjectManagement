<?php

namespace App\Rules;

use Closure;
use App\Models\Status;
use Illuminate\Contracts\Validation\ValidationRule;

class TaskProgressPercentageRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $statusId = request()->input('status_id');
        $progressPercentage = $value; // $value contains the progress_percentage value
        if ($statusId == Status::COMPLETED && $progressPercentage !== 100) {
            $fail(__("If the status is completed, the progress percentage must be 100%."));
            return;
        }

        if ($progressPercentage == 100 && $statusId != Status::COMPLETED) {
            $fail(__("If the progress percentage is 100%, the status must be completed."));
            return;
        }
    }
}
