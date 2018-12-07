@extends('layout.app')
@section('title','Detalhes')
@section('content')

<div class="container p-1">

  <div class="page-header">
    <h2><small> {{ ucwords(strtolower($matricula->Professor->NOME))}} - {{$matricula->NUM_MATRICULA}} </small></h2>
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
                         <p><strong>Nascimento:</strong> {{date("d/m/Y", strtotime($matricula->Professor->DT_NASCIMENTO))}} ({{intval((strtotime(date("Y-m-d")) - strtotime($matricula->Professor->DT_NASCIMENTO))/86400/365.25)}} anos)</p>
                         <p><strong>Sexo:</strong> {{$matricula->Professor->SEXO}} </p>
                     </div>
                     <div class="col-md-6">
                         <p><strong>Cidade de Nascimento: </strong> {{$matricula->Professor->MUNICIPIO_NASC}}</p>
                         <p><strong>Cpf: </strong>{{$matricula->CPF_PROFESSOR}}</p>
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
               <div class="col-md-2">
                <p><strong>Tipo Salário: </strong> {{($matricula->IND_TIPO_SALARIO == 'H')? 'Horista' : 'Mensalista'}}</p>
                <p><strong>Tipo Contrato: </strong> {{($matricula->IND_TIPO_CONTRATO == 'F')? 'Funcionário' : 'Prest. Serviços'}}</p>
              </div>
              <div class="col-md-4">

                <p><strong>Região Matrícula: </strong>{{ucwords(strtolower($matricula->NOM_REGIAO))}}</p>
                <p><strong>Tipo Salário: </strong> {{($matricula->IND_TIPO_SALARIO == 'H')? 'Horista' : 'Mensalista'}}</p>

              </div>

              <div class="col-md-6">
              <p><strong>Sindicato: </strong>{{$matricula->Sindicato->NOME_SINDICATO}}</p>
               <p><strong>Empresa: </strong>{{$matricula->Sindicato->NOME_EMPRESA}}</p>
              </div>
            </div>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Ver Cursos</button>
              <!--<small class="text-muted">9 mins</small>-->

            </div>
          </div>
        </div>

<button class="btn btn-outline-primary" id="btn_fechar"  ">Fechar </button>
<button class="btn btn-outline-primary" id="btn_expPDF" onclick = location.href='{{url("/detalhePDF/" . $matricula->Professor->CPF)}}'>Exportar para PDF</button>
      </div>
    </div>
      
    </div>
  </div>
</div>

<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Cursos do Professor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
             
              <p><strong>Curso</strong></p>
            </div>
            <div class="col-md-6">
              <p><strong>Campus</strong></p>
            </div>
          </div>

          
          
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

</div>
@include('javascript.professores')
@endsection