<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class EstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 600 ; $i++) { 
        	App\Estudio::create(['socio_id' => $i, 'grado_id' => 1, 'establecimiento_id' => 12, 'fase_id' => 2, 'titulo_id'=> null]);
        }
    }
}
