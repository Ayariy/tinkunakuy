<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMiembrodescripciontransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('miembrodescripciontrans', function (Blueprint $table) {
            $table->foreign(['idMiembro'], 'fk_miembroDescripcionTrans_miembro')->references(['idMiembro'])->on('miembro')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('miembrodescripciontrans', function (Blueprint $table) {
            $table->dropForeign('fk_miembroDescripcionTrans_miembro');
        });
    }
}
