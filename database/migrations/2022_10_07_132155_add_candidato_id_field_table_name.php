<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCandidatoIdFieldTableName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidato_julgadors', function (Blueprint $table) {
            $table->bigInteger('candidato_id')->unsigned();
            $table->foreign('candidato_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidato_julgadors', function (Blueprint $table) {
            //
        });
    }
}
