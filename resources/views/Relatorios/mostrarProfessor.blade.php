@extends('layout.app')
@section('title','Detalhes')
@section('content')

<div class="container p-1">

  <div class="page-header">
    <h2><small> {{ucwords(mb_strtolower($matricula->Professor->NOME))}} - Matrícula: {{$matricula->NUM_MATRICULA}} </small></h2>
    <hr>      
  </div>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4 shadow-sm">
            <div class="card-body">
              <p class="card-text "><h4>Dados Pessoais <button id="btnPessoal"class="btn btn-outline-primary fas fa-angle-down p-0" data-toggle="collapse" data-target="#infoPessoal" arua-expended="false" aria-controls="infoPessoal" style="margin:0; width: 2%; box-shadow: none"></button></h4></p>
              <hr>
              <div id="infoPessoal" class="collapse container" >
                <div class="row">
                  <div class="col-md-6">
                   <p><strong>Nascimento:</strong> {{date("d/m/Y", strtotime($matricula->Professor->DT_NASCIMENTO))}}({{intval((strtotime(date("Y-m-d")) - strtotime($matricula->Professor->DT_NASCIMENTO))/86400/365.25)}} anos)</p>
                   <p><strong>Sexo:</strong> {{$matricula->Professor->SEXO}} </p>
                 </div>
                 <div class="col-md-6">
                   <p><strong>Cidade de Nascimento: </strong> {{mb_convert_case($matricula->Professor->MUNICIPIO_NASC,MB_CASE_TITLE) . "(" . $matricula->Professor->UF_NASC . ")"}}</p>
                   <p><strong>Cpf: </strong>{{$matricula->Professor->Cpf_Formatado() }}</p>
                 </div>
               </div>  
               <!--<small class="text-muted">9 mins</small>-->
             </div>
           </div>
         </div>
       </div>
     </div>
     <div class="row">
       <div class="col-md-12">
        <div class="card mb-4 shadow-sm">
          <div class="card-body">
            <p class="card-text "><h4>Dados Contratuais <button id="btnContrato" class="btn btn-outline-primary fas fa-angle-down p-0" data-toggle="collapse" data-target="#infoContrato" arua-expended="false" aria-controls="infoContrato" style="margin:0; width: 2%; box-shadow: none"></button></h4></p>
            <hr>
            <div id="infoContrato" class="collapse container">

                  <div class="row">
                         <div class="col-md-4">
                          <p><strong>Tipo Salário: </strong> {{($matricula->IND_TIPO_SALARIO == 'H')? 'Horista' : 'Mensalista'}}</p>
                            @if(count($matricula->Hora_Aula))
                              <p><strong>Hora Aula Composta: </strong> {{"R$ " . count($matricula->Hora_Aula) ? number_format($matricula->Hora_Aula->HORA_AULA_COMPOSTA, 2, ',','.') : "-"}} <button type="button" class="btn btn-outline-primary btn-sm pt-0 pb-0" data-toggle="modal" data-target="#conposicaoHoraAula"> <span data-toggle="tooltip" data-placement="top" title="Ver composição da hora/aula"> detalhes </span></button></p>
                            @else
                            <p><strong>Hora Aula Composta: </strong>R$ - </p>
                            @endif
                            <p><strong>Admissão em: </strong>{{date("d/m/Y",strtotime($matricula->DT_ADMISSAO_PROFESSOR))}}</p>
                        </div>
                          <div class="col-md-4">
                            <p><strong>Função: </strong> {{count($matricula->Sindicato) ? $matricula->Sindicato->NOME_FUNCAO : "-"}}</p>
                          <p><strong>Tipo Contrato: </strong> {{($matricula->IND_TIPO_CONTRATO == 'F')? 'Funcionário' : 'Prest. Serviços'}}</p>
                             <p><strong>IES: </strong>{{count($matricula->Hora_Aula) ? ucwords(mb_strtolower($matricula->Hora_Aula->IES)): "-"}}</p>

                          </div>

                          <div class="col-md-4">
                            <p><strong>Região Matrícula: </strong>{{mb_convert_case($matricula->NOM_REGIAO, MB_CASE_TITLE)}}</p>
                              <p><strong >Sindicato: </strong><span data-toggle="tooltip" data-placement="top" title="{{count($matricula->Sindicato) ? $matricula->Sindicato->NOME_SINDICATO_FULL : ""}}">{{count($matricula->Sindicato) ? mb_convert_case($matricula->Sindicato->NOME_SINDICATO, MB_CASE_TITLE) : "-"}}</span></p>
                             
                          </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>

       <div class="row">
       <div class="col-md-12">
        <div class="card mb-4 shadow-sm">
          <div class="card-body">
            <p class="card-text "><h4>Dados Regulatórios <button id="btnRegulatorio" class="btn btn-outline-primary fas fa-angle-down p-0" data-toggle="collapse" data-target="#infoRegulatorio" arua-expended="false" aria-controls="infoRegulatorio" style="margin:0; width: 2%; box-shadow: none"></button></h4></p>
            <hr>
            <div id="infoRegulatorio" class="collapse container">

                  <div class="row">
                          <div class="col-md-4">
                            @if(count($matricula->Professor->Titulacao))
                            <p><strong>Titulação SIA: </strong> {{ucwords(strtolower($matricula->Professor->Titulacao->TITULACAO))}}</p>
                            @else
                            <p><strong>Titulação SIA: </strong> - </p>
                            @endif
                          </div>
                          <div class="col-md-4">
                            @if(count($matricula->Professor->Titulacao_Lattes))
                            <p><strong>Titulação Lattes: </strong> {{ucwords(strtolower($matricula->Professor->Titulacao_Lattes->TITULACAO))}}</p>
                            @else
                            <p><strong>Titulação Lattes: </strong> - </p>
                            @endif
                          </div>
                         <div class="col-md-4">
                          <p><strong>Regime: </strong> {{ucwords(strtolower($matricula->Professor->Info->Regime_Ajustado))}}</p>

                        </div>

                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>


  <button class="btn btn-outline-primary" id="btn_fechar"  ">Fechar </button>
  <button class="btn btn-outline-primary" id="btn_expPDF" onclick = location.href='{{url("/detalhePDF/" . $matricula->NUM_MATRICULA)}}'>Exportar para PDF</button>
 <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#composicaoCH"> Ver Carga Horária do Professor </button>

  <!--<small class="text-muted">9 mins</small>-->

</div>
</div>
</div>

<!-- Button trigger modal -->

<!-- Modal -->

<!--detalhes Hora Aula -->
<div class="modal fade" id="conposicaoHoraAula" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
  <div class="modal-dialog" role="document" >
    <div class="modal-content center" style="width: 250%;left: -70%; top: 80px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Composição Hora/Aula (R$)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         @if(count($matricula->Hora_Aula))
        <div class="row">
         

          <div class="col-md-2 text-center">
            <p><strong data-toggle="tooltip" data-placement="top" title="Hora/Aula + Dif. Individual">Hora/Aula</strong></p>
            <p>{{number_format($matricula->Hora_Aula->HORA_SALARIO + $matricula->Hora_Aula->DIF_IND, 2,',','.')}} </p>

          </div>
           <div class="col-md-2 text-center" data-toggle="tooltip" data-placement="top" title="Adicionais de Convenção">
            <p><strong>Adic. Convenção</strong></p>
            <p>{{number_format($matricula->Hora_Aula->Valor_Convencao(), 2,',','.')}} </p>
          </div>

           <div class="col-md-2 text-center" data-toggle="tooltip" data-placement="top" title="Aprimoramento acadêmico">
            <p><strong>Adic. Titulação</strong></p>
            <p>{{number_format($matricula->Hora_Aula->Valor_Aprimoramento(), 2,',','.')}} </p>

          </div>
           <div class="col-md-2 text-center" data-toggle="tooltip" data-placement="top" title="Descanso Semanal Remunerado de 16,67%">
            <p><strong>DSR</strong></p>
            <p>{{number_format($matricula->Hora_Aula->Valor_DSR(), 2,',','.')}} </p>
          </div>

           <div class="col-md-2 text-center">
            <p><strong data-toggle="tooltip" data-placement="top" title="Adicional por Tempo de Serviço">ATS</strong></p>
            <p>{{number_format($matricula->Hora_Aula->Valor_ATS(), 2,',','.')}} </p>
          </div>
           <div class="col-md-2 text-center">
            <p><strong>Hora Aula</strong></p>
            <p>{{number_format($matricula->Hora_Aula->HORA_AULA_COMPOSTA, 2,',','.')}} </p>

          </div>
        </div>
        <hr>

        <div class="modal-header pl-0">
              <h5 class="modal-title pl-0" id="exampleModalLongTitle">Hora/Aula Detalhada</h5>
             </div>
        
          <div class="container m-3">
             
          <div class="row pt-5">
                <div class="col-md-3">
                  <h6>Adicional Convenção</h6>
                  <hr class="mt-0">
                  <p><strong>Obs: </strong>Adicionais concedidos através de acordos coletivos entre sindicato e empresa.</p>
                  <hr>
                  <p><strong>Total: </strong>{{($matricula->Hora_Aula->FATOR_CONVENCAO + $matricula->Hora_Aula->FATOR_AD_TERESINA  - 2) *100 . '%'}}</p>
                </div>
            
                <div class="col-md-3 offset-1">
                  <h6>Adicional por Titulação</h6>
                  <hr class="mt-0">
                  <p><strong>Nome: </strong>{{$matricula->Hora_Aula->Aprimoramento_Nome()}}</p>
                  <hr>
                  <p><strong>Total: </strong>{{($matricula->Hora_Aula->FATOR_APRIMORAMENTO - 1) *100 . '%'}}</p>
                </div>


          <div class="col-md-4 offset-1">
            <div class="container">
              <h6>Adicional por Tempo de Serviço</h6>

                <table class="table table-sm table-hover" style="width: 100%;">
                  <tbody>
                    <tr>
                      <td class="w-25"><strong>Anuênio:</strong></td>
                      <td class="w-5">{{$matricula->Hora_Aula->ANUENIO}}</td>
                      <td class="w-25"><strong>Quinquênio:</strong></td>
                      <td class="w-5">{{$matricula->Hora_Aula->QUINQUENIO}}</td>
                    </tr>
                      <tr>
                      <td class="w-25"><strong>Triênio:</strong></td>
                      <td class="w-5">{{$matricula->Hora_Aula->TRIENIO}}</td>
                      <td class="w-25"><strong>Decênio:</strong></td>
                      <td class="w-5">{{$matricula->Hora_Aula->DECENIO}}</td>
                    </tr>
                      <tr>
                      <td class="w-25"><strong>Quadriênio:</strong></td>
                      <td class="w-5">{{$matricula->Hora_Aula->QUADRIENIO}}</td>
                       <td class="w-25"></td>
                      <td class="w-5"></td>
                    </tr>
                  </tbody>
                </table>
                <hr>
                <p><strong>Total: </strong>{{number_format(($matricula->Hora_Aula->FATOR_ATS - 1) * 100, 0, ',','.')}}%</p>
                </div>
            </div>


          </div>
          </div>

          @else
          <div class="row">Sem informações de Hora Aula</div>
          @endif
      

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!------------>

<!--detalhes Regime -->
<div class="modal fade" id="composicaoCH" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Composição Carga Horária</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">

          @if($matricula->Carga_DS != null)
              <div class="col-md-4 text-center"> 
                <p><strong>Campus</strong></p>
                @foreach($matricula->CargaMes_DS() as $carga)
                  <p>{{$carga->NOM_CAMPUS}}</p>
                @endforeach
              </div>
              <div class="col-md-4  text-center">
                <p><strong>Curso</strong></p>
                  @foreach($matricula->CargaMes_DS() as $carga)
                    <p>{{$carga->NOM_CURSO}}</p>
                  @endforeach
              </div>
              <div class="col-md-4 text-center">
                <p><strong>Carga Horária Semanal</strong></p>
                  @foreach($matricula->CargaMes_DS() as $carga)
                    <p>{{number_format($carga->Qtd_Horas_Mov/4.5, 2,',','.')}}</p>
                  @endforeach
              </div>

              @else
              <p>Não há dados de Carga Horária</p>
              @endif
            </div>

      </div>
      <div class="container offset-9"><p><strong>Total DS: </strong> {{number_format($matricula->CargaMes_DS()->sum('Qtd_Horas_Mov')/4.5,2,',','.')}}</p></div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>



</div>
@include('javascript.professores')
@endsection