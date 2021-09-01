<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class technologieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('technologies')->insert([
            'nomTechnologie' => "Angulare",
            'photoTechnologie' => 'angulair.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('technologies')->insert([
            'nomTechnologie' => "Bootstrap",
            'photoTechnologie' => 'bootstrap.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('technologies')->insert([
            'nomTechnologie' => "C++",
            'photoTechnologie' => 'cplus.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('technologies')->insert([
            'nomTechnologie' => "Csharp",
            'photoTechnologie' => 'csharp.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('technologies')->insert([
            'nomTechnologie' => "Css",
            'photoTechnologie' => 'css.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('technologies')->insert([
            'nomTechnologie' => "Html",
            'photoTechnologie' => 'html.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('technologies')->insert([
            'nomTechnologie' => "JS",
            'photoTechnologie' => 'js.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('technologies')->insert([
            'nomTechnologie' => "Laravel",
            'photoTechnologie' => 'laravel.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('technologies')->insert([
            'nomTechnologie' => "MySql",
            'photoTechnologie' => 'mysql.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('technologies')->insert([
            'nomTechnologie' => "Node js",
            'photoTechnologie' => 'nodejs.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('technologies')->insert([
            'nomTechnologie' => "Php",
            'photoTechnologie' => 'php.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('technologies')->insert([
            'nomTechnologie' => "Python",
            'photoTechnologie' => 'python.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('technologies')->insert([
            'nomTechnologie' => "React",
            'photoTechnologie' => 'react.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('technologies')->insert([
            'nomTechnologie' => "Sass",
            'photoTechnologie' => 'sass.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('technologies')->insert([
            'nomTechnologie' => "Type script",
            'photoTechnologie' => 'typescript.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('technologies')->insert([
            'nomTechnologie' => "Vue js",
            'photoTechnologie' => 'vuejs.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('technologies')->insert([
            'nomTechnologie' => "Angulare",
            'photoTechnologie' => 'angulair.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
