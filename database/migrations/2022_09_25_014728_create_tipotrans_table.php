<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipotransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipotrans', function (Blueprint $table) {
            $table->integer('idTipoTrans', true);
            $table->string('tipo', 50)->nullable();
            $table->string('codigoIdioma', 5)->nullable();
            $table->integer('idTipoEvento')->index('fk_tipoTrans_tipoEvento1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipotrans');
    }
}
