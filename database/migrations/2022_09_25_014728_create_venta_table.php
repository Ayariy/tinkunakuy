<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->integer('idventa', true);
            $table->dateTime('fechaPago')->nullable();
            $table->string('estadoPago', 15)->nullable();
            $table->string('codigoPago', 45)->nullable();
            $table->decimal('total', 6)->nullable();
            $table->integer('idUsuario')->index('fk_venta_usuario1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta');
    }
}
