<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMiembrocargoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('miembrocargo', function (Blueprint $table) {
            $table->foreign(['idcargo'], 'fk_miembroCargo_cargo1')->references(['idcargo'])->on('cargo')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idMiembro'], 'fk_miembroCargo_miembro1')->references(['idMiembro'])->on('miembro')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('miembrocargo', function (Blueprint $table) {
            $table->dropForeign('fk_miembroCargo_cargo1');
            $table->dropForeign('fk_miembroCargo_miembro1');
        });
    }
}
