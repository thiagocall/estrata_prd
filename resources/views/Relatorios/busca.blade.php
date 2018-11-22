@extends('layout.app')
@section('title','Busca')
@section('content')


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
        <tbody id="lista">
          @if(isset($corpo))
            $corpo
          @else
            {{old('campus_')}}
          @endif

        </tbody>
      </table>
      
    </div>

    @endsection
