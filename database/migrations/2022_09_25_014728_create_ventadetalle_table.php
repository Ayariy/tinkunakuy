<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentadetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventadetalle', function (Blueprint $table) {
            $table->integer('idVentaDetalle', true);
            $table->dateTime('cantidad')->nullable();
            $table->string('descuento', 15)->nullable();
            $table->integer('idventa')->index('fk_ventaDetalle_venta1_idx');
            $table->integer('idProducto')->index('fk_ventaDetalle_producto1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventadetalle');
    }
}
