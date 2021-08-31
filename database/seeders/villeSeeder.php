<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class villeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('villes')->insert([
            'nomVille' => 'Safi',
        ]);
        DB::table('villes')->insert([
            'nomVille' => 'Casablanca',
        ]);
        DB::table('villes')->insert([
            'nomVille' => 'Eljadida',
        ]);
        DB::table('villes')->insert([
            'nomVille' => 'Marrakech',
        ]);
        DB::table('villes')->insert([
            'nomVille' => 'Tanger',
        ]);
        DB::table('villes')->insert([
            'nomVille' => 'Rabat',
        ]);
        DB::table('villes')->insert([
            'nomVille' => 'Agadir',
        ]);
        DB::table('villes')->insert([
            'nomVille' => 'Fes',
        ]);
        DB::table('villes')->insert([
            'nomVille' => 'Dakhla',
        ]);
        DB::table('villes')->insert([
            'nomVille' => 'Mekness',
        ]);
        DB::table('villes')->insert([
            'nomVille' => 'Kenitra',
        ]);
        DB::table('villes')->insert([
            'nomVille' => 'Khouribga',
        ]);
        DB::table('villes')->insert([
            'nomVille' => 'Houssaima',
        ]);
        DB::table('villes')->insert([
            'nomVille' => 'Beni Melal',
        ]);
        DB::table('villes')->insert([
            'nomVille' => 'Ouarzazat',
        ]);
        DB::table('villes')->insert([
            'nomVille' => 'Taroudant',
        ]);
        DB::table('villes')->insert([
            'nomVille' => 'Tiznit',
        ]);
        DB::table('villes')->insert([
            'nomVille' => 'Ifran',
        ]);
        DB::table('villes')->insert([
            'nomVille' => 'Matril',
        ]);
    }
}
