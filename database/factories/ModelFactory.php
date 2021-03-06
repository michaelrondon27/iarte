<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'status_id'=>$faker->numberBetween(1,2),
    ];
});

$factory->define(App\Status::class, function (Faker\Generator $faker) {
	return[
		'status'=>$faker->text(100),
	];
});

$factory->define(App\Perfil::class, function (Faker\Generator $faker) {
	return[
		'perfil'=>$faker->text(100),
	];
});

$factory->define(App\Genero::class, function (Faker\Generator $faker) {
    return[
        'genero'=>$faker->text(100),
    ];
});

$factory->define(App\Pais::class, function (Faker\Generator $faker) {
    return[
        'pais'=>$faker->text(100),
    ];
});

$factory->define(App\Estado::class, function (Faker\Generator $faker) {
    return[
        'estado'=>$faker->text(100),
    ];
});

$factory->define(App\EstadoCivil::class, function (Faker\Generator $faker) {
    return[
        'estado_civil'=>$faker->text(15),
    ];
});

$factory->define(App\Icon::class, function (Faker\Generator $faker) {
    return[
        'icon'=>$faker->text(100),
        'name'=>$faker->text(100),
    ];
});