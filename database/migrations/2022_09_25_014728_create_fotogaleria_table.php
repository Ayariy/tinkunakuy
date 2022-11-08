<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotogaleriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotogaleria', function (Blueprint $table) {
            $table->integer('idFotoGaleria', true);
            $table->dateTime('FechaPublicada')->nullable();
            $table->string('Foto')->nullable();
            $table->integer('idServicio')->index('fk_fotoGaleria_servicio1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fotogaleria');
    }
}
