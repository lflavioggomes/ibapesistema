<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nacionalidade')->nullable();
            $table->string('naturalidade')->nullable();
            $table->string('sexo')->nullable();
            $table->date('nascimento')->nullable();
            $table->string('rg')->nullable();
            $table->string('emissor')->nullable();
            $table->date('dataemissao')->nullable();
            $table->string('cpf')->nullable();
            $table->string('pai')->nullable();
            $table->string('mae')->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cep')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('pais')->nullable();
            $table->string('telefone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('homepage')->nullable();
            $table->string('crea')->nullable();
            $table->string('formacao')->nullable();
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
        Schema::dropIfExists('dados');
    }
}
