<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class socialmediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('reseausocs')->insert([
            'nomReseau' => "Facebook",
            'photoReseau' => 'fb.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('reseausocs')->insert([
            'nomReseau' => "Github",
            'photoReseau' => 'git.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('reseausocs')->insert([
            'nomReseau' => "Gmail",
            'photoReseau' => 'gmail.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('reseausocs')->insert([
            'nomReseau' => "Instagrame",
            'photoReseau' => 'insta.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('reseausocs')->insert([
            'nomReseau' => "Linkedin",
            'photoReseau' => 'linkdin.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('reseausocs')->insert([
            'nomReseau' => "Telegram",
            'photoReseau' => 'telegram.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('reseausocs')->insert([
            'nomReseau' => "Youtube",
            'photoReseau' => 'youtube.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('reseausocs')->insert([
            'nomReseau' => "Twitch",
            'photoReseau' => 'twitch.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('reseausocs')->insert([
            'nomReseau' => "Vk",
            'photoReseau' => 'vk.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('reseausocs')->insert([
            'nomReseau' => "Kakao-talk",
            'photoReseau' => 'Kakao-talk.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('reseausocs')->insert([
            'nomReseau' => "Line",
            'photoReseau' => 'line.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('reseausocs')->insert([
            'nomReseau' => "Reddit",
            'photoReseau' => 'reddit.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('reseausocs')->insert([
            'nomReseau' => "Discord",
            'photoReseau' => 'discord.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('reseausocs')->insert([
            'nomReseau' => "Twitter",
            'photoReseau' => 'twitter.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
