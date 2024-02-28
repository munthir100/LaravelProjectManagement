<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Status;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        $status = Status::inRandomOrder()->first(); // Use an existing status

        $parentProject = null;
        $currentMonthStart = Carbon::now()->startOfMonth();
        $previousMonthStart = Carbon::now()->subMonth()->startOfMonth();
        // 50% chance to set a parent project
        if ($this->faker->boolean(50)) {
            $parentProject = Project::inRandomOrder()->first();
        }

        return [
            'title' => $this->faker->realTextBetween(20, 70),
            'short_description' => $this->faker->realTextBetween(80, 100),
            'number_of_team_members' => $this->faker->numberBetween(1, 10),
            'deadline' => $this->faker->dateTimeBetween('+1 week', '+6 months'),
            'description' => $this->faker->realText(),
            'goals' => $this->faker->realText(),
            'vision' => $this->faker->realText(),
            'priority' => $this->faker->numberBetween(1, 5),
            'type' => $this->faker->word,
            'progress_percentage' => $this->faker->numberBetween(0, 100),
            'budget' => $this->faker->randomFloat(2, 1000, 100000),
            'status_id' => $status->id,
            'account_id' => $this->faker->numberBetween(1, 20), // Assuming you have 20 accounts
            'parent_id' => $parentProject ? $parentProject->id : null,
            'created_at' => $this->faker->boolean(70) // 70% chance for previous month
                ? $this->faker->dateTimeBetween($previousMonthStart, $previousMonthStart->copy()->endOfMonth())
                : $this->faker->dateTimeBetween($currentMonthStart, $currentMonthStart->copy()->endOfMonth()),
        ];
    }
}
