<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCargotransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cargotrans', function (Blueprint $table) {
            $table->foreign(['idCargo'], 'fk_miembroCargoTrans_cargo1')->references(['idCargo'])->on('cargo')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cargotrans', function (Blueprint $table) {
            $table->dropForeign('fk_miembroCargoTrans_cargo1');
        });
    }
}