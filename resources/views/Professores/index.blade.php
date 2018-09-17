@extends('layout.app')
@section('title','Inicial')
@section('content')
<div class="container">
<div class="jumbotron" style="margin-top: 20px">

<h2>Bem vindo ao portal de professores!!</h2>

</div>

<div class="container">
<!--<a href="{{url('listaprofessor')}}">Lista de professores</a>-->
</div>

<div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
		            <div class="col-md-4">
		              <div class="card mb-4 shadow-sm">
		                <div class="card-body">
		                  <p class="card-text">Informações por Unidade</p>
		                  <div class="d-flex justify-content-between align-items-center">
		                    <div class="btn-group">
		                      <a href ="{{url('listaprofessor')}}" role="button" class="btn btn-sm btn-outline-primary">Procurar Professores</a>
		                      <!--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
		                    </div>
		                    <!--<small class="text-muted">9 mins</small>-->
		                  </div>
		                </div>
		              </div>
		            </div>

		             <div class="col-md-4">
		              <div class="card mb-4 shadow-sm">
		                <div class="card-body">
		                  <p class="card-text">Acesse agora a Lista dos professores</p>
		                  <div class="d-flex justify-content-between align-items-center">
		                    <div class="btn-group">
		                      <a href ="{{url('listaprofessor')}}" role="button" class="btn btn-sm btn-outline-primary">Ver Professores</a>
		                      <!--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
		                    </div>
		                    <!--<small class="text-muted">9 mins</small>-->
		                  </div>
		                </div>
		              </div>
		            </div>

		            <div class="col-md-4">
		              <div class="card mb-4 shadow-sm">
		                <div class="card-body">
		                  <p class="card-text">Indicadores</p>
		                  <div class="d-flex justify-content-between align-items-center">
		                    <div class="btn-group">
		                      <a href ="{{url('indicadores')}}" role="button" class="btn btn-sm btn-outline-primary">Ver Indicadore da base</a>
		                      <!--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
		                    </div>
		                    <!--<small class="text-muted">9 mins</small>-->
		                  </div>
		                </div>
		              </div>
		            </div>
		           
			</div>
		</div>
</div>

@endsection
