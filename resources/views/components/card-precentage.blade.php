<?php

use App\Models\Status;
use Carbon\Carbon;

$progressPercentage = $project->progress_percentage;
$daysDiff = now()->diffInDays(Carbon::parse($project->deadline));

if ($progressPercentage >= 80 && $daysDiff > 30) {
    $progressClass = 'bg-success';
} elseif ($progressPercentage < 50 && $daysDiff <= 10) {
    $progressClass = 'bg-danger';
} elseif ($progressPercentage < 100 && $daysDiff <= 3) {
    $progressClass = 'bg-danger';
} elseif ($project->status_id == Status::CANCELED) {
    $progressClass = 'bg-danger';
} else {
    $progressClass = 'bg-primary';
}
?>

<div class="progress-bar progress-bar-striped {{ $progressClass }}" role="progressbar" style="width:{{ $progressPercentage }}%" aria-valuenow="{{ $progressPercentage }}" aria-valuemin="0" aria-valuemax="{{ $progressPercentage }}">
    <span>
        {{ $progressPercentage }}%
    </span>
</div>