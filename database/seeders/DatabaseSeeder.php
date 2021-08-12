<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $statuses = ['Open', 'Closed', 'In Progress'];
        foreach ($statuses as $status) {
            Status::create(['name' => $status]);
        }
        \App\Models\Category::factory(4)->create();
        \App\Models\Idea::factory(20)->create();
    }
}
