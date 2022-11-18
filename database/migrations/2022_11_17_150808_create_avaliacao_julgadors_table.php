<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacaoJulgadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao_julgadors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('julgador_id')->unsigned();
            $table->foreign('julgador_id')->references('id')->on('julgadors');
            $table->string('avaliacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliacao_julgadors');
    }
}
