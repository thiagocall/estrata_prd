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


        //############ Professores em relação

        $professoresDif= Professores::doesntHave('Info')->get()->count() * (-1);


        //############ 


        //######################## Regime ##########################

        
            $professoresTI = Professores::whereHas('Info', function($query) {
                $query->where('Regime_Ajustado', '=' ,"TEMPO INTEGRAL");
            })->where('IND_EXERCICIO','SIM')->get();

             $professoresTP = Professores::whereHas('Info', function($query) {
                $query->where('Regime_Ajustado', '=' ,"TEMPO PARCIAL");
            })->where('IND_EXERCICIO','SIM')->get();

             $professoresH = Professores::whereHas('Info', function($query) {
                $query->where('Regime_Ajustado', '=' ,"HORISTA")
                      ->orWhere('Regime_Ajustado', '=' ,"CHZ/AFASTADO")
                      ->orWhere('Regime_Ajustado','=',null);
            })->where('IND_EXERCICIO','SIM')->get();

            $qtdAtivos = $professores->count() + $professoresDif;
            $qtdTI = $professoresTI->count();
            $qtdTP = $professoresTP->count();
            $qtdH = $professoresH->count();


        //####################### Titulação ############################

          $professoresDoutor = Professores::whereHas('Info', function($query) {
                                      $query->where('Titulacao_Considerada', '=' ,"DOUTOR");})
                                  ->where('IND_EXERCICIO','SIM')->get();

          $professoresMestre = Professores::whereHas('Info', function($query) {
                                      $query->where('Titulacao_Considerada', '=' ,"MESTRE");})
                                  ->where('IND_EXERCICIO','SIM')->get();

           $professoresEspecialista = Professores::whereHas('Info', function($query) {
                                      $query->where('Titulacao_Considerada', '=' ,"ESPECIALISTA");})
                                  ->where('IND_EXERCICIO','SIM')->get();

           $professoresNA = Professores::whereHas('Info', function($query) {
                                      $query->where('Titulacao_Considerada', '=' ,"GRADUADO")
                                            ->orWhere('Titulacao_Considerada', '=' ,"NÃO IDENTIFICADA");})
                                  ->where('IND_EXERCICIO','SIM')->get();



            $qtdDoutor = $professoresDoutor->count();
            $qtdMestre = $professoresMestre->count();
            $qtdEspecialista = $professoresEspecialista->count();
            $qtdNA = $professoresNA->count();
            

        return view('Professores.index', ['qtdTI' => $qtdTI, 'qtdAtivos' => $qtdAtivos, 'qtdTP' => $qtdTP, 'qtdH' => $qtdH, 'qtdDoutor' => $qtdDoutor, 'qtdMestre' => $qtdMestre, 'qtdEspecialista' => $qtdEspecialista, 'qtdNA' => $qtdNA]);
        }

    public function mostrar ($cpf_){


    	$professor = Professores::find($cpf_);


    	if ($professor->sexo == 'F') {

    		$professor->sexo = 'Feminino';
    	}

    		else{

    			$professor->sexo = 'Masculino';
    		}
    		

    	if ($professor->IND_BOLSA_PESQ == 'S') {

    		$professor->IND_BOLSA_PESQ = 'Sim';
    	}

    		else{

    			$professor->IND_BOLSA_PESQ = 'Não';
    		}
        

    	return  view('Professores.mostrar', ['professor' => $professor]);
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

       
        //############## Parâmetros da pesquisa ####################\\

            $tick_cpf = false;
            $id_campus = $request->post('id_campus');
            $cpf = $request->post('cpf');
            $id_ies = $request->post('id_ies');       
            
            if ($cpf == "" && $id_campus !="") {

            $campus = Professor_Curso::select('CPF_PROFESSOR')->with('Info')
                      ->where('COD_CAMPUS', '=', $id_campus)
                      ->distinct('CPF_PROFESSOR')
                      ->get();

                }

            
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

                 $campus = Professor_Curso::select('CPF_PROFESSOR')
                              ->where('CPF_PROFESSOR','=', '999999999999999')
                              ->distinct('CPF_PROFESSOR')
                              ->get();
                              $tick_cpf = true;

                }



        //############## Monta Quantidade de Professores ###########\\


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


        //############## Monta Corpo HTML ###########################\\//####### Reduzida a quandtidade de informações ###########\\
              



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
                    $corpo .= "<div class='row pt-2'>";
                    $corpo .= "<div class='col-md-6'><div class='container'>" . PHP_EOL;
                    $corpo .= "<p><strong>Regime Atual: </strong> " .  $p->Professor->Info->Regime_Ajustado . " </p>";
                    $corpo .= "<p><strong>Professor Ativo: </strong>" . $p->Professor->Info->ind_ativo . "</p>";
                    $corpo .= "</div></div>" . PHP_EOL;

                    $corpo .= "<div class='col-md-6'><div class='container'>" . PHP_EOL;
                    $corpo .= "<div class='container'>" . PHP_EOL;
                    //$corpo .= "<p><strong>Titulação Docente: </strong>" .  $p->Professor->Info->Titulacao_Considerada . "</p>";
                    
                    $corpo .= "<p><strong>Tem Pesquisa? </strong>" . (($p->Professor->IND_BOLSA_PESQ == "") ? "NÃO" : "SIM") . "</p>";
                    
                    $url_res = url("mostrar/" . $p->CPF_PROFESSOR);
                    
                    $corpo .=  "<strong>Ver mais detalhes:</strong><span class='btn fas fa-2x fa-user-circle x2 rounded-circle m-0 pt-0' onclick=window.open(&quot;" . $url_res . "&quot)" ." style='color:#0EACCB;' target = '_blank'></span>"; //href=" . url("mostrar/". $p->CPF_PROFESSOR)
                    //$corpo .= "><span class='fas fa-2x fa-user-circle x2 m-0' style=color:#fff></span></button>";

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

                $perc_TI =  round($qtdTI/$total * 100) . "%";
                $perc_TP =  round($qtdTP/$total* 100) . "%";
                $perc_H =  round($qtdH/$total* 100) . "%";


                //########## monta resumo para html ############
                    $detalhes .= "<h5 class='card-title' >Resumo";
                    $detalhes .= "<button type='button' class='close' aria-label='Close' onClick='hideResumo()'>". PHP_EOL;
                    $detalhes .= "<span aria-hidden='true'>&times;</span>". PHP_EOL;
                    $detalhes .= "</button></h5>" . PHP_EOL;
                    $detalhes .= "<p class='card-text mb-2'>" . PHP_EOL;
                    $detalhes .= "Tempo Integral(<small>{$qtdTI}</small>)" . PHP_EOL;
                    $detalhes .= "<div class='progress' style='height:5px'>
                                      <div class='progress-bar bg-info' role='progressbar' style='width:{$perc_TI} ' aria-valuenow='{$qtdTI}' aria-valuemin='0' aria-valuemax='{$total}'></div>
                                    </div>";
                    //$detalhes .= "<progress value='{$qtdTI}' max='{$campus->count()}' style='height: 10px;width: 80%'></progress>" . PHP_EOL;
                    $detalhes .= "</p>" . PHP_EOL;
                    $detalhes .= "<p class='card-text mb-2'>" . PHP_EOL;
                    $detalhes .= "Tempo Parcial(<small>{$qtdTP}</small>)" . PHP_EOL;
                    $detalhes .= "<div class='progress' style='height:5px'>
                                    <div class='progress-bar bg-info' role='progressbar' style='width: {$perc_TP}' aria-valuenow='{$qtdTP}' aria-valuemin='0' aria-valuemax='{$total}'></div>
                                  </div>";
                    //$detalhes .= "<progress value='{$qtdTP}' max='{$campus->count()}' style='height: 10px;width: 80%'></progress>" . PHP_EOL;
                    $detalhes .= " </p>" . PHP_EOL;
                    $detalhes .= " <p class='card-text mb-2'>" . PHP_EOL;
                    $detalhes .= " Horista(<small>{$qtdH}</small>)" . PHP_EOL;
                    $detalhes .= "<div class='progress' style='height:5px'>
                                    <div class='progress-bar bg-info' role='progressbar' style='width: {$perc_H}' aria-valuenow='{$qtdH}' aria-valuemin='0' aria-valuemax='{$total}'></div>
                                  </div>";

                    //$detalhes .= " <progress value='{$qtdH}' max='{$campus->count()}' style='height: 10px;width: 80%'></progress>" . PHP_EOL;
                    $detalhes .= " </p>" . PHP_EOL;
                    
                    $detalhes .= " <p class='card-text'>" . PHP_EOL;
                    $detalhes .= " <strong>Total - {$campus->count()}</strong>" . PHP_EOL;
                    $detalhes .= " </p>" . PHP_EOL;

                    /*$detalhes .= "<div class='progress'><div class='progress-bar' role='progressbar' style='width: 25%;' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'>25%</div></div>"; */

                if ($total == 0){
                     $corpo = "Não há professores para essa pesquisa.";
                     $tick_cpf = true;
                   }


                $data = ['corpo' => $corpo,'mostra_grafico' => !$tick_cpf, 'qtdTI' => $qtdTI, 'qtdTP' => $qtdTP, 'qtdH' => $qtdH, 'qtdTotal' => $campus->count(), 'detalhes' => $detalhes];





            return $data;
            
            }

    public function detalhePDF($cpf){


      $professor = Professores::find($cpf);


      if ($professor->sexo == 'F') {

        $professor->sexo = 'Feminino';
      }

        else{

          $professor->sexo = 'Masculino';
        }
        

      if ($professor->IND_BOLSA_PESQ == 'S') {

        $professor->IND_BOLSA_PESQ = 'Sim';
      }

        else{

          $professor->IND_BOLSA_PESQ = 'Não';
        }
        

     return \PDF::loadView('Professores.exportToPDF',compact('professor'))
                  ->setPaper('a4', 'landscape')->setWarnings(false)
                  ->stream('Resumo_' . $cpf . '.PDF');


        }

    public function ResumoPorCampus(Request $request){

                  
                 $id_campus = $request->post('id_campus');

                 ($request->post('id_ativos') == 'true') ? $ind_ativos = ['SIM'] : $ind_ativos = array('SIM', 'NÃO');


                  $id_campus = $request->post('id_campus');

                  ($request->post('id_ativos') == 'true') ? ($ind_ativos = ['SIM']) : ($ind_ativos = ['SIM', 'NÃO']);


                  $professores = Professor_Curso::
                                  whereHas('Info', function($query) use ($ind_ativos) {
                                             $query->whereIn('ind_ativo', $ind_ativos);})
                                  ->where('COD_CAMPUS' ,$id_campus);


                   $qtdTotal =  $professores
                                  ->distinct('CPF_PROFESSOR')
                                  ->count('CPF_PROFESSOR');



                    $qtdTI = Professor_Curso::select('CPF_PROFESSOR')
                                  ->whereHas('Info', function($query) use ($ind_ativos) {
                                             $query->where('Regime_Ajustado','TEMPO INTEGRAL')
                                             ->whereIn('ind_ativo', $ind_ativos);})
                                  ->where('COD_CAMPUS' ,$id_campus)
                                 ->distinct()
                                 ->get()
                                  ->count('CPF_PROFESSOR');
                                
                   
                   $qtdTP = Professor_Curso::select('CPF_PROFESSOR')
                                  ->whereHas('Info', function($query) use ($ind_ativos) {
                                             $query->where('Regime_Ajustado','TEMPO PARCIAL')
                                             ->whereIn('ind_ativo', $ind_ativos);})
                                  ->where('COD_CAMPUS' ,$id_campus)
                                 ->distinct()
                                 ->get()
                                  ->count('CPF_PROFESSOR');

                    
                    $qtdH = Professor_Curso::select('CPF_PROFESSOR')
                                   ->whereHas('Info', function($query) use ($ind_ativos) {
                                             $query->where('Regime_Ajustado','HORISTA')
                                             ->whereIn('ind_ativo', $ind_ativos);})
                                   ->where('COD_CAMPUS' ,$id_campus)
                                 ->distinct()
                                  ->count('CPF_PROFESSOR');



                    $qtdDoutor = Professor_Curso::select('CPF_PROFESSOR')
                                   ->whereHas('Info', function($query) use ($ind_ativos) {
                                             $query->where('Titulacao_Considerada','DOUTOR')
                                             ->whereIn('ind_ativo', $ind_ativos);})
                                   ->where('COD_CAMPUS' ,$id_campus)
                                  ->distinct()
                                  ->count('CPF_PROFESSOR');


                    $qtdMestre = Professor_Curso::select('CPF_PROFESSOR')
                                   ->whereHas('Info', function($query) use ($ind_ativos) {
                                             $query->where('Titulacao_Considerada','MESTRE')
                                             ->whereIn('ind_ativo', $ind_ativos);})
                                   ->where('COD_CAMPUS' ,$id_campus)
                                  ->distinct()
                                  ->count('CPF_PROFESSOR');


                    $qtdEspecialista = Professor_Curso::select('CPF_PROFESSOR')
                                   ->whereHas('Info', function($query) use ($ind_ativos) {
                                             $query->where('Titulacao_Considerada','ESPECIALISTA')
                                             ->whereIn('ind_ativo', $ind_ativos);})
                                   ->where('COD_CAMPUS' ,$id_campus)
                                  ->distinct()
                                  ->count('CPF_PROFESSOR');


                    $qtdNA = Professor_Curso::select('CPF_PROFESSOR')
                                   ->whereHas('Info', function($query) use ($ind_ativos) {
                                             $query->where('Titulacao_Considerada','NÃO IDENTIFICADA')
                                             ->whereIn('ind_ativo', $ind_ativos);})
                                   ->where('COD_CAMPUS' ,$id_campus)
                                  ->distinct()
                                  ->count('CPF_PROFESSOR');


                    $perc_DM =  round(($qtdMestre + $qtdDoutor)/$qtdTotal * 100) . "%";
                    $perc_D =  round($qtdDoutor/$qtdTotal* 100) . "%";
                    $perc_TI =  round($qtdTI/$qtdTotal* 100) . "%";
                    $perc_R =  round(($qtdTI + $qtdTP)/$qtdTotal* 100) . "%";


                            $data = ['qtdTI' => $qtdTI,
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
                                     'perc_R' => $perc_R,
                                     'id_campus' => $id_campus
                                   ];

                        return $data;


      }
}
