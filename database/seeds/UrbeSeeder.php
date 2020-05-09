<?php

use Illuminate\Database\Seeder;

class UrbeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Urbe::create(['nombre' => 'Calle Larga', 'comuna_id' =>1]);
        App\Urbe::create(['nombre' => 'Los Andes', 'comuna_id' =>1]);
        App\Urbe::create(['nombre' => 'Rinconada', 'comuna_id' =>1]);
        App\Urbe::create(['nombre' => 'San Esteban', 'comuna_id' =>1]);
        App\Urbe::create(['nombre' => 'Cabildo', 'comuna_id' =>2]);
        App\Urbe::create(['nombre' => 'La Ligua', 'comuna_id' =>2]);
        App\Urbe::create(['nombre' => 'Papudo', 'comuna_id' =>2]);
        App\Urbe::create(['nombre' => 'Petorca', 'comuna_id' =>2]);
        App\Urbe::create(['nombre' => 'Zapallar', 'comuna_id' =>2]);
        App\Urbe::create(['nombre' => 'Hijuelas', 'comuna_id' =>3]);
        App\Urbe::create(['nombre' => 'La Calera', 'comuna_id' =>3]);
        App\Urbe::create(['nombre' => 'La Cruz', 'comuna_id' =>3]);
        App\Urbe::create(['nombre' => 'Nogales', 'comuna_id' =>3]);
        App\Urbe::create(['nombre' => 'Quillota', 'comuna_id' =>3]);
        App\Urbe::create(['nombre' => 'Algarrobo', 'comuna_id' =>4]);
        App\Urbe::create(['nombre' => 'Cartagena', 'comuna_id' =>4]);
        App\Urbe::create(['nombre' => 'El Quisco', 'comuna_id' =>4]);
        App\Urbe::create(['nombre' => 'El Tabo', 'comuna_id' =>4]);
        App\Urbe::create(['nombre' => 'San Antonio', 'comuna_id' =>4]);
        App\Urbe::create(['nombre' => 'Santo Domingo', 'comuna_id' =>4]);
        App\Urbe::create(['nombre' => 'Catemu', 'comuna_id' =>5]);
        App\Urbe::create(['nombre' => 'Llay-Llay', 'comuna_id' =>5]);
        App\Urbe::create(['nombre' => 'Panquehue', 'comuna_id' =>5]);
        App\Urbe::create(['nombre' => 'Putaendo', 'comuna_id' =>5]);
        App\Urbe::create(['nombre' => 'San Felipe', 'comuna_id' =>5]);
        App\Urbe::create(['nombre' => 'Santa María', 'comuna_id' =>5]);
        App\Urbe::create(['nombre' => 'Casablanca', 'comuna_id' =>6]);
        App\Urbe::create(['nombre' => 'Concón', 'comuna_id' =>6]);
        App\Urbe::create(['nombre' => 'Juan Fernández', 'comuna_id' =>6]);
        App\Urbe::create(['nombre' => 'Puchuncaví', 'comuna_id' =>6]);
        App\Urbe::create(['nombre' => 'Quintero', 'comuna_id' =>6]);
        App\Urbe::create(['nombre' => 'Valparaíso', 'comuna_id' =>6]);
        App\Urbe::create(['nombre' => 'Viña del Mar', 'comuna_id' =>6]);
        App\Urbe::create(['nombre' => 'Limache', 'comuna_id' =>7]);
        App\Urbe::create(['nombre' => 'Olmué', 'comuna_id' =>7]);
        App\Urbe::create(['nombre' => 'Quilpué', 'comuna_id' =>7]);
        App\Urbe::create(['nombre' => 'Villa Alemana', 'comuna_id' =>7]);
    }
}
