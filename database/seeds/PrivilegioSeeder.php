<?php

use Illuminate\Database\Seeder;

class PrivilegioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Privilegio::create(['nombre' => 'Administrador']);
        App\Privilegio::create(['nombre' => 'Usuario']);
        App\Privilegio::create(['nombre' => 'Socio']);
    }
}
