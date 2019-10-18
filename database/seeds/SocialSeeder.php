<?php

use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SocialNetwork::create([
            'img' => '/img/svg/youtube.svg'
        ]);

        \App\Models\SocialNetwork::create([
            'img' => '/img/svg/facebook.svg'
        ]);

        \App\Models\SocialNetwork::create([
            'img' => '/img/svg/insta.svg'
        ]);
    }
}
