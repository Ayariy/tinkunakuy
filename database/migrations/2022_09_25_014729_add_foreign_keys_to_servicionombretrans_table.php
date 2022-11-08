<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToServicionombretransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servicionombretrans', function (Blueprint $table) {
            $table->foreign(['idServicio'], 'fk_servicioNombreTrans_servicio1')->references(['idServicio'])->on('servicio')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicionombretrans', function (Blueprint $table) {
            $table->dropForeign('fk_servicioNombreTrans_servicio1');
        });
    }
}
