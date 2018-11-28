@extends('layout.app')
@section('title','Inicial')
@section('content')
<div class="title" style="margin-top: 2%; margin-left: 5%">

		<h2>Bem vindo ao portal de professores!!</h2>
		

	</div>
<div class="container mt-4">
	<div class="row" id="graficos" style="">
		<div class="col-md-3">
			<div class="card border-0" style="margin:2%">
				<!--<img class="card-img-top" src="..." alt="Card image cap"> -->
				<div class="card-body">
					<h5 class="card-title text-center">Professores Ativos</h5>
					<div class="container">
							<div class="col-md-3 col-sm-6">
								<div class="progress green">
									<span class="progress-left">
										<span class="progress-bar"></span>
									</span>
									<span class="progress-right">
										<span class="progress-bar"></span>
									</span>
									<div class="progress-value">{{(isset($qtdAtivos)) ? number_format($qtdAtivos, 0, '','.') :0}}</div>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card border-0" style="margin:2%">
				<!--<img class="card-img-top" src="..." alt="Card image cap"> -->
				<div class="card-body">
					<h5 class="card-title text-center">Prof. Tempo Integral</h5>
					<div class="container">
							<div class="col-md-3 col-sm-6">
								<div class="progress yellow">
									<span class="progress-left">
										<span class="progress-bar"></span>
									</span>
									<span class="progress-right">
										<span class="progress-bar"></span>
									</span>
									<div class="progress-value">{{(isset($qtdTI)) ? number_format($qtdTI, 0, '','.') :0}}</div>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card border-0" style="margin:2%">
				<!--<img class="card-img-top" src="..." alt="Card image cap"> -->
				<div class="card-body">
					<h5 class="card-title text-center">Prof. Tempo Parcial</h5>
					<div class="container">
							<div class="col-md-3 col-sm-6">
								<div class="progress blue content-center">
									<span class="progress-left">
										<span class="progress-bar"></span>
									</span>
									<span class="progress-right">
										<span class="progress-bar"></span>
									</span>
									<div class="progress-value">{{(isset($qtdTP)) ? number_format($qtdTP, 0, '','.') :0}}</div>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card border-0" style="margin:2%">
				<!--<img class="card-img-top" src="..." alt="Card image cap"> -->
				<div class="card-body">
					<h5 class="card-title text-center">Prof. Horista</h5>
					<div class="container">
							<div class="col-md-3 col-sm-6">
								<div class="progress red">
									<span class="progress-left">
										<span class="progress-bar"></span>
									</span>
									<span class="progress-right">
										<span class="progress-bar"></span>
									</span>
									<div class="progress-value">{{(isset($qtdH)) ? number_format($qtdH, 0, '','.') :0}}</div>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>

	</div>


	@endsection
