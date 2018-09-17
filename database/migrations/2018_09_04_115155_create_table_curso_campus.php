<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCursoCampus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_campus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NOM_CAMPUS');
            $table->string('COD_CAMPUS');
            $table->string('NOM_CURSO');
            $table->string('COD_CURSO');
            $table->string('NOM_CURSO_SIA');
            $table->string('NOM_TIPO_CURSO');
            $table->string('COD_TIPO_CURSO');
            $table->string('NOM_TURNO');
            $table->string('COD_TURNO');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso_campus');
    }
}
