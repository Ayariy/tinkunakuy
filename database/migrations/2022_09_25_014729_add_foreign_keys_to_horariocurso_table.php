<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToHorariocursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('horariocurso', function (Blueprint $table) {
            $table->foreign(['idCurso'], 'fk_horarioCurso_curso1')->references(['idCurso'])->on('curso')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idHorario'], 'fk_horarioEvento_horario10')->references(['idHorario'])->on('horario')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('horariocurso', function (Blueprint $table) {
            $table->dropForeign('fk_horarioCurso_curso1');
            $table->dropForeign('fk_horarioEvento_horario10');
        });
    }
}
