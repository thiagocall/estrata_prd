@include('layout.head')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Estratégia Acadêmica</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="#">Censo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Titulação</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Cursos</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/atuacao">Atuações</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Regime de Trabalho</a>
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