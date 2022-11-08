<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductodescripciontransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productodescripciontrans', function (Blueprint $table) {
            $table->integer('idProdDes', true);
            $table->text('descripcionTrans')->nullable();
            $table->string('codigoIdioma', 5)->nullable();
            $table->integer('idProducto')->index('fk_productoDescripcionTrans_producto1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productodescripciontrans');
    }
}
