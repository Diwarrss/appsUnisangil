<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('estadoUser', [1, 0])->default(1);
            $table->string('urlImagen', 200)->nullable();
            $table->unsignedBigInteger('roles_id')->default(1);
            $table->foreign('roles_id')->references('id')->on('roles');
            $table->unsignedBigInteger('sedes_id')->nullable();
            $table->foreign('sedes_id')->references('id')->on('sedes');
            $table->rememberToken();
            $table->timestamps();
        });

        $password = Hash::make('Unisangil2020*');

        //inserto a la tabla datos registros
        DB::table('users')->insert([
            array('id' => '1', 'name' => 'admin', 'email' => 'admin@gmail.com', 'email_verified_at' => null, 'password' => $password,'estadoUser' => 1, 'urlImagen' => 'storage/users/user.png', 'roles_id' => 1, 'sedes_id' => null),
            array('id' => '2', 'name' => 'Registro San Gil', 'email' => 'registroacademicosangil@unisangil.edu.co', 'email_verified_at' => null, 'password' => $password,'estadoUser' => 1, 'urlImagen' => 'storage/users/user.png', 'roles_id' => 2, 'sedes_id' => 1),
            array('id' => '3', 'name' => 'Registro Yopal', 'email' => 'registroacademicoyopal@unisangil.edu.co', 'email_verified_at' => null, 'password' => $password,'estadoUser' => 1, 'urlImagen' => 'storage/users/user.png', 'roles_id' => 2, 'sedes_id' => 3),
            array('id' => '4', 'name' => 'Tesorería San Gil', 'email' => 'tesoreriasangil@unisangil.edu.co', 'email_verified_at' => null, 'password' => $password,'estadoUser' => 1, 'urlImagen' => 'storage/users/user.png', 'roles_id' => 3, 'sedes_id' => 1),
            array('id' => '5', 'name' => 'Tesorería Yopal', 'email' => 'tesoreriayopal@unisangil.edu.co', 'email_verified_at' => null, 'password' => $password,'estadoUser' => 1, 'urlImagen' => 'storage/users/user.png', 'roles_id' => 3, 'sedes_id' => 3),
            array('id' => '6', 'name' => 'Facturación Electrónica', 'email' => 'factelectronica@unisangil.edu.co', 'email_verified_at' => null, 'password' => $password,'estadoUser' => 1, 'urlImagen' => 'storage/users/user.png', 'roles_id' => 4, 'sedes_id' => null)
        ]);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
