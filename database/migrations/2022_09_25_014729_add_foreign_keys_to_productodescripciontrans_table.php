<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductodescripciontransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productodescripciontrans', function (Blueprint $table) {
            $table->foreign(['idProducto'], 'fk_productoDescripcionTrans_producto1')->references(['idProducto'])->on('producto')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productodescripciontrans', function (Blueprint $table) {
            $table->dropForeign('fk_productoDescripcionTrans_producto1');
        });
    }
}
