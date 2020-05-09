<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Categoria::create(['nombre' => 'Activo']);
        App\Categoria::create(['nombre' => 'Jubilado']);
        App\Categoria::create(['nombre' => 'Renuncia Voluntaria']);
        App\Categoria::create(['nombre' => 'Desvinculación PUCV']);
        App\Categoria::create(['nombre' => 'Fallecido']); 
    }
}
