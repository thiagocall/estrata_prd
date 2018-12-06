@extends('layout.app')
@section('title','Busca')
@section('content')

<div class="container-fluid">

  <div class="row" style="padding-left: 3%; padding-right: 3%; padding-top: 1%">
   

      <div class="col-md-3">

        <label for="regional"><strong>Regional:</strong></label>
        <select class="form-control" id="regional">
          <option  selected value> Selecione uma Regional </option>
        
          @foreach ($regional as $reg)
          <option value="{{$reg->REGIONAL}}">{{$reg->REGIONAL}}</option>{{PHP_EOL}}
          @endforeach

        </select>
      </div>
      <div class="col-md-3">

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
      <div class="col-md-2">
        <label for="cpf"><strong>CPF:</strong></label>
        <input type ="text" class="form-control" id="cpf" placeholder="Digite o cpf (ou parte)">
      </div>

      <div class="col-md-1" style='padding-top: 32px'>
        <button class="btn btn-primary" id='btn_buscar'><span class="fas fa-search"></span></button>
      </div>


 </div>

  <div class="container mt-4 pt-5 pb-5" style="padding-top: 5%; border-radius: 5px; box-shadow: 0px 0px 12px #B1B1B1">
    
    <div class="col-md-12 p-0 ">

      <table class="table" id="tb_professor">
        <thead>
          <tr>
            <th scope="col" width="470px">Nome</th>
            <th scope="col" width="165px">CPF</th>
            <th scope="col">Titulação</th>
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
