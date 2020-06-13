<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTitulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('titulos', function (Blueprint $table) {
            $table->foreign('grado_id')->references('id')->on('grados')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('establecimiento_id')->references('id')->on('establecimientos')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('titulos', function (Blueprint $table) {
            //
        });
    }
}
