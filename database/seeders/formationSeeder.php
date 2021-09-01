<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class formationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('formations')->insert([
            'nomFormation' => "BAC",
            'abreviation' => "Baccalauréat",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('formations')->insert([
            'nomFormation' => "DEUG",
            'abreviation' => "Le Diplôme d'Études Universitaires Générales",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('formations')->insert([
            'nomFormation' => "DUT",
            'abreviation' => "Le diplôme universitaire de technologie",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('formations')->insert([
            'nomFormation' => "DTS",
            'abreviation' => "Diplôme de Technicien Spécialisé",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('formations')->insert([
            'nomFormation' => "BTS",
            'abreviation' => "Brevet de Technicien Supérieur",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('formations')->insert([
            'nomFormation' => "LP",
            'abreviation' => "Licence professionnelle",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('formations')->insert([
            'nomFormation' => "LF",
            'abreviation' => "Licence fondamentale",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('formations')->insert([
            'nomFormation' => "MS",
            'abreviation' => "Master Spécialisé",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('formations')->insert([
            'nomFormation' => "MP",
            'abreviation' => "Master professionnel",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('formations')->insert([
            'nomFormation' => "MR",
            'abreviation' => "Master de recherche",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('formations')->insert([
            'nomFormation' => "ING",
            'abreviation' => "Ingénieur",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('formations')->insert([
            'nomFormation' => "DOC",
            'abreviation' => "Doctorat",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
