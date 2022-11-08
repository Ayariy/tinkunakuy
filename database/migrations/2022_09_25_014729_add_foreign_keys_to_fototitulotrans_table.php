<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFototitulotransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fototitulotrans', function (Blueprint $table) {
            $table->foreign(['idFotoGaleria'], 'fk_fotoTituloTrans_fotoGaleria1')->references(['idFotoGaleria'])->on('fotogaleria')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fototitulotrans', function (Blueprint $table) {
            $table->dropForeign('fk_fotoTituloTrans_fotoGaleria1');
        });
    }
}
