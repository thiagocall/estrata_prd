@extends('layout.app')
@section('title','Busca')
@section('content')

<div class="container-fluid">

  <div class="row" style="padding-left: 3%; padding-right: 3%; padding-top: 1%">
   
      <div class="col-md-3">
        <label for="cpf"><strong>Busca Professor:</strong></label>
        <input type ="text" class="form-control" id="cpf" placeholder="Cpf, Matricula ou Nome...">
      </div>

      <div class="col-md-1 pl-0" style='padding-top: 32px'>
        <button class="btn btn-primary" id='btn_buscaProfessor' ><span class="fas fa-search"></span></button>
      </div>

 </div>

  <div class="container mt-4 pt-5 pb-5" style="padding-top: 5%; border-radius: 5px; box-shadow: 0px 0px 12px #B1B1B1">
    
    <div class="col-md-12 p-0 ">

      <table class="table" id="tb_professor">
        <thead>
          <tr>
            <th scope="col" width="465px">Nome</th>
            <th scope="col" width="170px">Matricula</th>
            <th scope="col" width="230px">Data Admissão</th>
            <th scope="col">CPF</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <!--<tbody id="lista">
          -- Recebe dados
        </tbody>  -->
      </table>

      <div id="lista">
        

        
      </div>

      <!--<div class="container fixed-bottom text-center" id="canvas_1" style="width: 180px;height: 80px; left: 88%; bottom:4%;display: none"> -->
  
   <!--<canvas id="chart_TI" width="500" height="300"> 
   </canvas> 
  </div> -->
      
      </div>
  </div> 

</div>
    <span class="fa fa-eject fixed-bottom text-center btn btn-primary" id="btnMostResumo" style="width: 35px;height: 35px; left: 95%; bottom:-2.4%;border-radius: 16.5px; padding: 0px; display:none; box-shadow: 0px 0px 11px #6F6F6F;" onclick="showResumo()"></span>
   <div class="card fixed-bottom" id="canvas_1" style="width: 160px;height: 240px; left: 89%; bottom:0%; box-shadow: 0px 0px 11px #6F6F6F;display: none;">
      <div class="card-body p-2" id="resumo">
        
      </div>

   </div>


  @include('javascript.professores')
  @endsection
