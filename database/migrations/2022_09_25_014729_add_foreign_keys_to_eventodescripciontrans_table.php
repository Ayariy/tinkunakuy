<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEventodescripciontransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eventodescripciontrans', function (Blueprint $table) {
            $table->foreign(['idEvento'], 'fk_eventoDescripcionTrans_evento1')->references(['idEvento'])->on('evento')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eventodescripciontrans', function (Blueprint $table) {
            $table->dropForeign('fk_eventoDescripcionTrans_evento1');
        });
    }
}
