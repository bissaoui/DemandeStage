<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ecoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ecoles')->insert([
            'nomEcole' => 'EST',
        ]);
        DB::table('ecoles')->insert([
            'nomEcole' => 'LYCEE',
        ]);
        DB::table('ecoles')->insert([
            'nomEcole' => 'ENSA',
        ]);
        DB::table('ecoles')->insert([
            'nomEcole' => 'ENSAM',
        ]);
        DB::table('ecoles')->insert([
            'nomEcole' => 'ESI',
        ]);
        DB::table('ecoles')->insert([
            'nomEcole' => 'ENSET',
        ]);
        DB::table('ecoles')->insert([
            'nomEcole' => 'EMSI',
        ]);
        DB::table('ecoles')->insert([
            'nomEcole' => 'IGA',
        ]);
        DB::table('ecoles')->insert([
            'nomEcole' => 'OFPPT',
        ]);
        DB::table('ecoles')->insert([
            'nomEcole' => 'ENSEM',
        ]);
        DB::table('ecoles')->insert([
            'nomEcole' => 'ENSIAS',
        ]);
        DB::table('ecoles')->insert([
            'nomEcole' => 'EHTP',
        ]);
        DB::table('ecoles')->insert([
            'nomEcole' => 'EMI',
        ]);
        DB::table('ecoles')->insert([
            'nomEcole' => 'ENS',
        ]);
        DB::table('ecoles')->insert([
            'nomEcole' => 'Faculté',
        ]);
        DB::table('ecoles')->insert([
            'nomEcole' => 'ESI',
        ]);
    }
}
