<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventomoduloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventomodulo', function (Blueprint $table) {
            $table->integer('idModulo')->index('fk_evento_has_modulo_modulo1_idx');
            $table->string('idEvento', 32)->index('fk_eventoModulo_evento1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventomodulo');
    }
}
