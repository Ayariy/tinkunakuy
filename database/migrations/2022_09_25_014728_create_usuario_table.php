<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->integer('idUsuario', true);
            $table->string('nombre', 45)->nullable();
            $table->string('apellido', 45)->nullable();
            $table->string('correo', 45)->nullable();
            $table->string('password', 72)->nullable();
            $table->tinyInteger('estado')->nullable();
            $table->string('rol', 15)->nullable();
            $table->string('token', 70)->nullable();
            $table->dateTime('fechaCreacion')->nullable();
            $table->string('celular', 10)->nullable();
            $table->string('facebook')->nullable();
            $table->string('cedula', 10)->nullable();
            $table->string('pais', 45)->nullable();
            $table->string('provinciaEstado', 45)->nullable();
            $table->string('ciudad', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
