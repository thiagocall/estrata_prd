<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProfessorIes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor_ies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NUM_MATRICULA');
            $table->string('NOM_PROFESSOR');
            $table->string('NOM_INSTITUICAO');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professor_ies');
    }
}
