<?php

use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\Models\Options::create([
           'logo' => '/img/svg/logo.svg',
           'privacy_policy' => 'some privacy policy text',
           'terms_of_service' => 'some terms of service text',
           'admin_email' => 'admin@admin.com',
       ]);
    }
}
