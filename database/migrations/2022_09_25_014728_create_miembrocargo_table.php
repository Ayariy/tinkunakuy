<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiembrocargoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miembrocargo', function (Blueprint $table) {
            $table->integer('idMiembro')->index('fk_miembroCargo_miembro1_idx');
            $table->integer('idcargo')->index('fk_miembroCargo_cargo1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('miembrocargo');
    }
}
