<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariocursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horariocurso', function (Blueprint $table) {
            $table->integer('idHorario')->index('fk_horarioEvento_horario1_idx');
            $table->string('idCurso', 32)->index('fk_horarioCurso_curso1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horariocurso');
    }
}
