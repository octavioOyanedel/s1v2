<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'nombre1' => 'Octavio',
            'nombre2' => 'Andrés',
            'apellido1' => 'Oyanedel',
            'apellido2' => 'Alarcón',
            'email' => 'octavio.oyanedel@gmail.com',
	        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
	        'privilegio_id' => 1,
	        'remember_token' => Str::random(10),
        ]);
        App\User::create([
            'nombre1' => 'Osvalda',
            'nombre2' => 'Valentína',
            'apellido1' => 'León',
            'apellido2' => 'Montenegro',
            'email' => 'octavio.oyanedel@outlook.com',
	        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
	        'privilegio_id' => 2,
	        'remember_token' => Str::random(10),
        ]);
        App\User::create([
            'nombre1' => 'Osvaldo',
            'nombre2' => 'Valentín',
            'apellido1' => 'León',
            'apellido2' => 'Montenegro',
            'email' => 'tavo.oyanedel@gmail.com',
	        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
	        'privilegio_id' => 3,
	        'remember_token' => Str::random(10),
        ]);
    }
}
