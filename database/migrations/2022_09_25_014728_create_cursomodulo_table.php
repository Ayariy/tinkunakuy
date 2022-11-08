<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursomoduloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursomodulo', function (Blueprint $table) {
            $table->integer('idModulo')->index('fk_evento_has_modulo_modulo1_idx');
            $table->string('idCurso', 32)->index('fk_cursoModulo_curso1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursomodulo');
    }
}
