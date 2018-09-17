@extends('layout.app')
@section('title','Professores')
@section('content')
<div class="container">
<div class="jumbotron" style="margin-top: 20px">

<h2>Lista de Professores</h2>

</div>

<a href="{{url('/inicial')}}">Voltar</a>

{{ $professores->links() }}


<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Cidade de Nascimento</th>
      <th scope="col">UF</th>
      <th scope="col">Opçoes</th>
    </tr>
  </thead>
  <tbody>
    @foreach($professores as $p)
    <tr>
    	
      <td>{{$p->nome}}</td>
      <td>{{$p->municipio_nasc}}</td>
      <td>{{$p->uf_nasc}}</td>
      <td><a class="btn btn-outline-secondary" href="{{url('mostrar/'.$p->id)}}">Ver</a></td>

    </tr>
    @endforeach
  </tbody>
</table>


{{ $professores->links() }}


</div>

@endsection
