<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instituicao;
use App\Regional;
use App\Professor_Curso;
use App\Professores;
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

}
