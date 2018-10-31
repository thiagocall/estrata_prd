@extends('layout.app')
@section('title','Atuação Fixa')
@section('content')
<br>
<div class="container text-center mb-1">
  <h3>Lançamento de Atuação Fixa</h3>
  <hr>
</div>

<div class="container">

<form action="#" mezthod="POST" >
 @csrf
 <div class="form-group row">
  <div class="col-md-6">
      <label for="atuacao"><strong>Atuação:</strong></label>
      <select class="form-control" id="atuacao">
       <option  selected value> Selecione uma Atuação </option>
        @foreach($atuacoes as $a)
        <option value="{{$a->COD_TIPO_ATUACAO}}">{{$a->NOM_TIPO_ATUACAO}}</option>{{PHP_EOL}}
        @endforeach
      </select>
  </div>

  <div class="col-md-6">
    <label for="ies"><strong>Ies:</strong></label>
      <select class="form-control" id="ies" disabled="">

      </select>
  </div>
  </div>

   <div class="form-group row">
   
  <div class="col-md-3" id="corpo_1">
      
  </div>
  
  <div class="col-md-6" id="corpo_2">
    
  </div>

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
