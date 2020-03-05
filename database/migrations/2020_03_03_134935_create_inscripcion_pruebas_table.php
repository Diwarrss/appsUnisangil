<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionPruebasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcion_pruebas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_documento', 4);
            $table->string('numero_documento', 12);
            $table->string('nombres_apellidos', 220);
            $table->string('email', 150);
            $table->string('celular', 14);
            $table->string('programa_academico', 255);
            $table->string('url_comprobante', 200);
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
        Schema::dropIfExists('inscripcion_pruebas');
    }
}
