<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor_Matricula extends Model
{
    
    protected $table = 'TbPROFESSOR_MATRICULA';
    protected $primaryKey = 'NUM_MATRICULA';



    public function Professor(){

    	return $this->belongsTo('App\Professores', 'CPF_PROFESSOR','CPF');

    }

    public function Sindicato()
    {
    	return $this->hasOne('App\Professor_Sindicato', 'NUM_MATRICULA', 'NUM_MATRICULA');
    }


    public function Hora_Aula() {


        return $this->hasOne('App\Hora_Aula', 'NUM_MATRICULA', 'NUM_MATRICULA');

    }


}
