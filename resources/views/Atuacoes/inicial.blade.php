@extends('layout.app')
@section('title','Atuação Fixa')
@section('content')
<br>
<div class="container">

<h2>Lançamento de Atuação Fixa</h2>

<!--
<div class="jumbotron" style="margin-top: 20px">

</div>

-->

<br>
<br>

<form action="#" mezthod="POST" >
 @csrf
 <div class="form-group row">
  <div class="col-md-6">
      <label for="atuacao"><strong>Atuação:</strong></label>
      <select class="form-control" id="atuacao">
       <option  selected value> Selecione uma Atuação </option>
        @foreach($atuacoes as $a)
        <option value="{{$a->cod_tipo_atuacao}}">{{$a->nom_tipo_atuacao}}</option>{{PHP_EOL}}
        @endforeach
      </select>
  </div>
  <div class="col-md-6">
    <label for="ies"><strong>Ies:</strong></label>
      <select class="form-control" id="ies" disabled="">
       <option  selected value> Selecione uma Atuação </option>
      </select>
  </div>

  </div>

   <div class="form-group row">
  <div class="col-md-3">
      <label for="campus"><strong>Campus:</strong></label>
      <select class="form-control" id="campus" disabled="" required="true">
       <option  selected value > Selecione uma IES </option>
   
      </select>
  </div>
  <div class="col-md-6">
    <label for="curso"><strong>Curso:</strong></label>
      <select class="form-control" id="curso" disabled="">
       <option  selected value> Selecione um Campus </option>

      </select>
  </div>


<!--
  <div class="col-md-3">
    <label for="ies"><strong>Turno:</strong></label>
      <select class="form-control" id="turno" disabled="">
       <option  selected value> Selecione um Turno </option>
       
      </select>
    -->
  </div>

    
 </div>

 <div class="form-group">
  <div class="col-md-6">
    <label for="professores"><strong>Professores:</strong></label>
  <div class="input-group">
    <input type="text" id="busca" class="form-control" placeholder="matrícula ou nome">
      <div class="input-group-btn">
        <button class="btn btn-primary">
        <i class="fa fa-search fa-inverse"></i>
        </button>
      </div>
  </div>
</div>
 </div>

  <div class="form-group">
  <div class="col-md-6">
    <label for="prof"><strong>Disponíveis</strong></label>
 <select multiple class="form-control" id="prof">

  </select>
</div>
</div>


<div class="form-group">
 <div class="row justify-content-md-center">
    <div class="col-lg-auto">
      <button type="submit" class="btn btn-primary">Continuar</button>
    </div>
    <div class="col-lg-auto">
      <a href="{{url('/inicial')}}" class="btn btn-warning">Menu Principal</a>
    </div>
  </div>
</div>

</form>

@endsection
