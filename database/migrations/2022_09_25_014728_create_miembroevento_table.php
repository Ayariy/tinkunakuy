<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiembroeventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miembroevento', function (Blueprint $table) {
            $table->integer('idMiembroEvento', true);
            $table->integer('idMiembro')->index('fk_miembroEvento_miembro1_idx');
            $table->string('idEvento', 32)->index('fk_miembroEvento_evento1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('miembroevento');
    }
}
