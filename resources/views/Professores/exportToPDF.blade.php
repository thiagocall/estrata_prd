<!DOCTYPE html>
<html>
<head>
<title>
	Resumo Professor -  {{mb_convert_case($matricula->Professor->NOME, MB_CASE_TITLE)}}
</title>
    <link href="{{url('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{url('css/all.css')}}" rel="stylesheet">
    <script src="{{url('js/bootstrap.bundle.js')}}"></script>
    <script src="{{url('js/jquery.js')}}"></script>

</style>

</head>
<body>
	
	<div class="row" style="height: 20px; padding-top: 0%">
		<div class="col-md-6">
			<h3>Resumo do Professor - {{mb_convert_case($matricula->Professor->NOME,MB_CASE_TITLE)}}</h3>
		</div>
		<div class="col-md-1" style="left: 85%;top:10px">
			Data: {{date('d/m/Y')}}
		</div>
	</div>

	<hr style="height: 10px">

	<div class="row pb-0 m-0">
		<div class="col-md-6 pb-0">
			<h4>Dados Pessoais</h4>
			<hr>

			<table style="width: 80%;text-align: left;">
				<tbody>
					<tr>
						<td><strong>Nascimento:</strong> {{date("d/m/Y", strtotime($matricula->Professor->DT_NASCIMENTO))}} ({{$matricula->Professor->IdadeProfessor()}} anos)</td>
						<td><strong>CPF:</strong> {{$matricula->Professor->Cpf_Formatado()}}</td>

					</tr>
					<tr>
						<td><strong>Sexo:</strong> {{$matricula->Professor->SEXO}}</td>
						<td><strong>Cidade Nascimento:</strong> {{mb_convert_case($matricula->Professor->MUNICIPIO_NASC, MB_CASE_TITLE)}}</td>
					</tr>

				</tbody>
			</table>
			<hr>  
			<h4>Dados Contratuais</h4>
			<hr>

			<table style="width: 105%;text-align: left;">
				<tbody>
					<tr>
						<td><strong>Tipo Salário:</strong> {{($matricula->IND_TIPO_SALARIO == 'H')? 'Horista' : 'Mensalista'}}</td>
						<td><strong>Função: </strong>{{$matricula->Sindicato->NOME_FUNCAO}}</td>
						<td><strong>Região Matrícula: </strong>{{mb_convert_case($matricula->NOM_REGIAO, MB_CASE_TITLE)}}</td>
					</tr>
					<tr>
						<td><strong>Hora Aula Composta: </strong>{{"R$ " . number_format($matricula->Hora_Aula->HORA_AULA_COMPOSTA, 2, ',','.')}}</td>
						<td><strong>Tipo Contrato </strong> {{($matricula->IND_TIPO_CONTRATO == 'F')? 'Funcionário' : 'Prest. Serviços'}}</td>
						<td><strong>Sindicato:</strong> {{mb_convert_case($matricula->Sindicato->NOME_SINDICATO, MB_CASE_TITLE)}}</td>
					</tr>
						<tr>
						<td><strong>Admissão: </strong>{{date("d/m/Y",strtotime($matricula->DT_ADMISSAO_PROFESSOR))}}</td>
						<td><strong>IES: </strong> {{ucwords(mb_strtolower($matricula->Sindicato->NOME_EMPRESA))}}</td>
					</tr>

				</tbody>
			</table>

			<hr>
			<h4>Dados Regulatórios</h4>
			<hr>

			<table style="width: 80%;text-align: left;">
				<tbody>
					<tr>
						<td><strong>Titulação SIA: </strong> {{ucwords(strtolower($matricula->Professor->Titulacao->TITULACAO))}}</td>
						<td><strong>Titulação Lattes: </strong> {{ucwords(strtolower($matricula->Professor->Titulacao_Lattes->TITULACAO))}}</td>
						<td><strong>Regime: </strong> {{ucwords(strtolower($matricula->Professor->Info->Regime_Ajustado))}} </td>
					</tr>

				</tbody>
			</table>

			<hr>
			<h4>Carga Horária</h4>
			<hr>

			<table style="width: 80%;text-align: left;">
				<tbody>
					<tr>
						<td><strong>Titulação SIA: </strong> {{ucwords(strtolower($matricula->Professor->Titulacao->TITULACAO))}}</td>
						<td><strong>Titulação Lattes: </strong> {{ucwords(strtolower($matricula->Professor->Titulacao_Lattes->TITULACAO))}}</td>
						<td><strong>Regime: </strong> {{ucwords(strtolower($matricula->Professor->Info->Regime_Ajustado))}} </td>
					</tr>

				</tbody>
			</table>

		</div>


	</div>

<img src="{{url('images/logo-estacio-login.png')}}" width="15%" height="15%" style="position: absolute; left: 88%; top:98%">


		
<!--
		

 		</div>
             <div class="row">
          		<p><strong>Curso ({{$matricula->Professor->Info_Cursos->unique('NOM_CURSO')->count()}})</strong></p>
         
          	<div class="col-md-6">
          		<p><strong>Campus ({{$matricula->Professor->Info_Cursos->unique('NOM_CAMPUS')->count()}})</strong></p>
          	</div>
          </div>

          
          @foreach($matricula->Professor->Info_Cursos->unique as $curso)
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