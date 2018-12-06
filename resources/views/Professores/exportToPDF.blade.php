<!DOCTYPE html>
<html>
<head>
<title>
	Resumo Professor -  {{ ucwords(strtolower($professor->NOME))}}
</title>
    <link href="{{url('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{url('css/all.css')}}" rel="stylesheet">
    <script src="{{url('js/bootstrap.bundle.js')}}"></script>
    <script src="{{url('js/jquery.js')}}"></script>



</style>

</head>
<body>
	
	<div class="row" style="height: 20px">
		<div class="col-md-6">
			<h3>Resumo do Professor - {{ ucwords(strtolower($professor->NOME))}}</h3>
		</div>
		<div class="col-md-1" style="left: 85%;top:10px">
			Data: {{date('d/m/Y')}}
		</div>
	</div>

	<hr style="height: 10px">

	<div class="row pb-0 m-0">
		<div class="col-md-6 pb-0">
			<h4>Informações Pessoais</h4>
			<hr>

			<table style="width: 60%;text-align: left;">
				<tbody>
					<tr>
						<td><strong>Idade:</strong> {{intval((strtotime(date("Y-m-d")) - strtotime($professor->DT_NASCIMENTO))/86400/365.25)}}</td>
						<td><strong>Nascimento:</strong> {{date("d/m/Y", strtotime($professor->DT_NASCIMENTO))}}</td>
					</tr>
					<tr>
						<td><strong>Sexo:</strong> {{$professor->SEXO}}</td>
						<td><strong>Cidade de Nascimento:</strong> {{$professor->MUNICIPIO_NASC}}</td>
					</tr>

				</tbody>
			</table>
			<hr>  
			<h4>Informações Contratuais</h4>
			<hr>

			<table style="width: 80%;text-align: left;">
				<tbody>
					<tr>
						<td><strong>Titulação Docente:</strong> {{$professor->Info->Titulacao_Considerada}}</td>
						<td><strong>Regime Atual:</strong> {{$professor->Info->Regime_Ajustado}}</td>
						<td><strong>Valor Hr/Aula:</strong> XX,XX </td>
					</tr>
					<tr>
						<td><strong>Professor Ativo:</strong> {{$professor->Info->ind_ativo}}</td>
						<td><strong>Tem Bolsa Pesquisa?:</strong> {{($professor->IND_BOLSA_PESQ == NULL)? 'NÃO' : 'SIM' }}</td>
						<td><strong>Carga Horária:</strong> XX </td>
					</tr>

				</tbody>
			</table>

			<hr>
			<h4>Informações de Cursos em Campi</h4>
			<hr>

			<table class="pb-4" style="width: 80%;text-align: left;">
			<tbody>
				<tr>
					<td><strong>Qtd Cursos:</strong> {{$professor->Info_Cursos->unique('NOM_CURSO')->count()}}</td>
					<td><strong>Total de Alunos:</strong> XX </td>
				</tr>
			</tbody>
			</table>

		
			<strong class="pb-0">Campi</strong>
			<div style="width: 25%; left: 0px">
			<hr id="hr_" class="mt-0 pt-0" width="25#" >
			 @foreach($professor->Info_Cursos->unique('NOM_CAMPUS') as $curso)
			 	<p>{{$curso['NOM_CAMPUS']}}</p>
			 @endforeach

			</div>
	

		</div>


	</div>
	

	 
<img src="{{url('images/logo-estacio-login.png')}}" width="15%" height="15%" style="position: absolute; left: 88%;top:98%">



		
<!--
		

 		</div>
             <div class="row">
          		<p><strong>Curso ({{$professor->Info_Cursos->unique('NOM_CURSO')->count()}})</strong></p>
         
          	<div class="col-md-6">
          		<p><strong>Campus ({{$professor->Info_Cursos->unique('NOM_CAMPUS')->count()}})</strong></p>
          	</div>
          </div>

          
          @foreach($professor->Info_Cursos->unique as $curso)
          <div class="row">
          	<div class="col-md-6">
             
          		<p>{{$curso['NOM_CURSO']}}</p>
          	</div>
            
          	<div class="col-md-6 border-left">
              
          		<p>{{$curso['NOM_CAMPUS']}}</p>
              
          	</div>
          </div>
          
          
          @endforeach
          
        </div>

      </div>
    </div>
  </div>
</div>
-->

</body>
<style type="text/css">
	
body {

	font-family: Arial, Helvetica, sans-serif; !important
};

 #hr_ { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 0.5px;
    right: 25%;
    width: 25%;
} 


</style>
</html>