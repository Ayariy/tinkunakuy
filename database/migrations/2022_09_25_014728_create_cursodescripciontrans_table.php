<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursodescripciontransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursodescripciontrans', function (Blueprint $table) {
            $table->integer('idCursoDT', true);
            $table->text('descripcionTrans')->nullable();
            $table->string('codigoIdioma', 5)->nullable();
            $table->string('idCurso', 32)->index('fk_cursoDescripcionTrans_curso1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursodescripciontrans');
    }
}
