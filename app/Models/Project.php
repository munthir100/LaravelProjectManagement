<?php

namespace App\Models;

use App\Filters\ProjectFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = ProjectFilters::class;
    protected $fillable = [
        'title', 'short_description', 'number_of_team_members', 'deadline',
        'description', 'goals', 'vision', 'priority', 'type', 'progress_percentage', 'budget',
        'status_id', 'account_id', 'parent_id',
    ];

    protected $dates = ['deadline'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function subProjects()
    {
        return $this->hasMany(Project::class, 'parent_id');
    }

    public function parentProject()
    {
        return $this->belongsTo(Project::class, 'parent_id');
    }

    public function updateProgressPercentage()
    {
        $totalProgress = $this->tasks->sum('progress_percentage');

        $totalTasks = $this->tasks->count();
        $averagePercentage = ($totalTasks > 0) ? ($totalProgress / $totalTasks) : 0;

        $this->progress_percentage = $averagePercentage;
        $this->save();
    }
}
