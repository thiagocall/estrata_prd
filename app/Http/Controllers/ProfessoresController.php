<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professores;
use App\Regional;
use App\Professor_Curso;


class ProfessoresController extends Controller
{


    public function inicial (){

    	$professores = Professores::paginate(20);
        //$professores = Professores::All();

        return view('Professores.listaprofessor', ['title' => 'Professores', 'professores' => $professores]);

        }

    public function dashboards (){

        $professores = Professores::where('IND_EXERCICIO','SIM')
                       ->get();
        
        $professoresTI = Professores::whereHas('Info', function($query) {
            $query->where('Regime_Ajustado', '=' ,"TEMPO INTEGRAL");
        })->where('IND_EXERCICIO','SIM')->get();

         $professoresTP = Professores::whereHas('Info', function($query) {
            $query->where('Regime_Ajustado', '=' ,"TEMPO PARCIAL");
        })->where('IND_EXERCICIO','SIM')->get();

         $professoresH = Professores::whereHas('Info', function($query) {
            $query->where('Regime_Ajustado', '=' ,"HORISTA");
        })->where('IND_EXERCICIO','SIM')->get();

        
        $qtdAtivos = $professores->count();
        $qtdTI = $professoresTI->count();
        $qtdTP = $professoresTP->count();
        $qtdH = $professoresH->count();

        

        return view('Professores.index', ['qtdTI' => $qtdTI, 'qtdAtivos' => $qtdAtivos, 'qtdTP' => $qtdTP, 'qtdH' => $qtdH]);

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


    	return view('Professores.mostrar', ['professor' => $professor]);
        }


    public function getIES_Reg(Request $request){

            $id_regional = $request->post('id_regional');

            $ies = Regional::select('NOM_IES', 'COD_IES')
                      ->where('REGIONAL', '=', $id_regional)
                      ->distinct('COD_IES')
                      ->get();

            $total = $ies->count();

            $options = "<option selected value desable> Selecione uma IES ({$total}) </option>";
        

            foreach ($ies as $n) {
                
                $options .= "<option value='{$n->COD_IES}'>$n->NOM_IES</option>" . PHP_EOL;
            }
            
            //return  ['options' => $options, 'corpo_1' => $corpo_1, 'corpo_2' => $corpo_2];

            return  ['options' => $options];
            //return  ['options' => 'OI'];
            }


    public function getCampus_IES(Request $request){

            $id_ies = $request->post('id_ies');

            $campus = Regional::select('CAMPUS', 'COD_CAMPUS')
                      ->where('COD_IES', '=', $id_ies)
                      ->distinct('COD_CAMPUS', 'CAMPUS')
                      ->get();

            $total = $campus->count();

            $options = "<option selected value desable> Selecione um Campus ({$total}) </option>";
        
            foreach ($campus as $n) {
                
                $options .= "<option value='{$n->COD_CAMPUS}'>$n->CAMPUS</option>" . PHP_EOL;
                }
            
            //return  ['options' => $options, 'corpo_1' => $corpo_1, 'corpo_2' => $corpo_2];

            return  ['options' => $options];

            }


    public function lista_professor(Request $request){


           $id_campus = $request->post('id_campus');
           $cpf = $request->post('cpf');

     
            $campus = Professor_Curso::select('CPF_PROFESSOR')
                      ->where('COD_CAMPUS', '=', $id_campus)
                      ->orwhere('CPF_PROFESSOR', '=', $cpf)
                      ->distinct('CPF_PROFESSOR')
                      ->get();

            $total = $campus->count();

                $corpo = "";

                foreach($campus as $p)
                { 
                    $corpo .= "<tr>" . PHP_EOL; 
                    $corpo .= "<td>{$p->Professor->NOME}</td>" . PHP_EOL;
                    $corpo .= "<td>{$p->CPF_PROFESSOR}</td>" . PHP_EOL;
                    $corpo .= "<td>{$p->Info->Titulacao_Considerada}</td>" . PHP_EOL;
                    $corpo .= "<td><a class='fas fa-id-card' style='color:#273746' role='span'" . PHP_EOL;
                    $corpo .= "href=" . url("mostrar/". $p->Professor->ID); //$corpo .= "href=" . url("mostrar/". $p->Professor->ID);
                    $corpo .= " </a></td>" . PHP_EOL;
                    $corpo .= "</tr>" . PHP_EOL; 
                }

                if ($total == 0)
                     $corpo = "Não há professores para essa pesquisa.";



                 return ['campus' => $corpo];

            }


    public function lista_professor2(Request $request){

            $tick_cpf = false;
            $id_campus = $request->post('id_campus');
            $cpf = $request->post('cpf');
            $id_ies = $request->post('id_ies');


            //Preenche campus
            if ($cpf == "" && $id_campus !="") {

            $campus = Professor_Curso::select('CPF_PROFESSOR')
                      ->where('COD_CAMPUS', '=', $id_campus)
                      ->distinct('CPF_PROFESSOR')
                      ->get();

                }

            //Preenche CPF
                elseif($cpf!=""){

                    $campus = Professor_Curso::select('CPF_PROFESSOR')
                                ->where('CPF_PROFESSOR', 'like', '%' . $cpf . '%')
                                ->distinct('CPF_PROFESSOR')
                                ->get();
                                $tick_cpf = true;
                      
                }

                elseif($id_campus == "" && $cpf=="" && $id_ies !=""){

                   $campus = Professor_Curso::select('CPF_PROFESSOR')
                                ->whereHas('Campus', function($query) use ($id_ies) {
                                    $query->where('COD_IES', $id_ies);})
                                ->whereHas('Info', function($query) {
                                   $query->where('ind_ativo','SIM');})
                                ->distinct('CPF_PROFESSOR')
                                ->get();
                         
                }

                 elseif($id_campus == "" && $cpf=="" && $id_ies ==""){

                   $campus = Professor_Curso::select('CPF_PROFESSOR')
                                ->where('CPF_PROFESSOR','=', '999999999999999')
                                ->distinct('CPF_PROFESSOR')
                                ->get();
                                $tick_cpf = true;     
                     
                }

                else{

                    /* $campus = Professor_Curso::select('CPF_PROFESSOR')
                                  ->whereHas('Info', function($query) {
                                        $query->where('ind_ativo','SIM');})
                                  ->distinct('CPF_PROFESSOR')
                                  ->get();
                                   $tick_cpf = false;*/
                 $campus = Professor_Curso::select('CPF_PROFESSOR')
                              ->where('CPF_PROFESSOR','=', '999999999999999')
                              ->distinct('CPF_PROFESSOR')
                              ->get();
                              $tick_cpf = true;


                }

                if (!$tick_cpf) {
                    $qtdTP = 0;
                    $qtdH = 0;
                    $qtdTI = 0;

                   
                    $qtdTI = Professor_Curso::
                                  whereHas('Info', function($query) {
                                             $query->where('Regime_Ajustado','TEMPO INTEGRAL')
                                                   ->where('ind_ativo','SIM');})
                                  ->whereHas('Campus', function($query) use ($id_ies) {
                                             $query->where('COD_IES', $id_ies);})
                                  ->where('COD_CAMPUS' ,(($id_campus == "") ? '>' :'=') , (($id_campus == "") ? 0 : $id_campus))
                                  ->distinct()
                                  ->count('CPF_PROFESSOR');
                                
                   
                   $qtdTP = Professor_Curso::select('CPF_PROFESSOR')
                                  ->whereHas('Info', function($query) {
                                             $query->where('Regime_Ajustado','TEMPO PARCIAL')
                                                   ->where('ind_ativo','SIM');})
                                  ->whereHas('Campus', function($query) use ($id_ies) {
                                             $query->where('COD_IES', $id_ies);})
                                  ->where('COD_CAMPUS',(($id_campus == "") ? '>' :'=') , (($id_campus == "") ? 0 : $id_campus))
                                  ->distinct()
                                  ->count('CPF_PROFESSOR');

                    
                    $qtdH = Professor_Curso::select('CPF_PROFESSOR')
                                   ->whereHas('Info', function($query) {
                                             $query->where('Regime_Ajustado','HORISTA')
                                                   ->where('ind_ativo','SIM');})
                                   ->whereHas('Campus', function($query) use ($id_ies) {
                                             $query->where('COD_IES', $id_ies);})
                                  ->where('COD_CAMPUS' ,(($id_campus == "") ? '>' :'=') , (($id_campus == "") ? 0 : $id_campus))
                                  ->distinct()
                                  ->count('CPF_PROFESSOR'); 

                    }

                else { 
                      $qtdTI = 0; $qtdTP = 0; $qtdH = 0;}


                $total = $campus->count();

                $corpo = "";
                $detalhes = "";
                $resumo = "";

                foreach($campus as $p)
                { 
                    $corpo .= "<div class='row'>" . PHP_EOL;
                    $corpo .= "<div class='col-md-5'>{$p->Professor->NOME}</div>" . PHP_EOL;
                    $corpo .= "<div class='col-md-2'>{$p->CPF_PROFESSOR}</div>" . PHP_EOL;
                    $corpo .= "<div class='col-md-3'>{$p->Info->Titulacao_Considerada}</div>" . PHP_EOL;
                    $corpo .= "<div class='col-md-2'><button class='btn btn-outline-primary fas fa-plus '";
                    $corpo .= " onClick= 'mostraDetalhes(this)' id='{$p->CPF_PROFESSOR}' style='padding-top:0.4%;padding-bottom:0.4%;padding-right:2%;padding-left:2%; margin:0'></div>";
                    
                    //inicio detalhes
                    $corpo .= "<div name='md_detalhe' class='container rounded fechado' id='d_{$p->CPF_PROFESSOR}' style='display: none; padding:1%;margin-top:1%;";
                    $corpo .= "background-color:#F2FAFA'>" . PHP_EOL;
                    $corpo .= "<div class='container'>" . PHP_EOL;
                    $corpo .= "<h5 class='container'>Dados do Professor</h5>" . PHP_EOL;
                    
                    //início conteúdo
                    $corpo .= "<div class='row'>";
                    $corpo .= "<div class='col-md-6'><div class='container'>" . PHP_EOL;
                    $corpo .= "<div class='container'>" . PHP_EOL;
                    $corpo .= "<p><strong>Idade: </strong>". intval((strtotime(date("Y-m-d")) - strtotime($p->Professor->DT_NASCIMENTO))/86400/365.25) . "</p>";
                    $corpo .= "<p><strong>Nascimento: </strong>" .  date("d/m/Y", strtotime($p->Professor->DT_NASCIMENTO)) . "</p>";
                    $corpo .= "<p><strong>Sexo: </strong> " .  $p->Professor->SEXO . " </p>";
                    $corpo .= "<p><strong>Cidade de Nascimento: </strong>" . $p->Professor->MUNICIPIO_NASC . "</p>";
                    $corpo .= "</div>" . PHP_EOL;
                    $corpo .= "</div></div>" . PHP_EOL;

                    $corpo .= "<div class='col-md-6'><div class='container'>" . PHP_EOL;
                    $corpo .= "<div class='container'>" . PHP_EOL;
                    $corpo .= "<p><strong>Titulação Docente: </strong>" .  $p->Professor->Info->Titulacao_Considerada . "</p>";
                    $corpo .= "<p><strong>Regime Atual: </strong> " .  $p->Professor->Info->Regime_Ajustado . " </p>";
                    $corpo .= "<p><strong>Professor Ativo: </strong>" . $p->Professor->Info->ind_ativo . "</p>";
                    $corpo .= "<p><strong>Tem Pesquisa? </strong>" . (($p->Professor->IND_BOLSA_PESQ == "") ? "NÃO" : "SIM") . "</p>";;
                    $corpo .= "</div>" . PHP_EOL;
                    $corpo .= "</div></div></div>" . PHP_EOL;

                    $corpo .= "</div>" . PHP_EOL;

                    //fim conteúdo
                    $corpo .= "</div>" . PHP_EOL;
                    $corpo .= "</div>" . PHP_EOL;
                    //fim detalhes
                    $corpo .= "</div> " . PHP_EOL; 
                    $corpo .= "<hr> " . PHP_EOL;

                }

                //########## monta detalhes para html ############
                    $detalhes .= "<h5 class='card-title' >Resumo";
                    $detalhes .= "<button type='button' class='close' aria-label='Close' onClick='hideResumo()'>". PHP_EOL;
                    $detalhes .= "<span aria-hidden='true'>&times;</span>". PHP_EOL;
                    $detalhes .= "</button></h5>" . PHP_EOL;
                    $detalhes .= "<p class='card-text mb-2'>" . PHP_EOL;
                    $detalhes .= "Total TI(<small>{$qtdTI}</small>)" . PHP_EOL;
                    $detalhes .= "<progress value='{$qtdTI}' max='{$campus->count()}' style='height: 10px;width: 80%'></progress>" . PHP_EOL;
                    $detalhes .= "</p>" . PHP_EOL;
                    $detalhes .= "<p class='card-text mb-2'>" . PHP_EOL;
                    $detalhes .= "Total TP(<small>{$qtdTP}</small>)" . PHP_EOL;
                    $detalhes .= "<progress value='{$qtdTP}' max='{$campus->count()}' style='height: 10px;width: 80%'></progress>" . PHP_EOL;
                    $detalhes .= " </p>" . PHP_EOL;
                    $detalhes .= " <p class='card-text mb-4'>" . PHP_EOL;
                    $detalhes .= " Total Horista(<small>{$qtdH}</small>)" . PHP_EOL;
                    $detalhes .= " <progress value='{$qtdH}' max='{$campus->count()}' style='height: 10px;width: 80%'></progress>" . PHP_EOL;
                    $detalhes .= " </p>" . PHP_EOL;
                    $detalhes .= " <p class='card-text'>" . PHP_EOL;
                    $detalhes .= " <strong>Total - {$campus->count()}</strong>" . PHP_EOL;
                    $detalhes .= " </p>" . PHP_EOL;


                if ($total == 0){
                     $corpo = "Não há professores para essa pesquisa.";
                     $tick_cpf = true;
                   }

                //return ['corpo' => $corpo,'mostra_grafico' => !$tick_cpf, 'qtdTI' => $qtdTI];
                return ['corpo' => $corpo,'mostra_grafico' => !$tick_cpf, 'qtdTI' => $qtdTI, 'qtdTP' => $qtdTP, 'qtdH' => $qtdH, 'qtdTotal' => $campus->count(), 'detalhes' => $detalhes];
            }


}
