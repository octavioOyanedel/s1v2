<?php

use Illuminate\Database\Seeder;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Grado::create(['nombre' => 'Educación Básica']);
        App\Grado::create(['nombre' => 'Educación Media Humanista']);
        App\Grado::create(['nombre' => 'Educación Media Técnico Profesional']);
        App\Grado::create(['nombre' => 'Centro de Formación Técnica / Instituto Profesional (CFT - IP)']);
        App\Grado::create(['nombre' => 'Educación Universitaria']);
        App\Grado::create(['nombre' => 'Postgrado']);
        App\Grado::create(['nombre' => 'Magister']);
    }
}
