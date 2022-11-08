<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiembrodescripciontransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miembrodescripciontrans', function (Blueprint $table) {
            $table->integer('idMiemDes', true);
            $table->text('descripcionTrans')->nullable();
            $table->string('codigoIdioma', 5)->nullable();
            $table->integer('idMiembro')->index('fk_miembroDescripcionTrans_miembro_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('miembrodescripciontrans');
    }
}
