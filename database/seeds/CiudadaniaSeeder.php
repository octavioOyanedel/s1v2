<?php

use Illuminate\Database\Seeder;

class CiudadaniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Ciudadania::create(['nombre' => 'Haití']);
        App\Ciudadania::create(['nombre' => 'Chile']);
        App\Ciudadania::create(['nombre' => 'Venezuela']);
    }
}
