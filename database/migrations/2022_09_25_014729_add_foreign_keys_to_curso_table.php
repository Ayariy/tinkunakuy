<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('curso', function (Blueprint $table) {
            $table->foreign(['idServicio'], 'fk_evento_servicio10')->references(['idServicio'])->on('servicio')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idTipoEvento'], 'fk_evento_tipoEvento10')->references(['idTipoEvento'])->on('tipoevento')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('curso', function (Blueprint $table) {
            $table->dropForeign('fk_evento_servicio10');
            $table->dropForeign('fk_evento_tipoEvento10');
        });
    }
}
