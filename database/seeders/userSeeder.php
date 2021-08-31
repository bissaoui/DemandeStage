<?php

namespace Database\Seeders;

use App\Models\Ville;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        //
        for ($i = 0; $i < 20; $i++) {
            DB::table('users')->insert([
                'name' => $faker->lastName,
                'prenom' => $faker->firstName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('yassine123'),
                'ddn' => $faker->date($format = 'y-m-d', $max = '2004', $min = '1980'),
                'adresse' => $faker->address,
                'photoUser' => rand(1, 13) . '.jpg',
                'civilite' => $faker->randomElement(['male','female']),
                'telephone' => $faker->phoneNumber,
                'ville_id' => $faker->randomElement(Ville::pluck('id')->all()),
                'is_admin' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
