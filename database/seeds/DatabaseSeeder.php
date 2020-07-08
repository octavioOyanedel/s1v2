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
        $this->call(UrbeSeeder::class);
        $this->call(ComunaSeeder::class);
        $this->call(SedeSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(SocioSeeder::class);
        $this->call(ParentescoSeeder::class);
        $this->call(CargaSeeder::class);
        $this->call(GradoSeeder::class);
        $this->call(EstablecimientoSeeder::class);
        $this->call(FaseSeeder::class);
        $this->call(TituloSeeder::class);
        $this->call(EstudioSeeder::class);
        $this->call(CuentaSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(MetodoSeeder::class);
    }
}
