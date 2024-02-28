<?php

namespace App\Models;

use App\Filters\TaskFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory,Filterable;

    protected string $default_filters = TaskFilters::class;
    protected $fillable = [
        'title', 'description', 'priority', 'progress_percentage', 'deadline', 'status_id', 'project_id',
    ];
    protected $dates = ['deadline'];
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
