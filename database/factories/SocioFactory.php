<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Socio;
use Faker\Generator as Faker;

$factory->define(Socio::class, function (Faker $faker) {
    return [
        'rut' => $faker->numberBetween($min = 100000000, $max = 200000000),
        'nombre1' => $faker->firstName(),
        'nombre2' => $faker->firstName(),
        'apellido1' => $faker->lastName(),
        'apellido2' => $faker->lastName(),
        'genero' => $faker->randomElement(['Dama' ,'Varón']),
        'fecha_nac' => $faker->dateTimeBetween('-69 years', '-20 years'),
        'celular' => $faker->numberBetween($min = 955555555, $max = 999999999),
        'correo' => $faker->safeEmail(), 
        'urbe_id' => 6,
        'comuna_id' => $faker->numberBetween(27, 33),
        'direccion' => $faker->address(),
        'ciudadania_id' => 2,
        'fecha_pucv' => $faker->dateTimeBetween('-19 years', '-14 years'),
        'sede_id' => 1,
        'area_id' => $faker->numberBetween(1, 55),
        'cargo_id' => $faker->numberBetween(1, 61),
        'anexo' => $faker->numberBetween(2000, 4999),
        'fecha_sind1' => $faker->dateTimeBetween('-13 years', 'now'),
        'numero' => rand(1, 99999999),
        'categoria_id' => 1
    ];
});
