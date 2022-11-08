<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariocursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuariocurso', function (Blueprint $table) {
            $table->integer('idUserCurso', true);
            $table->string('estadoPago', 15)->nullable();
            $table->string('tipoPago', 15)->nullable();
            $table->string('estadoCurso', 15)->nullable();
            $table->string('fileCertificado')->nullable();
            $table->dateTime('fechaPago')->nullable();
            $table->string('codigoPago', 45)->nullable();
            $table->integer('idUsuario')->index('fk_usuarioEvento_usuario1_idx');
            $table->integer('idHorario')->index('fk_usuarioEvento_horario1_idx');
            $table->integer('idModulo')->index('fk_usuarioEvento_modulo1_idx');
            $table->string('idCurso', 32)->index('fk_usuarioCurso_curso1_idx');
            $table->integer('idMiembro')->index('fk_usuarioCurso_miembro1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuariocurso');
    }
}
