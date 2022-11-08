<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciodescripciontransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviciodescripciontrans', function (Blueprint $table) {
            $table->integer('idServDes', true);
            $table->text('descripcionTrans')->nullable();
            $table->string('codigoIdioma', 5)->nullable();
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
        Schema::dropIfExists('serviciodescripciontrans');
    }
}
