<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulotitulotransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulotitulotrans', function (Blueprint $table) {
            $table->integer('idArtiTitulo', true);
            $table->string('tituloTrans', 45)->nullable();
            $table->string('codigoIdioma', 5)->nullable();
            $table->integer('idArticulo')->index('fk_articuloTituloTrans_articulo1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulotitulotrans');
    }
}
