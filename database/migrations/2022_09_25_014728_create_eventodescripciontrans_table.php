<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventodescripciontransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventodescripciontrans', function (Blueprint $table) {
            $table->integer('idEventoDT', true);
            $table->text('descripcionTrans')->nullable();
            $table->string('codigoIdioma', 5)->nullable();
            $table->string('idEvento', 32)->index('fk_eventoDescripcionTrans_evento1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventodescripciontrans');
    }
}
