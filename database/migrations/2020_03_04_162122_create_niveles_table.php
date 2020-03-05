<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNivelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niveles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 220);
            $table->longText('descripcion')->nullable();
            $table->timestamps();
        });

        DB::table('niveles')->insert([
            array('id' => '1', 'nombre' => 'Nivel 1', 'descripcion' => 'Introducción a los computadores'),
            array('id' => '2', 'nombre' => 'Nivel 2', 'descripcion' => 'Procesador de texto básico'),
            array('id' => '3', 'nombre' => 'Nivel 3', 'descripcion' => 'Hoja electrónica básica'),
            array('id' => '4', 'nombre' => 'Nivel 4', 'descripcion' => 'Internet básico'),
            array('id' => '5', 'nombre' => 'Nivel básico', 'descripcion' => 'Informática básica')]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('niveles');
    }
}
