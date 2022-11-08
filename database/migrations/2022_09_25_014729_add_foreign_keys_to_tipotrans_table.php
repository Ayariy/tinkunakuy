<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTipotransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tipotrans', function (Blueprint $table) {
            $table->foreign(['idTipoEvento'], 'fk_tipoTrans_tipoEvento1')->references(['idTipoEvento'])->on('tipoevento')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tipotrans', function (Blueprint $table) {
            $table->dropForeign('fk_tipoTrans_tipoEvento1');
        });
    }
}
