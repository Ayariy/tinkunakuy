<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEventomoduloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eventomodulo', function (Blueprint $table) {
            $table->foreign(['idEvento'], 'fk_eventoModulo_evento1')->references(['idEvento'])->on('evento')->onUpdate('CASCADE');
            $table->foreign(['idModulo'], 'fk_evento_has_modulo_modulo1')->references(['idModulo'])->on('modulo')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eventomodulo', function (Blueprint $table) {
            $table->dropForeign('fk_eventoModulo_evento1');
            $table->dropForeign('fk_evento_has_modulo_modulo1');
        });
    }
}
