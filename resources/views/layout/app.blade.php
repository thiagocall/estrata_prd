@include('layout.head')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Estratégia Acadêmica</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    @IF(Auth::check())
    <ul class="navbar-nav">
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownDocente" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Consultas</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownDocente" >
          <a class="dropdown-item" id="a_" href="{{route('buscaProfessor')}}">Professor <span class="badge badge-warning">Em construção</span></a>
          <a class="dropdown-item" id="a_" href="{{route('buscaProfessor')}}">Carga Professor <span class="badge badge-warning">Em construção</span></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" id="a_" href="{{route('Busca')}}" >Professores por Campus <span class="badge badge-info">N</span></a>
          <a class="dropdown-item" href="{{route('buscaPorCampus')}}">Resumo por Campus<span class="badge badge-info">N</span></a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownDocente" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Corpo Docente</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownDocente" >
          <a class="dropdown-item" href="#">Censo</a>
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
          <a class="dropdown-item" href="#">Informações</a>
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
      @endif
    </ul>
    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                       @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Cadastrar') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
  </div>
</nav>

@yield('content')
@include('layout.foot')
