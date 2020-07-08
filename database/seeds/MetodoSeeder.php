<?php

use Illuminate\Database\Seeder;

class MetodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Metodo::create(['nombre' => 'DESCUENTO POR PLANILLA']);
        App\Metodo::create(['nombre' => 'DEPÓSITO']);
    }
}
