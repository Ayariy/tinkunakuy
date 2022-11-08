<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMiembroeventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('miembroevento', function (Blueprint $table) {
            $table->foreign(['idEvento'], 'fk_miembroEvento_evento1')->references(['idEvento'])->on('evento')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idMiembro'], 'fk_miembroEvento_miembro1')->references(['idMiembro'])->on('miembro')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('miembroevento', function (Blueprint $table) {
            $table->dropForeign('fk_miembroEvento_evento1');
            $table->dropForeign('fk_miembroEvento_miembro1');
        });
    }
}
