@extends('layout.app')
@section('title','Inicial')
@section('content')
<div class="title" style="margin-top: 2%; margin-left: 5%">

		<h2>Bem vindo ao portal de professores!!</h2>
		

	</div>
<div class="container mt-4">
	<div class="row mb-3" id="graficoReg">
		<!-- Regime de trabalho -->
		<div class="col-md-3">
			<div class="card border-0" style="margin:2%">
				<!--<img class="card-img-top" src="..." alt="Card image cap"> -->
				<div class="card-body">
					<h5 class="card-title text-center">Professores Ativos</h5>
					<div class="container">
							<div class="col-md-3 col-sm-6">
								<div id="graf" class="progress green">
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
								<div id="graf" class="progress yellow">
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
								<div id="graf" class="progress blue content-center">
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
								<div id="graf" class="progress red">
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
	<div class="row" id="graficoTit" style="">
		<!-- ############### Regime de trabalho ################## -->
		<div class="col-md-3">
			<div class="card border-0" style="margin:2%">
				<!--<img class="card-img-top" src="..." alt="Card image cap"> -->
				<div class="card-body">
					<h5 class="card-title text-center">Prof. Doutores</h5>
					<div class="container">
							<div class="col-md-3 col-sm-6">
								<div id="graf" class="progress blue">
									<span class="progress-left">
										<span class="progress-bar"></span>
									</span>
									<span class="progress-right">
										<span class="progress-bar"></span>
									</span>
									<div class="progress-value">{{(isset($qtdDoutor)) ? number_format($qtdDoutor, 0, '','.') :0}}</div>
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
					<h5 class="card-title text-center">Prof. Mestres</h5>
					<div class="container">
							<div class="col-md-3 col-sm-6">
								<div id="graf" class="progress red">
									<span class="progress-left">
										<span class="progress-bar"></span>
									</span>
									<span class="progress-right">
										<span class="progress-bar"></span>
									</span>
									<div class="progress-value">{{(isset($qtdMestre)) ? number_format($qtdMestre, 0, '','.') :0}}</div>
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
					<h5 class="card-title text-center">Prof. Especialistas</h5>
					<div class="container">
							<div class="col-md-3 col-sm-6">
								<div id="graf" class="progress green content-center">
									<span class="progress-left">
										<span class="progress-bar"></span>
									</span>
									<span class="progress-right">
										<span class="progress-bar"></span>
									</span>
									<div class="progress-value">{{(isset($qtdEspecialista)) ? number_format($qtdEspecialista, 0, '','.') :0}}</div>
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
					<h5 class="card-title text-center">Prof. Não Informados</h5>
					<div class="container">
							<div class="col-md-3 col-sm-6">
								<div id="graf" class="progress yellow content-center">
									<span class="progress-left">
										<span class="progress-bar"></span>
									</span>
									<span class="progress-right">
										<span class="progress-bar"></span>
									</span>
									<div class="progress-value">{{(isset($qtdNA)) ? number_format($qtdNA, 0, '','.') :0}}</div>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>


	@endsection
