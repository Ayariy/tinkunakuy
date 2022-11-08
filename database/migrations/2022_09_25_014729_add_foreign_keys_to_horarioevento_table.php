<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToHorarioeventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('horarioevento', function (Blueprint $table) {
            $table->foreign(['idEvento'], 'fk_horarioEvento_evento1')->references(['idEvento'])->on('evento')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idHorario'], 'fk_horarioEvento_horario1')->references(['idHorario'])->on('horario')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('horarioevento', function (Blueprint $table) {
            $table->dropForeign('fk_horarioEvento_evento1');
            $table->dropForeign('fk_horarioEvento_horario1');
        });
    }
}
