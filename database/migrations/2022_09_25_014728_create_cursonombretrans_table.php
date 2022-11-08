<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursonombretransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursonombretrans', function (Blueprint $table) {
            $table->integer('idCursoNom', true);
            $table->string('nombreTrans', 50)->nullable();
            $table->string('codigoIdioma', 5)->nullable();
            $table->string('idCurso', 32)->index('fk_cursoNombreTrans_curso1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursonombretrans');
    }
}
