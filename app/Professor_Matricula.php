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


    public function Carga_DS()
    {
        return $this->hasMany('App\Matricula_Carga_DS', 'NUM_MATRICULA', 'NUM_MATRICULA');
    }


    public function CargaMes_DS()
    {
        
        $maxMes = $this->Carga_DS->max('DT_MES_ANO_COMPETENCIA');

        $carga = $this->Carga_DS
                ->where('DT_MES_ANO_COMPETENCIA', '=', $maxMes);

            return $carga;


    }


}
