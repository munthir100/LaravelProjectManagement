<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run()
    {
        // You can customize the names of the statuses as needed
        $statuses = [
            ['name' => 'New'],
            ['name' => 'Completed'],
            ['name' => 'Failed'],
            ['name' => 'Canceled'],
            ['name' => 'in_progress'],
        ];

        // Insert the statuses into the database
        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}
