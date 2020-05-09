<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PrivilegioSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CargoSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(CiudadaniaSeeder::class);
        $this->call(ComunaSeeder::class);
        $this->call(UrbeSeeder::class);
        $this->call(SedeSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(SocioSeeder::class);
    }
}
