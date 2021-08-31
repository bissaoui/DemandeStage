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
                'ddn' => $faker->birthday,
                'adresse' => $faker->address,
                'photoUser' => rand(1, 13) . '.jpg',
                'civilite' => $faker->gender,
                'telephone' => $faker->phoneNumber,
                'ville_id' => $faker->randomElement(Ville::pluck('id')->all()),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
