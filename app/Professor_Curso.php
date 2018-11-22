<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor_Curso extends Model
{
    //

    protected $table = 'TbPROFESSORPRES_CURSO_ATUAL';

    public function Professor(){

		return $this->hasOne('App\Professores', 'CPF', 'CPF_PROFESSOR');

    }

    public function Info (){

    	return $this->hasOne('App\Professor_Regime_Titulacao', 'CPF','CPF_PROFESSOR');

    }


}
