<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventonombretransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventonombretrans', function (Blueprint $table) {
            $table->integer('idEvenNom', true);
            $table->string('nombreTrans', 50)->nullable();
            $table->string('codigoIdioma', 5)->nullable();
            $table->string('idEvento', 32)->index('fk_eventoNombreTrans_evento1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventonombretrans');
    }
}
