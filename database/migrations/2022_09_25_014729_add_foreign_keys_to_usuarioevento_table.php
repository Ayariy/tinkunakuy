<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsuarioeventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarioevento', function (Blueprint $table) {
            $table->foreign(['idEvento'], 'fk_usuarioEvento_evento1')->references(['idEvento'])->on('evento')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idHorario'], 'fk_usuarioEvento_horario1')->references(['idHorario'])->on('horario')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idModulo'], 'fk_usuarioEvento_modulo1')->references(['idModulo'])->on('modulo')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idUsuario'], 'fk_usuarioEvento_usuario1')->references(['idUsuario'])->on('usuario')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarioevento', function (Blueprint $table) {
            $table->dropForeign('fk_usuarioEvento_evento1');
            $table->dropForeign('fk_usuarioEvento_horario1');
            $table->dropForeign('fk_usuarioEvento_modulo1');
            $table->dropForeign('fk_usuarioEvento_usuario1');
        });
    }
}
