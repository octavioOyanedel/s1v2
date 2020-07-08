<?php

use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Estado::create(['nombre' => 'VIGENTE']);
        App\Estado::create(['nombre' => 'PAGADO']);
        App\Estado::create(['nombre' => 'MORA']);
        App\Estado::create(['nombre' => 'NULO']);
    }
}
