<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCursonombretransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cursonombretrans', function (Blueprint $table) {
            $table->foreign(['idCurso'], 'fk_cursoNombreTrans_curso1')->references(['idCurso'])->on('curso')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cursonombretrans', function (Blueprint $table) {
            $table->dropForeign('fk_cursoNombreTrans_curso1');
        });
    }
}
