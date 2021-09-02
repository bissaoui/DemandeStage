<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class projettechSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //
        DB::table('projteches')->insert([
            'technologie_id' => "1",
            'projet_id' => "1",
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('projteches')->insert([
            'technologie_id' => "2",
            'projet_id' => "1",
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('projteches')->insert([
            'technologie_id' => "3",
            'projet_id' => "1",
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('projteches')->insert([
            'technologie_id' => "4",
            'projet_id' => "1",
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('projteches')->insert([
            'technologie_id' => "2",
            'projet_id' => "2",
            'updated_at' => now(),
            'created_at' => now(),
        ]);
       
        DB::table('projteches')->insert([
            'technologie_id' => "5",
            'projet_id' => "2",
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('projteches')->insert([
            'technologie_id' => "6",
            'projet_id' => "2",
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('projteches')->insert([
            'technologie_id' => "7",
            'projet_id' => "2",
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('projteches')->insert([
            'technologie_id' => "8",
            'projet_id' => "2",
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('projteches')->insert([
            'technologie_id' => "10",
            'projet_id' => "2",
            'updated_at' => now(),
            'created_at' => now(),
        ]);
    }
}
