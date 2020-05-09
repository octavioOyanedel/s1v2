<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('socios', function (Blueprint $table) {
            $table->foreign('comuna_id')->references('id')->on('comunas')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('urbe_id')->references('id')->on('urbes')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('ciudadania_id')->references('id')->on('ciudadanias')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('sede_id')->references('id')->on('sedes')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('area_id')->references('id')->on('areas')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('cargo_id')->references('id')->on('cargos')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('socios', function (Blueprint $table) {
            //
        });
    }
}
