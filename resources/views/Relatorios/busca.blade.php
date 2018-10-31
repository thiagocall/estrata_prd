@extends('layout.app')
@section('title','Atuação Fixa')
@section('content')

<div class="container">
	<div class="form-group row">
  <div class="col-md-6">
      <label for="regional"><strong>Regional:</strong></label>
      <select class="form-control" id="regional">
       <option  selected value> Selecione uma Regional </option>
       @foreach ($regional as $reg)
       		 <option value="{{$reg->REGIONAL}}">{{$reg->REGIONAL}}</option>{{PHP_EOL}}
       @endforeach
       
      </select>

      	<label for="ies"><strong>IES:</strong></label>
        <select class="form-control" id="ies">
       <option  selected value> Selecione uma IES </option>
       @foreach ($ies as $i)
       		 <option value="{{$i->COD_INSTITUICAO}}">{{$i->NOM_INSTITUICAO}}</option>{{PHP_EOL}}
       @endforeach
       
      </select>
  </div>
</div>
</div>
@endsection