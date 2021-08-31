<?php

namespace Database\Seeders;

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
        $this->call([
            ecoleSeeder::class,
        ]);
        $this->call([
            villeSeeder::class,
        ]);
        $this->call([
            userSeeder::class,
        ]);
    }
}
