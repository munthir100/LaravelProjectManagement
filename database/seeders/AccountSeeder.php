<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
use App\Models\Project;
use App\Models\Task;

class AccountSeeder extends Seeder
{
    public function run()
    {
        // Create 20 accounts
        $accounts = Account::factory()->count(20)->create();

        // Iterate through each account
        $accounts->each(function ($account) {
            // Create a random number of projects between 0 and 11
            $projects = Project::factory()->count(rand(0, 11))->create(['account_id' => $account->id]);

            // Iterate through each project
            $projects->each(function ($project) {
                // Create a random number of tasks between 0 and 20
                Task::factory()->count(rand(0, 20))->create(['project_id' => $project->id]);

                // Assign a random parent project to some projects
                if (rand(0, 1) == 1) {
                    $project->update(['parent_id' => Project::inRandomOrder()->first()->id]);
                }
            });
        });
    }
}
