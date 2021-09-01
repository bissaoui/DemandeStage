<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class langueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('langues')->insert([
            'nomLangue' => "Arabe",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('langues')->insert([
            'nomLangue' => "Français",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('langues')->insert([
            'nomLangue' => "Anglais",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('langues')->insert([
            'nomLangue' => "Espagnol",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('langues')->insert([
            'nomLangue' => "Portugais",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('langues')->insert([
            'nomLangue' => "Russe",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('langues')->insert([
            'nomLangue' => "Allemand",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('langues')->insert([
            'nomLangue' => "Chinois",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
