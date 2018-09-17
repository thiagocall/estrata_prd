<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Professores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professores', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('cpf');
            $table->string('nome');
            $table->date('dt_nascimento');
            $table->string('sexo');
            $table->string('cor_raca');
            $table->string('nome_mae');
            $table->string('nacionalidade');
            $table->string('pais_origem');
            $table->string('uf_nasc');
            $table->string('municipio_nasc');
            $table->string('ecolaridade');
            $table->string('ind_deficiente');
            $table->string('def1');
            $table->string('def2');
            $table->string('def3');
            $table->string('perfil');
            $table->string('docente_subs');
            $table->string('ind_exercicio');
            $table->string('ind_bolsa_pesq');
            $table->text('obs');
            $table->timestamp('created_at')->nullable();


        });


    }


    public function down()
    {
        

        Schema::dropIfExists('professores');
    }
}
