<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professores extends Model
{
    protected $table = 'TbPROFESSORES';
    protected $primaryKey = 'CPF';
    //protected $fillable = [];


    public $timestamps=false;

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
    

}

