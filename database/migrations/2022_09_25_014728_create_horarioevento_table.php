<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorarioeventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarioevento', function (Blueprint $table) {
            $table->integer('idHorario')->index('fk_horarioEvento_horario1_idx');
            $table->string('idEvento', 32)->index('fk_horarioEvento_evento1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarioevento');
    }
}
