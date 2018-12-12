@extends('layout.app')
@section('title','Busca')
@section('content')


<div class="container-fluid mb-5">
  <div class="container" id="menssagem">
  </div>


  <div id="divMenuPesquisa" class="row aberto" style="padding-left: 3%; padding-right: 3%; padding-top: 1%">
   
      <div class="col-md-4">

        <label for="regional"><strong>Regional:</strong></label>
        <select class="form-control" id="regional">
          <option  selected value> Selecione uma Regional </option>
        
          @foreach ($regional as $reg)
          <option value="{{$reg->REGIONAL}}">{{$reg->REGIONAL}}</option>{{PHP_EOL}}
          @endforeach

        </select>
      </div>
      <div class="col-md-4">

        <label for="ies_"><strong>IES:</strong></label>
        <select class="form-control" id="ies">
          <option  selected value> -- </option>

        </select>
      </div>
      <div class="col-md-3">
        <label for="campus_"><strong>Campus de Atuação:</strong></label>
        <select class="form-control" id="campus">
          <option  selected value> -- </option>
        </select>
      </div>

      <div class="col-md-1" style='padding-top: 32px'>
        <button class="btn btn-primary" id="btnResumo" >Resumo</button>
      </div>


 <div class="row m-2">
  <div class="container" style="display: inline;">
    <input type="checkbox" id="professorAtivo" style="margin-top: 2%" checked=""> Apenas professores ativos
  </div>
 </div>
  </div>
 <hr class="mb-0">

 <div class="col-md-1 offset-11 p-0 mt-0">
 <button id="btnMostrarResultado" class="btn btn-primary p-0" data-toggle="tooltip" data-placement="top" title="abrir pesquisa" onclick ="menuPesquisa(this)" style="width: 25%;"><span id="btnImg" class="fa fa-minus-circle" style="margin-bottom: 0px;margin-right: 0px;"></span>
 </button>  
 </div>

  <div class="container">
    
    
    <div class="col-md-12">

     

      <div id="divResumo">

        <div class="row">
         <h3>Regime de Trabalho</h3>
       </div>
       <div class="col-md-12">
         <hr class="linha mb-4">
       </div>

       <div class="row mb-3" style="height: 145px; width: 100%">


        <div class="col-md-3">
          <div class="card card-professor h-100 w-100" style="background-color: #4488FC;">
            <h1 id="qtdTotal" class="num-indicador count"></h1>
            <h6 class="nom-indidacor">Professores</h6>
            <span class="logo-indicador far fa-3x fa-user" aria-hidden="true"></span>

          </div>
        </div>

        <div class="col-md-3">
          <div class="card card-professor h-100 w-100" style="background-color: #084267">
            <h1 id="qtdTI" class="num-indicador count" ></h1>
            <h6 class="nom-indidacor" >Tempo Integral</h6>
            <span class="logo-indicador fas fa-3x fa-check-circle" aria-hidden="true"></span>

          </div>
        </div>

        <div class="col-md-3">
          <div class="card card-professor h-100 w-100" style="background-color: #DDDE40">
            <h1 id="qtdTP" class="num-indicador count" ></h1>
            <h6 class="nom-indidacor" >Tempo Parcial</h6>
            <i class="logo-indicador far fa-3x fa-clock" aria-hidden="true"></i>

          </div>
        </div>


        <div class="col-md-3">
          <div class="card card-professor h-100 w-100" style="background-color: #E57A7A">
            <h1 id="qtdH" class="num-indicador count" ></h1>
            <h6 class="nom-indidacor" >Horista</h6>
            <span class="logo-indicador fa fa-3x fa-h-square" aria-hidden="true"></span>

          </div>
        </div>


      </div>

        <div class="row" style="height: 100px; width: 100%">


            <div class="col-md-4 offset-0">
             <h4>Tempo integral</h4>
              <div class="progress" style="height:20px; width: 100%" >
                  <div id ='perc_TI' class="progress-bar bg-primary" role="progressbar" style="" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                    <strong><i>--%</i></strong>
                  </div>    
            </div>
            </div>

            <div class="col-md-4 offset-0">
             <h4>Tempo integral + parcial</h4>
              <div class="progress" style="height:20px; width: 100%" >
                  <div id ='perc_R' class="progress-bar bg-primary" role="progressbar" style="" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                    <strong><i>--%</i></strong>
                  </div>    
            </div>
            </div>

        </div>
      <div class="row">
       <h3>Titulação</h3> 
     </div>
     <div class="col-md-12">
       <hr class="linha mb-4">
     </div>
     <div class="row mb-3" style="height: 145px; width: 100%">

            <div class="col-md-3 offset-0">
              <div class="card card-professor h-100 w-100" style="background-color: #084267">
                <h1 id="qtdDoutor" class="num-indicador count" ></h1>
                <h6 class="nom-indidacor" >Doutor</h6>
                <span class="logo-indicador fas fa-3x fa-university" aria-hidden="true"></span>

              </div>
            </div>

            <div class="col-md-3">
              <div class="card card-professor h-100 w-100" style="background-color: #6fc8bf"> 
                <h1 id="qtdMestre" class="num-indicador count" ></h1>
                <h6 class="nom-indidacor" >Mestre</h6>
                <span class="logo-indicador fas fa-3x fa-graduation-cap aria-hidden="true"></span>

              </div>
            </div>

            <div class="col-md-3">
              <div class="card card-professor h-100 w-100" style="background-color: #29c1f1">
                <h1 id="qtdEspecialista" class="num-indicador count" ></h1>
                <h6 class="nom-indidacor" >Especialista</h6>
                <span class="logo-indicador fab fa-3x fa-black-tie" aria-hidden="true"></span>

              </div>

              </div>

              <div class="col-md-3">
              <div class="card card-professor h-100 w-100" style="background-color: #E57A7A">
                <h1 id="qtdNA" class="num-indicador count" ></h1>
                <h6 class="nom-indidacor" >Não Informado</h6>
                <span class="logo-indicador far fa-3x fa-times-circle" aria-hidden="true"></span>

              </div>

              </div>


    </div>

     <div class="row" style="height: 100px; width: 100%">

            <div class="col-md-4 offset-0">
              <h4>Titulados</h4>
              <div class="progress mb-4" style="height:20px; width: 100%" >
                  <div id ='perc_DM' class="progress-bar bg-success" role="progressbar" style="" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                    <strong><i>--%</i></strong>
                  </div>    
            </div>
          </div>
            <div class="col-md-4 offset-0">
            <h4>Doutores</h4>
              <div class="progress mb-4" style="height:20px; width: 100%" >
                  <div id='perc_D' class="progress-bar bg-success" role="progressbar" style="" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                    <strong><i>--%</i></strong>
                  </div>    
            </div>
          </div>

      </div>

            </div>

    </div>


  <button id ="btnExport" class="btn fas fa-2x fa-file-excel fixed-bottom p-0" data-toggle="tooltip" data-placement="top" title="download Excel" style="left: 95%;bottom: 2%;color: #217346;" onClick="ExportExcel()"></button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal"" style="top:25%">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <div class="container text-center mt-1"> <img src="../images/WaitCover.gif" class="rounded rounded-circle mx-auto d-block" width=15%> processando... </div>
        </div>
      </div>
      
    </div>
  </div>
      
      </div>
  </div> 

</div>

@include('javascript.resumoPorCampus')
@endsection
