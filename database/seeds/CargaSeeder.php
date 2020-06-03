<?php

use Illuminate\Database\Seeder;

class CargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Carga::class, 100)->create();
    }
}
