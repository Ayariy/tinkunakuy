<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCursomoduloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cursomodulo', function (Blueprint $table) {
            $table->foreign(['idCurso'], 'fk_cursoModulo_curso1')->references(['idCurso'])->on('curso')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idModulo'], 'fk_evento_has_modulo_modulo10')->references(['idModulo'])->on('modulo')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cursomodulo', function (Blueprint $table) {
            $table->dropForeign('fk_cursoModulo_curso1');
            $table->dropForeign('fk_evento_has_modulo_modulo10');
        });
    }
}
