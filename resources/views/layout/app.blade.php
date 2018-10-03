@include('layout.head')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Estratégia Acadêmica</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownDocente" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Alunos</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownDocente" >
          <a class="dropdown-item" href="/atuacao_">Desempenho</a>
          <a class="dropdown-item" href="#">Financeiro</a>
          <a class="dropdown-item" href="#">Fora de Sede</a>
          <a class="dropdown-item" href="#">EAD</a>
          <a class="dropdown-item" href="#">Visita</a>
          <a class="dropdown-item" href="#">Enade</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownDocente" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Corpo Docente</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownDocente" >
          <a class="dropdown-item" href="/atuacao_">Censo</a>
          <a class="dropdown-item" href="#">IES</a>
          <a class="dropdown-item" href="#">Fora de Sede</a>
          <a class="dropdown-item" href="#">EAD</a>
          <a class="dropdown-item" href="#">Visita</a>
          <a class="dropdown-item" href="#">Enade</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProfessores" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Professores</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownProfessores" >
          <a class="dropdown-item" href="/atuacao_">Informações</a>
          <a class="dropdown-item" href="#">Regime</a>
          <a class="dropdown-item" href="#">Titulação</a>
          <a class="dropdown-item" href="#">Carga Horária</a>
          <a class="dropdown-item" href="#">Carga Alocação</a>
          <a class="dropdown-item" href="#">Carga Disciplinas Habilitadas</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Cursos</a>
      </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAtuacao" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pagamentos</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownAtuacao" >
          <a class="dropdown-item" href="/atuacao_">Atuação Fixa</a>
          <a class="dropdown-item" href="#">Atuação Variável</a>
          <a class="dropdown-item" href="#">Atuação Ensino</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Outras Informações
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Tabela Hora/Aula</a>
          <a class="dropdown-item" href="#">Enquadramento de Regime</a>
          <a class="dropdown-item" href="#">Sobre o Portal</a>
        </div>
      </li>
    </ul>
  </div>
</nav>


<div class="container">
 @yield('content')
</div>

@include('layout.foot')