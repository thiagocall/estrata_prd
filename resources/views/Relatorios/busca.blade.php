@extends('layout.app')
@section('title','Busca')
@section('content')

<div class="container-fluid">
   <button type="button" class="btn btn-primary" id="btn1" onclick="mostraDetalhes(this)">Ver Cursos</button>
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
      <div class="col-md-2" style='padding-top: 32px'>
        <input type ="text" class="form-control" id="cpf" placeholder="CPF">
      </div>

      <div class="col-md-1" style='padding-top: 32px'>
        <button class="btn btn-primary" id='btn_buscar'><span class="fas fa-search"></span></button>
      </div>

    </form>


  <div class="container" style="padding-top: 5%">
    <div class="col-md-12">
      <table class="table" id="tb_professor">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
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
    </div>  
      

<div class="container fixed-bottom border" id="t_btn1" style="display: none; height: 50%; background-color:#DEE0E1">


  <div class="card" style="width: 50%; margin-top: 2%">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <h6 class="card-subtitle mb-6 text-muted">Card subtitle</h6>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
</div>

    @endsection
