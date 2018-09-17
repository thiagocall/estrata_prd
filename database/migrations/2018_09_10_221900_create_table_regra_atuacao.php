<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRegraAtuacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regra_atuacao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('COD_TIPO_ATUACAO');
            $table->string('NOM_TIPO_ATUACAO');
            $table->string('USA_CAMPUS');
            $table->string('USA_CURSO');
            $table->string('USA_TIPO_CURSO');
            $table->string('USA_TURNO');
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
        Schema::dropIfExists('regra_atuacao');
    }
}
