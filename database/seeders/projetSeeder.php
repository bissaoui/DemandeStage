<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class projetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('projets')->insert([
            'dateDebutPr' => "2021-08-25",
            'dateFinPr' => "2021-09-15",
            'updated_at' => now(),
            'created_at' => now(),
            'nomProjet' => "Site E-commerce",
            'etatProjet' => "En cours",
        ]);
        DB::table('projets')->insert([
            'dateDebutPr' => "2021-08-27",
            'dateFinPr' => "2021-11-23",
            'updated_at' => now(),
            'created_at' => now(),
            'nomProjet' => "Fil Rouge",
            'etatProjet' => "En cours",
        ]);
    }
}
