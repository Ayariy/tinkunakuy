<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductonombretransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productonombretrans', function (Blueprint $table) {
            $table->integer('idProdNom', true);
            $table->string('nombreTrans', 45)->nullable();
            $table->string('codigoIdioma', 5)->nullable();
            $table->integer('idProducto')->index('fk_productoNombreTrans_producto1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productonombretrans');
    }
}
