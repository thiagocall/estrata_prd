@extends('layout.app')
@section('title','Professores')
@section('content')
<div class="container">
<div class="container" style="margin-top: 20px padding:10%">

<h2>Lista de Professores</h2>

</div>
{{$professores->links()}}
<div class="container">
<table class="table" id="tb_professor">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">UF</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($professores as $p)
    <tr>
    	
      <td>{{$p->NOME}}</td>
      <td>{{$p->CPF}}</td>
      <td>{{$p->UF_NASC}}</td>
      <td><a class="btn btn-outline-secondary" href="{{url('mostrar/'.$p->ID)}}">Ver</a></td>

    </tr>
    @endforeach
  </tbody>
</table>

{{$professores->links()}}

</div>
<a role="button" class="btn btn-primary" href="{{url('/inicial')}}">Voltar</a>
</div>  


@endsection
