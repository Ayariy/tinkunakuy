<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulodescripciontransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulodescripciontrans', function (Blueprint $table) {
            $table->integer('idArtiDes', true);
            $table->text('DescripcionTrans')->nullable();
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
        Schema::dropIfExists('articulodescripciontrans');
    }
}
