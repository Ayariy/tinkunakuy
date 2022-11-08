<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFotogaleriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fotogaleria', function (Blueprint $table) {
            $table->foreign(['idServicio'], 'fk_fotoGaleria_servicio1')->references(['idServicio'])->on('servicio')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fotogaleria', function (Blueprint $table) {
            $table->dropForeign('fk_fotoGaleria_servicio1');
        });
    }
}
