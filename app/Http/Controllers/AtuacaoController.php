<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atuacao;
use App\Campus_Curso;
use App\regra_atuacao;

class AtuacaoController extends Controller
{


    public $USA_CAMPUS = "";
    public $USA_CURSO = "";
    public $USA_TIPO_CURSO = "";



	public function inicial() {

		$atuacoes = Atuacao::select('cod_tipo_atuacao', 'nom_tipo_atuacao')
							->distinct()
							->orderby('nom_tipo_atuacao')
							->get();

		return view('Atuacoes/inicial', ['atuacoes' => $atuacoes]);

	}



	public function inicial_() {

		$atuacoes = Atuacao::select('cod_tipo_atuacao', 'nom_tipo_atuacao')
							->distinct()
							->orderby('nom_tipo_atuacao')
							->get();

		return view('Atuacoes/atuacao_', ['atuacoes' => $atuacoes]);

	}


	public function getIES(Request $request){

			$id_atuacao = $request->post('id_atuacao');

			$nom_ies = AtuacaoController::getIesById($id_atuacao);

			$regra = AtuacaoController::getRegraAtuacao($id_atuacao);

			$total = $nom_ies->count();


			$options = "<option selected value desable> Selecione uma IES ({$total}) </option>";


	/*
			return response()->json($response); 
	*/		

			foreach ($nom_ies as $n) {
				
				$options .= "<option value='{$n->cod_instituicao}'>$n->nom_instituicao</option>" . PHP_EOL;
			}


			$this->USA_CAMPUS = $regra[0]['usa_campus'];
			$this->USA_CURSO = $regra[0]['usa_curso'];
			$this->USA_TIPO_CURSO = $regra[0]['usa_tipo_curso'];

			$corpo1 = '<label for="campus"><strong>Campus:</strong></label>';
	      	$corpo1 .= '<select class="form-control" id="campus" disabled="" required="true">';
	       	$corpo1 .= '<option  selected value > Selecione uma IES </option> </select>';

		    $corpo2 = '<label for="curso"><strong>Curso:</strong></label>' ;
		    $corpo2 .=  '<select class="form-control" id="curso" disabled="">';
		    $corpo2 .=   '<option  selected value> Selecione um Campus </option>' ;
		    $corpo2 .=  '</select>';


			($this->USA_CAMPUS == 'S') ? $corpo_1 = $corpo1 : $corpo_1 = '';

			($this->USA_CURSO == 'S') ? $corpo_2 = $corpo2 : $corpo_2 = '';


			
			//return  ['options' => $options, 'corpo_1' => $corpo_1, 'corpo_2' => $corpo_2];

			return  ['options' => $options, 'regra' => $regra, 'corpo_1' => $corpo_1, 'corpo_2' => $corpo_2];
	
	}


	public function getIesById($nies = null) {

		$atuacoes = Atuacao::select('cod_instituicao', 'nom_instituicao')
							->distinct()
							->where('cod_tipo_atuacao', $nies)
							->orderby('nom_instituicao')
							->get();

		return  $atuacoes;

}



	public function getCampus(Request $request){

		$id_ies = $request->post('id_ies');

		$nom_campus = AtuacaoController::getCampusById($id_ies);
		

		$options = "<option selected value desable> Selecione um Campus </option>";

/*
		return response()->json($response); 
*/		

		/*
		if($USA_CAMPUS == "S") {



		foreach ($nom_campus as $n) {
			
			$options .= "<option value='{$n->cod_campus}'>$n->nom_campus</option>" . PHP_EOL;
		}

		return $options;
	}

	else {

		$options = "<option selected value desable> Atuação não pede campus </option>";

		return $options;


	}
	*/
			foreach ($nom_campus as $n) {
			
				$options .= "<option value='{$n->cod_campus}'>$n->nom_campus</option>" . PHP_EOL;
			}

			return $options;

	
	}


	public function getCampusById($nCamp = null) {

			$campi = Atuacao::select('cod_campus', 'nom_campus')
								->distinct()
								->where('cod_instituicao', $nCamp)
								->orderby('nom_campus')
								->get();

			return  $campi;

}

	public function getCurso(Request $request){

		$id_curso = $request->post('id_curso');

		$nom_curso = AtuacaoController::getCursosById($id_curso);
		

		$options = "<option selected value desable> Selecione um Curso </option>";


/*
		return response()->json($response); 
*/		

		foreach ($nom_curso as $n) {
			
			$options .= "<option value='{$n->cod_curso}'>$n->nom_curso_sia</option>" . PHP_EOL;
		}

		return $options;
	
	}


	public function getCursosById($nCurs = null) {

			$Cursos = Campus_Curso::select('cod_curso', 'nom_curso_sia')
								->distinct()
								->where('cod_campus', $nCurs)
								->orderby('nom_curso_sia')
								->get();

			return  $Cursos;

}

	public function getTurno(Request $request){

		$id_curso = $request->post('id_curso');
		$id_campus = $request->post('id_campus');

		$nom_turno = AtuacaoController::getTurnoById($id_curso, $id_campus);
		

		$options = "<option selected value desable> Selecione um Curso </option>";


/*
		return response()->json($response); 
*/		

		foreach ($nom_turno as $n) {
			
			$options .= "<option value='{$n->cod_turno}'>$n->nom_turno</option>" . PHP_EOL;
		}

		return $options;
	
	}


	public function getTurnoById($nCurs = null, $nCamp = null) {

			$Turnos = Campus_Curso::select('cod_turno', 'nom_turno')
								->distinct()
								->where('cod_curso', $nCurs)
								->where('cod_campus', $nCamp)
								->orderby('nom_turno')
								->get();

			return  $Turnos;

}


	public function getRegraAtuacao($atuacao){

			$regra = regra_atuacao::select('usa_campus', 'usa_curso', 'usa_tipo_curso')
								->where('cod_tipo_atuacao','=', (string)$atuacao)
								->get(); 

		return $regra;

	}


}

