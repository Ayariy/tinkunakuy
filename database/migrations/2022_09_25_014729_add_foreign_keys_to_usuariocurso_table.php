<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsuariocursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuariocurso', function (Blueprint $table) {
            $table->foreign(['idCurso'], 'fk_usuarioCurso_curso1')->references(['idCurso'])->on('curso')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idMiembro'], 'fk_usuarioCurso_miembro1')->references(['idMiembro'])->on('miembro')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idHorario'], 'fk_usuarioEvento_horario10')->references(['idHorario'])->on('horario')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idModulo'], 'fk_usuarioEvento_modulo10')->references(['idModulo'])->on('modulo')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idUsuario'], 'fk_usuarioEvento_usuario10')->references(['idUsuario'])->on('usuario')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuariocurso', function (Blueprint $table) {
            $table->dropForeign('fk_usuarioCurso_curso1');
            $table->dropForeign('fk_usuarioCurso_miembro1');
            $table->dropForeign('fk_usuarioEvento_horario10');
            $table->dropForeign('fk_usuarioEvento_modulo10');
            $table->dropForeign('fk_usuarioEvento_usuario10');
        });
    }
}
