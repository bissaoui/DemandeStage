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
        $this->call([
            socialmediaSeeder::class,
        ]);
        $this->call([
            technologieSeeder::class,
        ]);
        $this->call([
            langueSeeder::class,
        ]);
        $this->call([
            formationSeeder::class,
        ]);
        $this->call([
            projetSeeder::class,
        ]);
        $this->call([
            projetuserSeeder::class,
        ]);
        $this->call([
            projettechSeeder::class,
        ]);
    }
}
