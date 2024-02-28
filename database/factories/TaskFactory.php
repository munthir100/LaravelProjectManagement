<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Status;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        $status = Status::inRandomOrder()->first(); // Use an existing status
        $project = Project::inRandomOrder()->first(); // Use an existing project

        return [
            'title' => $this->faker->realTextBetween(20, 70),
            'description' => $this->faker->realText(),
            'priority' => $this->faker->numberBetween(1, 5),
            'progress_percentage' => $this->faker->numberBetween(0, 100),
            'deadline' => $this->faker->dateTimeBetween('+1 day', '+1 month')->format('Y-m-d H:i:s'),
            'status_id' => $status->id,
            'project_id' => $project->id,
            // Add other task fields as needed
        ];
    }
}
