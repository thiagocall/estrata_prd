<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instituicao;
use App\Regional;
use App\Professor_Curso;
use App\Professores;
use App\Professor_Matricula;
use Excel;


class RelatorioController extends Controller
{
	

	//Relatório Professores P1


	Public function Busca(){


		/*
		$dados = Campus::get();
		//return view('Relatorios.busca', ['dados' => $dados]);
		return ($dados);
		*/

		$regional = Regional::where('REGIONAL', 'NOT LIKE', 'INEXISTENTE')
							->distinct('REGIONAL')
							->SELECT('REGIONAL')
							->ORDERBY('REGIONAL')
							->get();

		$ies = Instituicao::get();



		return view('Relatorios.busca', ['regional' => $regional , 'ies' => $ies, 'teste' => false]);
		//return ($regional);


		}


	Public function BuscaPorCampus() {


	   $regional = Regional::where('REGIONAL', 'NOT LIKE', 'INEXISTENTE')
							->distinct('REGIONAL')
							->SELECT('REGIONAL')
							->ORDERBY('REGIONAL')
							->get();


	   $ies = Instituicao::get();


	   $ind_ativos = ['SIM'];


	   $professores = Professor_Curso::
                                  whereHas('Info', function($query) use ($ind_ativos) {
                                             $query->whereIn('ind_ativo', $ind_ativos);});


       $qtdTotal =  $professores
                      ->distinct('CPF_PROFESSOR')
                      ->count('CPF_PROFESSOR');



        $qtdTI = Professor_Curso::select('CPF_PROFESSOR')
                      ->whereHas('Info', function($query) use ($ind_ativos) {
                                 $query->where('Regime_Ajustado','TEMPO INTEGRAL')
                                 ->whereIn('ind_ativo', $ind_ativos);})
                     ->distinct()
                     ->get()
                      ->count('CPF_PROFESSOR');
                    
       
       $qtdTP = Professor_Curso::select('CPF_PROFESSOR')
                      ->whereHas('Info', function($query) use ($ind_ativos) {
                                 $query->where('Regime_Ajustado','TEMPO PARCIAL')
                                 ->whereIn('ind_ativo', $ind_ativos);})
                     ->distinct()
                     ->get()
                      ->count('CPF_PROFESSOR');

        
        $qtdH = Professor_Curso::select('CPF_PROFESSOR')
                       ->whereHas('Info', function($query) use ($ind_ativos) {
                                 $query->where('Regime_Ajustado','HORISTA')
                                 ->whereIn('ind_ativo', $ind_ativos);})
                     ->distinct()
                      ->count('CPF_PROFESSOR');


        $qtdDoutor = Professor_Curso::select('CPF_PROFESSOR')
                       ->whereHas('Info', function($query) use ($ind_ativos) {
                                 $query->where('Titulacao_Considerada','DOUTOR')
                                 ->whereIn('ind_ativo', $ind_ativos);})
                     ->distinct()
                      ->count('CPF_PROFESSOR');


        $qtdMestre = Professor_Curso::select('CPF_PROFESSOR')
                       ->whereHas('Info', function($query) use ($ind_ativos) {
                                 $query->where('Titulacao_Considerada','MESTRE')
                                 ->whereIn('ind_ativo', $ind_ativos);})
                      ->distinct()
                      ->count('CPF_PROFESSOR');


        $qtdEspecialista = Professor_Curso::select('CPF_PROFESSOR')
                       ->whereHas('Info', function($query) use ($ind_ativos) {
                                 $query->where('Titulacao_Considerada','ESPECIALISTA')
                                 ->whereIn('ind_ativo', $ind_ativos);})
                      ->distinct()
                      ->count('CPF_PROFESSOR');


        $qtdNA = Professor_Curso::select('CPF_PROFESSOR')
                       ->whereHas('Info', function($query) use ($ind_ativos) {
                                 $query->where('Titulacao_Considerada','NÃO IDENTIFICADA')
                                 ->whereIn('ind_ativo', $ind_ativos);})
                      ->distinct()
                      ->count('CPF_PROFESSOR');


        $perc_DM =  round(($qtdMestre + $qtdDoutor)/$qtdTotal * 100) . "%";
        $perc_D =  round($qtdDoutor/$qtdTotal* 100) . "%";
        $perc_TI =  round($qtdTI/$qtdTotal* 100) . "%";
        $perc_R =  round(($qtdTI + $qtdTP)/$qtdTotal* 100) . "%";


                $data = ['regional' => $regional,
                		 'ies' => $ies,
                		 'qtdTI' => $qtdTI,
                         'qtdTP' => $qtdTP,
                         'qtdH' => $qtdH,
                         'qtdDoutor' => $qtdDoutor,
                         'qtdMestre' => $qtdMestre,
                         'qtdEspecialista' => $qtdEspecialista,
                         'qtdTotal' => $qtdTotal,
                         'qtdNA' => $qtdNA,
                         'perc_DM' => $perc_DM,
                         'perc_D' => $perc_D,
                         'perc_TI' => $perc_TI,
                        'perc_R' => $perc_R
                         ];

				return view('Relatorios.resumoPorCampus', $data); //Teste de variável para altereção de classe no menu dropdown
				//return ($regional);

				}


	Public function ExportToFile($id_campus, $type_file){


			if ($id_campus != "") {
			
			 $data = Professor_Curso::selectRaw('COD_IES,
				 								NOM_IES, 
				 								COD_CAMPUS, 
				 								NOM_CAMPUS, 
				 								COD_CURSO, 
				 								NOM_CURSO, 
				 								QtdAlunos,
				 								CPF_PROFESSOR, 
				 								Titulacao_Considerada as TITULACAO, 
				 								Regime_Ajustado as REGIME')
					 			  ->where('COD_CAMPUS',$id_campus)
					 			  ->leftjoin('TbMATRIZ_PROFESSOR','CPF_PROFESSOR','=','CPF')
			                      ->get()
			                      ->toArray();

	       return Excel::create('Resumo_' . $id_campus , function($excel) use ($data) {
								$excel->sheet('Resumo', function($sheet) use ($data) {
						$sheet->fromArray($data);
			        		});
						})->download($type_file);

	   					}

			}


	public function BuscaProfessor(Request $request){


			$busca = $request->post('busca');
			//with('Matricula')    ##### Usando para carregar o modelo em eager load
			$professores = Professores::WhereHas('Matricula', function($query) use ($busca) {
								$query->where('NUM_MATRICULA','=', $busca)
									  ->where('IND_TIPO_CONTRATO','<>', 'S');})
							->orWhere('CPF','=', $busca)
							->get();

			$corpo = "";


			foreach ($professores as $p) {
				
				foreach ($p->Matricula as $m) {

					$corpo .= "<div class='row'>" . PHP_EOL;
					$corpo .= "<div class='col-md-5'>" .$p->NOME . "</div>" . PHP_EOL;
		            $corpo .= "<div class='col-md-2'>" .$m->NUM_MATRICULA . "</div>" . PHP_EOL;
		            $corpo .= "<div class='col-md-2'>" . date("d/m/Y", strtotime($m->DT_ADMISSAO_PROFESSOR)) . "</div>" . PHP_EOL;
		            $corpo .= "<div class='col-md-1'>{$p->CPF}</div>" . PHP_EOL;
					$corpo .= "<div class='col-md-2 ml-0'><a target='_blank'" . "href='" . url("/buscaProfessor") . "/" . $m->NUM_MATRICULA . "' ><span class='btn fas fa-search-plus' style='color:#4742F0;'</span></a></div>" . PHP_EOL;
					$corpo .= "</div>" . PHP_EOL;
					$corpo .= "<hr>" . PHP_EOL;

				}
			}	


			if ($professores->count() == 0)
			{

				$data = [ 'corpo' => 'Ops! Não foram encontrados professores para sua pesquisa.'];				

			}
			else {

				$data = [ 'corpo' => $corpo];

			}

			return $data;

			}


	public function VerProfessor ($matricula){

			
			
			$matricula = Professor_Matricula::with('Professor','Sindicato')
								->find($matricula);


			  return view("Relatorios.mostrarProfessor", compact('matricula','professor'));
			  //return ['Matricula' => $matricula->Professor->DT_NASCIMENTO];

	}

}
