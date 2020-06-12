<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
        <!-- Bootstrap -->
        <script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

         <!-- Material icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Fontaweasome -->
        <script src="https://kit.fontawesome.com/e369e6f381.js" crossorigin="anonymous"></script>
        <!-- Material Design Bootstrap
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet"> -->
        <!-- Icones -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- CSS
        <link href="{{ URL::asset('css/cadastro-login.css')}}" rel="stylesheet"> -->
        <link rel="stylesheet" href="{{url('css/stylesChat.css')}}">
        <!-- CSS -->
        @yield('css')
</head>
<body>
<!-- NAV SUPERIOR -->
<nav class="navbar sticky-top">
        <a class="navbar-brand" href="{{route('landing')}}"><img src="{{url('img/logo branco.png')}}" alt="logo Trip Collab"> TRIPCOLLAB</a>
        <div class=" d-flex justify-space-between align-items-center">

            @auth
            <div class="itensMenu d-none d-md-inline-block">
            <a href="{{route('trip.timeline')}}" class="{{ isset($pagina) && $pagina == 'linhaDoTempo' ? 'ativo' : '' }} mr-5">SCRAPBOOK</a>
            <a href="{{route('search.show')}}" class="{{ isset($pagina) && $pagina == 'busca' ? 'ativo' : '' }} mr-5">BUSCA</a>
            <a href="{{route('home')}}" class="{{ isset($pagina) && $pagina == 'perfil' ? 'ativo' : '' }} mr-5">PERFIL</a>
            <a href="{{route('user.listGroupsAndTrips')}}" class="{{ isset($pagina) && $pagina == 'comunidadesEviagens' ? 'ativo' : '' }} mr-5">COMUNIDADE</a>
            </div>

                <a class="nav-link d-flex align-items-center p-1 mr-5" href="#" onclick="document.querySelector('form.logout').submit();">
                    <i class="material-icons mr-2">account_circle</i>
                    <span>SAIR</span>
                </a>

                <form action="{{route('logout')}}" class="logout d-none" method="POST">
                    @csrf
                </form>

                @elseif(Route::current()->getName() == 'login')

                @else

                <a class="nav-link d-flex align-items-center p-1 mr-5" href="{{route('login')}}" onclick="document.querySelector('form.logout').submit();">
                    <i class="material-icons mr-2">account_circle</i>
                    <span>LOGIN</span>
                </a>

            @endauth

            <div id="btnMenu">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        </div>
    </nav>

<!-- MENU -->
<menu class="container" id="menu">
    <ul class="navbar-nav">
        <li class="nav-item active pt-2">
            <a class="nav-link" href="home.html">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Saiba mais</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Hotéis</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Passagens</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Agências de Turismo</a>
        </li>
        <li class="divider">
            <hr/>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Termos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Política de privacidade de dados</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contate-nos</a>
        </li>
        <li class="divider">
            <hr/>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons mr-2">language</i> <span>Idioma</span></a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">PT-BR</a>
                <a class="dropdown-item" href="#">IN-EUA</a>
            </div>
        </li>
    </ul>
</menu>

@yield('conteudo')

@auth
<div class="nav-inferior nav fixed-bottom d-flex justify-content-around border-top d-md-none" id="navInferior">
    <a href="{{route('trip.timeline')}}" class="fas fa-atlas fa-lg  {{ isset($pagina) && $pagina == 'linhaDoTempo' ? 'ativo' : '' }}"></a>
    <a href="{{route('search.users.index')}}" class="fas fa-search fa-lg {{ isset($pagina) && $pagina == 'busca' ? 'ativo' : '' }}"></a>
    <a href="{{route('home')}}" class="fas fa-home fa-lg  {{ isset($pagina) && $pagina == 'perfil' ? 'ativo' : '' }}"></a>
    <a href="{{route('user.listGroupsAndTrips')}}" class="fas fa-users fa-lg  {{ isset($pagina) && $pagina == 'comunidadesEviagens' ? 'ativo' : '' }}"></a>
</div>
@endauth

<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="\js\main.js"></script>
</body>
</html>
