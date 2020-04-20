<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcion_cursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_documento', 4);
            $table->string('numero_documento', 12);
            $table->string('numero_id', 9);
            $table->string('nombres', 220);
            $table->string('apellidos', 220);
            $table->string('email', 150);
            $table->string('celular', 11);
            $table->string('programa_academico', 255);
            $table->string('url_comprobante', 200)->nullable();
            $table->enum('estado', [0,1,2,3,4])->comment('0 = Pendiente Generar Recibo, 1 = En Curso o Mail enviado con Recibo, 2 = Pago Recibido por Validar , 3 = Pago Aprobado, 4 = Pago Anulado');
            $table->unsignedBigInteger('sedes_id');
            $table->foreign('sedes_id')->references('id')->on('sedes');
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
        Schema::dropIfExists('inscripcion_cursos');
    }
}
