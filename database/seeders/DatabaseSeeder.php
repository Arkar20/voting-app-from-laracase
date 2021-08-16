<?php

namespace Database\Seeders;

use App\Models\votes;
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
        $statuses = ['Open', 'Closed', 'In Progress', 'Implemented'];
        foreach ($statuses as $status) {
            Status::create(['name' => $status]);
        }
        \App\Models\Category::factory(4)->create();
        \App\Models\Idea::factory(100)->create();
        // for voting data
        // votes::factory(100)->create();

        // for votes for even user_ids
        foreach (range(1, 20) as $idea_id) {
            foreach (range(1, 100) as $user_id) {
                if ($idea_id % 2 === 0) {
                    votes::create([
                        'idea_id' => $idea_id,
                        'user_id' => $user_id,
                    ]);
                }
            }
        }
    }
}
