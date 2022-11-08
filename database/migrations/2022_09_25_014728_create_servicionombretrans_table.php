<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicionombretransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicionombretrans', function (Blueprint $table) {
            $table->integer('idservicioNombreTrans', true);
            $table->string('nombreTrans', 45)->nullable();
            $table->string('codigoTrans', 5)->nullable();
            $table->integer('idServicio')->index('fk_servicioNombreTrans_servicio1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicionombretrans');
    }
}
