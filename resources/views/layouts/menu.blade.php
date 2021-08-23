<main role="main" class="container">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/estilos-sidebar.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
    @yield('head')
    <title>G.A.P.I. | @yield('title') </title>
</head>
<body id="body-pd" class="body-pd">
    <header class="header body-pd" id="header" >
        <div class="header_toggle"> <i class='bx bx-menu bx-x' id="header-toggle"></i> </div>
        @if (Auth::check())
        <div class="dropdown">
            <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class='bi bi-person-fill'></i> {{auth()->user()->nombre}} - Perfil
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Modificar usuario</a></li>
            </ul>
        </div>

                
        @else
         <div class="header_center">Invitado</div>
        @endif
        
        @if (Auth::check())
        <a href="{{route('logout')}}" class="header_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Cerrar Sesión</span> </a>
        @else
        <a href="login" class="header_link"> <i class='bx bx-log-in nav_icon'></i> <span class="nav_name">Iniciar Sesión</span> </a>
        @endif
    </header>
    <div class="l-navbar show" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="/" class="nav_logo"> 
                <!--<i class='bx bx-layer nav_logo-icon'></i>-->
                <img style="width: 30px;height:auto;"  class="img-fluid" src="{{asset('img/logo.png')}}" alt="">
                <span class="nav_logo-name">G.A.P.I.</span>
                </a>
                <div class="nav_list"> 
                <a href="/" class="{{request()->is('/') ? 'active' : ''}} nav_link"> <i class='bi bi-house nav_icon'></i> <span class="nav_name">Inicio</span> </a> 
                <a href="/programas" class="{{request()->routeIs('programas.index') ? 'active' : ''}} nav_link"> <i class='bi bi-card-list nav_icon'></i> <span class="nav_name">Programas</span> </a> 
                <a href="/proyectos" class="{{request()->routeIs('proyectos.*') ? 'active' : ''}} nav_link"> <i class='bi bi-card-list nav_icon'></i> <span class="nav_name">Proyectos</span> </a> 
                <a href="/subproyectos" class="{{request()->routeIs('subproyectos.*') ? 'active' : ''}} nav_link"> <i class='bi bi-card-list nav_icon'></i> <span class="nav_name">Subproyectos</span> </a> 
                <a href="/publicaciones" class="{{request()->routeIs('publicaciones.*') ? 'active' : ''}} nav_link"> <i class='bi bi-card-list nav_icon'></i> <span class="nav_name">Publicaciones</span> </a> 
                <a href="#"  class="nav_link"> <i class='bi bi-search nav_icon'></i> <span class="nav_name">Buscar</span> </a> 
            </div>
            {{-- </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a> --}}
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        
        @yield('content')
    </div>
    <!--Container Main end-->
</body>
<script src="//unpkg.com/alpinejs"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/js-sidebar.js') }}"></script>
@yield('js')

</main>