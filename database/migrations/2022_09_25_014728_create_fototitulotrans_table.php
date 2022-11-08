<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFototitulotransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fototitulotrans', function (Blueprint $table) {
            $table->integer('idFotoTitulo', true);
            $table->string('tituloTrans', 45)->nullable();
            $table->string('codigoIdioma', 5)->nullable();
            $table->integer('idFotoGaleria')->index('fk_fotoTituloTrans_fotoGaleria1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fototitulotrans');
    }
}
