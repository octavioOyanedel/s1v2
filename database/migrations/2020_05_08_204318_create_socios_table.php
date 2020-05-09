<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socios', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->increments('id');    
            $table->string('rut');
            $table->string('nombre1');
            $table->string('nombre2')->nullable();
            $table->string('apellido1');
            $table->string('apellido2')->nullable();
            $table->enum('genero', array('Varón', 'Dama'));
            $table->date('fecha_nac')->nullable();
            $table->unsignedInteger('celular')->nullable(); 
            $table->string('correo')->nullable();
            $table->unsignedInteger('comuna_id')->nullable(); //set null
            $table->unsignedInteger('urbe_id')->nullable(); //set null            
            $table->string('direccion')->nullable();
            $table->unsignedInteger('ciudadania_id')->nullable(); //set null
            $table->date('fecha_pucv')->nullable();
            $table->unsignedInteger('sede_id')->nullable(); //set null
            $table->unsignedInteger('area_id')->nullable(); //set null
            $table->unsignedInteger('cargo_id')->nullable(); //set null
            $table->unsignedInteger('anexo')->nullable();
            $table->date('fecha_sind1')->nullable();
            $table->unsignedInteger('numero')->nullable();
            $table->unsignedInteger('categoria_id')->default(1); //restrict
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socios');
    }
}
