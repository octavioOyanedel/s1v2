<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEstudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estudios', function (Blueprint $table) {
            $table->foreign('socio_id')->references('id')->on('socios')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('grado_id')->references('id')->on('grados')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('establecimiento_id')->references('id')->on('establecimientos')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('fase_id')->references('id')->on('fases')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('titulo_id')->references('id')->on('titulos')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estudios', function (Blueprint $table) {
            //
        });
    }
}
