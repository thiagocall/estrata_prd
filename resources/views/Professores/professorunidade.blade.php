@extends('layout.app')
@section('title','Professores')
@section('content')
<div class="container">
<div class="jumbotron" style="margin-top: 20px">

<h2>Lista de Professores</h2>

</div>

<a href="{{url('/inicial')}}">Voltar</a>


<ul class="list-group">
@foreach($professores as $p)

	<li class="list-group-item">{{$p->nome}} </li>

@endforeach

</ul>



</div>

@endsection
