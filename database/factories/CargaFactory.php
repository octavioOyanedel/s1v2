<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Carga;
use Faker\Generator as Faker;

$factory->define(Carga::class, function (Faker $faker) {
    return [
        'rut' => $faker->numberBetween($min = 100000000, $max = 200000000),
        'nombre1' => $faker->firstName(),
        'nombre2' => $faker->firstName(),
        'apellido1' => $faker->lastName(),
        'apellido2' => $faker->lastName(),
        'fecha_nac' => $faker->dateTimeBetween('-18 years', 'now'),
        'socio_id' => $faker->numberBetween(1, 600),
        'parentesco_id' => $faker->numberBetween(1, 6),
    ];
});
