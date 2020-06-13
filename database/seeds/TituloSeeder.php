<?php

use Illuminate\Database\Seeder;

class TituloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		App\Titulo::create(['nombre' => 'Ingeniero de Ejecucíon Informatica', 'grado_id' => 5, 'establecimiento_id' => 1]);
		App\Titulo::create(['nombre' => 'Ingeniero Electrónico con Mención en Computación Y Redes', 'grado_id' => 4, 'establecimiento_id' => 1]);
		App\Titulo::create(['nombre' => 'Ingeniero Agronomo', 'grado_id' => 5, 'establecimiento_id' => 1]);
		App\Titulo::create(['nombre' => 'Ciencias Agronomicas Y Ambientales', 'grado_id' => 7, 'establecimiento_id' => 1]);
		App\Titulo::create(['nombre' => 'Administración de Empresas', 'grado_id' => 4, 'establecimiento_id' => 1]);
		App\Titulo::create(['nombre' => 'Contador Auditor', 'grado_id' => 4, 'establecimiento_id' => 2]);
		App\Titulo::create(['nombre' => 'Enfermera', 'grado_id' => 5, 'establecimiento_id' => 2]);
		App\Titulo::create(['nombre' => 'Secretaria', 'grado_id' => 4, 'establecimiento_id' => 2]);
		// App\Titulo::create(['nombre' => 'Técnico Universitario en Control de Alimentos', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Programador de Aplicaciones Computacionales', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Asistente Social', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Periodista', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Técnico en Análisis Químico', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Ingeniería de Ejecución en Informática', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Analista Programador', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Ingeniera de Ejecución en Bioprocesos', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Ingeniería en Administración', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Químico Laboratorista', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Técnico Electricista', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Psicólogo/a', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Secretaria Administrativa', 'grado_id' => 3, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Profesor de Enseñanza Media en Filosofía', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Ingeniero Ejecución Informática', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Técnico en Odontología', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Administración Financiera', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Secretaria Ejecutiva', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Técnico en Medio Ambiente', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Operaciones Portuarias', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Trabajadora Social', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Programador de Aplicaciones Computacionales', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Administración de Recursos Humanos', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Secretaria Ejecutiva Bilingue', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Técnico en Administración de Empresas', 'grado_id' => 3, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Técnico en Química Analítica', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Técnico en Telecomunicaciones Conectividad Y Redes', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Ingeniero de Software Y Licenciado en Ciencias de la Ingeniería', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Administración de Empresas con Mención en Finanzas', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Tecnico Electronico', 'grado_id' => 3, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Bibliotecario', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Contabilidad General Mención Legislación Tributaria', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Técnico en Construcción', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Secretaria Ejecutiva con Mención en Computación', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Dibujante Arquitectónico', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Bibliotecóloga Licenciada en Ciencias de la Documentación', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Ingenieria Gestión de la Calidad', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Técnico Laboratorista Químico Industrial', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Administración Comercial', 'grado_id' => 3, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Profesor de Música', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Profesora Diferencial', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Constructor Civil', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Profesor de Estado en Biologia Y Ciencias', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Secretaria Ejecutiva Traductora Inglés E Español', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Técnico en Electricidad Y Electrónica', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Ingeniero en Software', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Técnico Nivel Superior en Prevención de Riesgos Industriales', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Administrador de Redes Computacionales', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Técnico en Preparador Fisico', 'grado_id' => 4, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'PedagogÍa en EducaciÓn Diferencial Y Licenciada en EducaciÓn', 'grado_id' => 5, 'establecimiento_id' => 1]);
		// App\Titulo::create(['nombre' => 'Administración de Empresas', 'grado_id' => 3, 'establecimiento_id' => 1]);
    }
}
