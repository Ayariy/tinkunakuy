<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVentadetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ventadetalle', function (Blueprint $table) {
            $table->foreign(['idProducto'], 'fk_ventaDetalle_producto1')->references(['idProducto'])->on('producto')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idventa'], 'fk_ventaDetalle_venta1')->references(['idventa'])->on('venta')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ventadetalle', function (Blueprint $table) {
            $table->dropForeign('fk_ventaDetalle_producto1');
            $table->dropForeign('fk_ventaDetalle_venta1');
        });
    }
}
