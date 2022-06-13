<?php

namespace Database\Seeders;

use CreateNotesTable;
use CreateUsersTable;
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
        $this->call(CreateNotesSeeder::class);
        $this->call(CreateUsersSeeder::class);
        $this->call(CreateFoldersSeeder::class);
        $this->call(CreateCommentsSeeder::class);
    }
}
