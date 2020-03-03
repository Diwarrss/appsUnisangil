<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuzonSugerenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buzon_sugerencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres', 120)->nullable();
            $table->string('celular', 10)->nullable();
            $table->string('email', 40)->nullable();
            $table->string('tipo', 20)->comment('Son: Felicitación, Petición, Queja, Reclamo, Sugerencia');
            $table->longText('descripcion');
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
        Schema::dropIfExists('buzon_sugerencias');
    }
}
