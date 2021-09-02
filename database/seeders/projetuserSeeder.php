<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class projetuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('projusers')->insert([
            'user_id' => "1",
            'projet_id' => "2",
            'updated_at' => now(),
            'created_at' => now(),
            'dateRejoindre' => "2021-09-01",
        ]);
        DB::table('projusers')->insert([
            'user_id' => "4",
            'projet_id' => "2",
            'updated_at' => now(),
            'created_at' => now(),
            'dateRejoindre' => "2021-09-01",
        ]);
        DB::table('projusers')->insert([
            'user_id' => "6",
            'projet_id' => "2",
            'updated_at' => now(),
            'created_at' => now(),
            'dateRejoindre' => "2021-09-01",
        ]);
        DB::table('projusers')->insert([
            'user_id' => "16",
            'projet_id' => "1",
            'updated_at' => now(),
            'created_at' => now(),
            'dateRejoindre' => "2021-09-02",
        ]);
        DB::table('projusers')->insert([
            'user_id' => "11",
            'projet_id' => "1",
            'updated_at' => now(),
            'created_at' => now(),
            'dateRejoindre' => "2021-09-02",
        ]);
        DB::table('projusers')->insert([
            'user_id' => "17",
            'projet_id' => "1",
            'updated_at' => now(),
            'created_at' => now(),
            'dateRejoindre' => "2021-09-02",
        ]);
        DB::table('projusers')->insert([
            'user_id' => "8",
            'projet_id' => "1",
            'updated_at' => now(),
            'created_at' => now(),
            'dateRejoindre' => "2021-09-02",
        ]);
    }
}
