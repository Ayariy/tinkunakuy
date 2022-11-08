<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToArticulodescripciontransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articulodescripciontrans', function (Blueprint $table) {
            $table->foreign(['idArticulo'], 'fk_articuloTituloTrans_articulo10')->references(['idArticulo'])->on('articulo')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articulodescripciontrans', function (Blueprint $table) {
            $table->dropForeign('fk_articuloTituloTrans_articulo10');
        });
    }
}
