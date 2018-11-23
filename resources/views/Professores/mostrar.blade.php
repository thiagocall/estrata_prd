@include('layout.head')


<div class="container">

  <div class="page-header">
    <h2>Dados Professor:<small> {{ ucwords(strtolower($professor->NOME))}}</small></h2>
    <hr>      
  </div>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        <div class="col-md-6">
          <div class="card mb-4 shadow-sm">
            <div class="card-body">
              <p class="card-text "><h4>Informações Pessoais</h4></p>
              <div class="container">

               <p><strong>Idade:</strong> {{intval((strtotime(date("Y-m-d")) - strtotime($professor->DT_NASCIMENTO))/86400/365.25)}}</p>

               <p><strong>Nascimento:</strong> {{date("d/m/Y", strtotime($professor->DT_NASCIMENTO))}} </p>
               <p><strong>Sexo:</strong> {{$professor->SEXO}} </p>
               <p><strong>Cidade de Nascimento: </strong>{{$professor->MUNICIPIO_NASC}}</p>
               <p><strong>Cpf: </strong>{{$professor->CPF}}</p>
               <p><strong> </strong></p>
               
               <!--<small class="text-muted">9 mins</small>-->
             </div>
           </div>
         </div>
       </div>

       <div class="col-md-6">
        <div class="card mb-4 shadow-sm">
          <div class="card-body">
            <p class="card-text "><h4>Informações Contratuais</h4></p>
            <div class="container">
              
              <p><strong>Titulação Docente: </strong>{{$professor->Info->Titulacao_Considerada}}</p>
              <p><strong>Regime Atual:</strong> {{$professor->Info->Regime_Ajustado}}</p>
              <p><strong>Professor Ativo: </strong>{{$professor->Info->ind_ativo}}</p>
              <p><strong>Tem Bolsa Pesquisa?: </strong>{{($professor->IND_BOLSA_PESQ == NULL)? 'NÃO' : 'SIM' }}</p>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Ver Cursos</button>
              <!--<small class="text-muted">9 mins</small>-->
            </div>
          </div>
        </div>

      </div>
      
    </div>
  </div>
</div>

<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Cursos do Professor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
          	<div class="col-md-6">
             
          		<p><strong>Curso ({{$professor->Info_Cursos->unique('NOM_CURSO')->count()}})</strong></p>
          	</div>
          	<div class="col-md-6">
          		<p><strong>Campus ({{$professor->Info_Cursos->unique('NOM_CAMPUS')->count()}})</strong></p>
          	</div>
          </div>

          
          @foreach($professor->Info_Cursos as $curso)
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

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

<button class="btn btn-outline-primary" id="btn_voltar"  ">Voltar </button>
</div>


@include('layout.foot')