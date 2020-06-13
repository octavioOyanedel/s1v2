<?php

use Illuminate\Database\Seeder;

class FaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Fase::create(['nombre' => 'Incompleto']);
        App\Fase::create(['nombre' => 'Egresado']);
        App\Fase::create(['nombre' => 'Graduado']);
        App\Fase::create(['nombre' => 'Cursando']);        
        App\Fase::create(['nombre' => 'Titulado']);
    }
}
