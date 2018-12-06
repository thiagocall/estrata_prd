@extends('layout.app')
@section('title','Professores')
@section('content')
<div class="container">
<div class="container" style="margin-top: 20px padding:10%">

<h2>Lista de Professores</h2>

</div>

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
    	
      <td >{{$p->NOME}}</td>
      <td >{{$p->CPF}}</td>
      <td >{{$p->UF_NASC}}</td>
      <td> <a class="fa fa-id-badge" style="color:#273746" href="{{url('mostrar/'.$p->CPF)}}"></a></td>

    </tr>
    @endforeach
  </tbody>
</table>

<div class="container">
<div class="row">
<div class="col-md-9">
{{$professores->links()}}
</div>
<div class="col-md-3">
 <a role="button" class="btn btn-primary float-right" href="{{url('/inicial')}}">Voltar</a>
</div>
</div>
</div>
</div>  


@endsection
