<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAtuacaoCampus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atuacao_campus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NOM_TIPO_ATUACAO');
            $table->string('COD_TIPO_ATUACAO');
            $table->string('NOM_INSTITUICAO');
            $table->string('COD_INSTITUICAO');
            $table->string('NOM_CAMPUS');
            $table->string('COD_CAMPUS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atuacao_campus');
    }
}
