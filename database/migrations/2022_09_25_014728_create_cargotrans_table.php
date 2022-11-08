<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargotransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargotrans', function (Blueprint $table) {
            $table->integer('idCargoTrans', true);
            $table->string('cargoTrans', 45)->nullable();
            $table->string('codigoIdioma', 5)->nullable();
            $table->integer('idCargo')->index('fk_miembroCargoTrans_cargo1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargotrans');
    }
}
