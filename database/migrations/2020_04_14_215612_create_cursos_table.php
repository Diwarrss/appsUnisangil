<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 220);
            $table->string('nrc', 10);
            $table->date('fecha_inicio_inscripcion');
            $table->date('fecha_fin_inscripcion');
            $table->enum('estado', [0,1])->comment('0 = Inactivo, 1 = Activo');
            $table->timestamps();
        });

        DB::table('cursos')->insert([
            array('id' => '1', 'nombre' => 'Hoja Electrónica Básica', 'nrc' => '2767', 'fecha_inicio_inscripcion' => '2020-04-20', 'fecha_fin_inscripcion' => '2020-05-12', 'estado' => '1'),
            array('id' => '2', 'nombre' => 'Internet Básico', 'nrc' => '2768', 'fecha_inicio_inscripcion' => '2020-04-20', 'fecha_fin_inscripcion' => '2020-05-12', 'estado' => '1')/* ,
            array('id' => '3', 'nombre' => 'Introducción a los computadores', 'nrc' => '2359', 'fecha_inicio_inscripcion' => '2020-04-20', 'fecha_fin_inscripcion' => '2020-05-12', 'estado' => '1'),
            array('id' => '4', 'nombre' => 'Procesador de Texto Básico', 'nrc' => '2359', 'fecha_inicio_inscripcion' => '2020-04-20', 'fecha_fin_inscripcion' => '2020-05-12', 'estado' => '1') */]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
