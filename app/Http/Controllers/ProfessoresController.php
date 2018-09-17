<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professores;

class ProfessoresController extends Controller
{


	public function mask($val, $mask){

			 $maskared = '';
				$k = 0;

			 for($i = 0; $i<=strlen($mask)-1; $i++)

			 {

				 if($mask[$i] == '#')

				 {

					 if(isset($val[$k]))

					 $maskared .= $val[$k++];

					 }

						 else

						 {

						 if(isset($mask[$i]))

						 $maskared .= $mask[$i];

						 }

			 }

			 return $maskared;

			}


    public function inicial (){

    	$professores = Professores::Paginate(15);

    return view('Professores.listaprofessor', ['title' => 'Professores', 'professores' => $professores]);


    }


    public function mostrar ($id){


    	$professor = Professores::find($id);

    	if ($professor->sexo == 'F') {

    		$professor->sexo = 'Feminino';
    	}

    		else{

    			$professor->sexo = 'Masculino';
    		}
    		

    	if ($professor->ind_bolsa_pesq == 'S') {

    		$professor->ind_bolsa_pesq = 'Sim';
    	}

    		else{

    			$professor->ind_bolsa_pesq = 'Não';
    		}


    	$professor->cpf = ProfessoresController::mask($professor->cpf, "###.###.###-##");

    	


    	return view('Professores.mostrar', ['professor' => $professor]);


    }


}
