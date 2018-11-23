<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor_Regime_Titulacao extends Model
{
    //

    protected $table = 'TbMATRIZ_PROFESSOR';

    
    public function Professor(){


		return $this->belongsTo('App\Professores', 'CPF', 'CPF_PROFESSOR');

    }

}
