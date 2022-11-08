<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEventonombretransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eventonombretrans', function (Blueprint $table) {
            $table->foreign(['idEvento'], 'fk_eventoNombreTrans_evento1')->references(['idEvento'])->on('evento')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eventonombretrans', function (Blueprint $table) {
            $table->dropForeign('fk_eventoNombreTrans_evento1');
        });
    }
}
