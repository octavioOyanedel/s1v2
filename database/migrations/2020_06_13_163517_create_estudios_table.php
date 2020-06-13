<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudios', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->increments('id');               
            $table->unsignedInteger('socio_id')->nullable(); //set null
            $table->unsignedInteger('grado_id')->nullable(); //set null
            $table->unsignedInteger('establecimiento_id')->nullable(); //set null
            $table->unsignedInteger('fase_id')->nullable(); //set null
            $table->unsignedInteger('titulo_id')->nullable(); //set null
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
        Schema::dropIfExists('estudios');
    }
}
