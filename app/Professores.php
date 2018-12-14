<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professores extends Model
{
    protected $table = 'TbPROFESSORES';
    protected $primaryKey = 'CPF';
    //protected $fillable = [];

    public $timestamps=false;

    public function Cpf_Formatado()
    {
        $a = sprintf("%011s",$this->CPF);
        return sprintf(substr($a,0,3). "." . substr($a,3,3). "." . substr($a,6,3) . "-" . substr($a,9,2));
    }

    public function IdadeProfessor()
    {
        return intval((strtotime(date("Y-m-d")) - strtotime($this->DT_NASCIMENTO))/86400/365.25);
    }


    public function Info (){

    	return $this->hasOne('App\Professor_Regime_Titulacao', 'CPF','CPF');

    }

    public function Info_Cursos(){

    	return $this->hasMany('App\Professor_Curso', 'CPF_PROFESSOR', 'CPF');

    }

    public function Titulacao() {


        return $this->hasOne('App\Professor_Titulacao', 'CPF_PROFESSOR', 'CPF');

    }


    public function Matricula(){

        return $this->hasMany('App\Professor_Matricula', 'CPF_PROFESSOR', 'CPF'); 

    }


     public function Titulacao_Lattes() {


        return $this->hasOne('App\Titulacao_Lattes', 'CPF', 'CPF');

    }


    
    

}

