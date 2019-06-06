<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->delete();
        DB::update("ALTER TABLE users AUTO_INCREMENT = 0;");

        factory(App\Models\User\User::class, 30)->create();
    }
}
