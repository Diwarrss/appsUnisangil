<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sedes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 150);
            $table->enum('estado', [1, 0])->default(1); //1 activo, 0 inactivo
            $table->timestamps();
        });

        $now = new \DateTime();
        DB::table('sedes')->insert(array('id' => '1', 'nombre' => 'San Gil', 'estado' => 1, 'created_at' => $now));
        DB::table('sedes')->insert(array('id' => '2', 'nombre' => 'Chiquinquirá', 'estado' => 1, 'created_at' => $now));
        DB::table('sedes')->insert(array('id' => '3', 'nombre' => 'Yopal', 'estado' => 1, 'created_at' => $now));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sedes');
    }
}
