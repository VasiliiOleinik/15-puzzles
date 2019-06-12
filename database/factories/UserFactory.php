<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {

    $path = 'https://picsum.photos/145';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    return [
        'nickname' => $faker->userName,
        'first_name' => $faker->firstName,
        'middle_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'img' => $base64,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('00000000'),
        'remember_token' => Str::random(10),
		'role_id' => $faker->numberBetween($min = 1, $max = 3),
    ];
});
