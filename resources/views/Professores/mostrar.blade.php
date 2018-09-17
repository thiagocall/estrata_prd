@include('layout.head')

<div class="container" style="margin-top: 10px">
<div class="jumbotron">
	
	<h4>Dados professor: {{$professor->nome}}</h4>

</div>

<div class="row">
	<!--<div class="col-md-4">
		<img src="http://servicosweb.cnpq.br/wspessoa/servletrecuperafoto?tipo=1&id=K4353798Y9" style="width:150px"> 
		
	</div>-->

	<div class="col-md-4">
			
		<p><strong>Cidade Nascimento: </strong>{{$professor->municipio_nasc}}</p>
		<p><strong>Sexo: </strong>{{$professor->sexo}}</p>
		<p><strong>Cidade de Nascimento: </strong>{{$professor->municipio_nasc}}</p>
		<p><strong>Tem Bolsa Pesquisa?: </strong>{{$professor->ind_bolsa_pesq}}</p>
		<p><strong>Cpf:</strong>{{$professor->cpf}}</p>
<img src="http://servicosweb.cnpq.br/wspessoa/servletrecuperafoto?tipo=1&id=K4353798Y9" style="width:150px"> 

	</div>

</div>
<a href="{{url('/inicial')}}">Voltar</a>
</div>


@include('layout.foot')