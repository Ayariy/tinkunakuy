<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductonombretransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productonombretrans', function (Blueprint $table) {
            $table->foreign(['idProducto'], 'fk_productoNombreTrans_producto1')->references(['idProducto'])->on('producto')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productonombretrans', function (Blueprint $table) {
            $table->dropForeign('fk_productoNombreTrans_producto1');
        });
    }
}
