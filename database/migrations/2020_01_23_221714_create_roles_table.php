<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 100);
            $table->string('descripcion', 255);
            $table->timestamps();
        });
        $now = new \DateTime();
        DB::table('roles')->insert([
            array('id' => '1', 'nombre' => 'Admin', 'descripcion' => 'Usuario que se encarga del control total de la Página', 'created_at' => $now),
            array('id' => '2', 'nombre' => 'Registro', 'descripcion' => 'Rol especifico para registro academico', 'created_at' => $now)
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
