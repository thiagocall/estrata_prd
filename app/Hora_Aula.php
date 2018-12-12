<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Hora_Aula extends Model
{
    protected $table='TbPROFESSOR_HORA_AULA';
    protected $primaryKey = 'NUM_MATRICULA';


     public function Valor_Convencao()

     {

     		$valorFixo = $this->HORA_SALARIO + $this->DIF_IND;
     	$valor = $valorFixo * ($this->FATOR_CONVENCAO + $this->FATOR_AD_TERESINA - 2);

     	return $valor;

     
     }

     public function Valor_Aprimoramento()

     {
     	$valorFixo = ($this->HORA_SALARIO + $this->DIF_IND) * $this->FATOR_CONVENCAO * $this->FATOR_AD_TERESINA;
     	$valor = $valorFixo * ($this->FATOR_APRIMORAMENTO - 1);

     	return $valor;
     }

     
     public function Valor_DSR()

     {
     	$valorFixo = ($this->HORA_SALARIO + $this->DIF_IND) * ($this->FATOR_CONVENCAO * $this->FATOR_AD_TERESINA * $this->FATOR_APRIMORAMENTO);

     	$valor = $valorFixo * ($this->FATOR_DSR  - 1);

     	return $valor;
     }


     public function Valor_ATS()

     {

     	$valorFixo = ($this->HORA_SALARIO + $this->DIF_IND) * ($this->FATOR_CONVENCAO * $this->FATOR_AD_TERESINA * $this->FATOR_APRIMORAMENTO * $this->FATOR_DSR);
     	$valor = $valorFixo * ($this->FATOR_ATS - 1);

     	return $valor;

     }


     public function Aprimoramento_Nome()
     {

     	$cod_aprimoramento = explode(' ', $this->NOM_APRIMORAMENTO)[0];

     	switch ($cod_aprimoramento) {
     		case 'A':
     			return 'Não Há';
     			break;

     			case 'B':
     			return 'Especialização';
     			break;

     			case 'C':
     			return 'Mestrado';
     			break;

     			case 'D':
     			return 'Doutorado';
     			break;

     			case 'E':
     			return 'Graduado';
     			break;

     			case 'G':
     			return 'Juiz/Promotor';
     			break;

     			case 'H':
     			return 'Procurador';
     			break;

     			case 'K':
     			return 'Mestrado';
     			# code...
     			break;

     			case 'L':
     			return 'Doutorado';
     			break;
     		
     		
     			default:
     			return 'Não Informado';
     			break;
     	}

     }








    
}
