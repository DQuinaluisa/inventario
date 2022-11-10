<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js">
    </script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Inventary </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body >
    <div id="app">
        <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    Inventary
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">

                                    <a class="nav-link" href="{{ route('login') }}"> <i class="fa-solid fa-user-lock fa-lg"></i> </a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        <i class="fa-solid fa-solar-panel"></i> Panel Administrador
                                    </a>
                                    <a class="dropdown-item" href="{{ route('inventary.createCategory') }}">
                                        <i class="fa-solid fa-list"></i> Categorias
                                    </a>

                                    <a class="dropdown-item" href="{{ route('providers.listProviders') }}">
                                        <i class="fa-solid fa-users"></i>   Proveedores
                                    </a>
                                    <a class="dropdown-item" href="{{ route('inventary.addListProducts') }}">
                                        <i class="fa-solid fa-bars"></i>   Entrada de Productos
                                    </a>
                                    <a class="dropdown-item" href="{{ route('sales.listSales') }}">
                                        <i class="fa-solid fa-cart-shopping"></i>   Salida de Productos
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      <i class="fa-solid fa-arrow-right-from-bracket"></i>  {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
<br>
<br>
<br>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script type="text/javascript">
    // setTimeout(function () {

    //     // Closing the alert
    //     $('#alert').alert('close');
    // }, 2000);

    window.setTimeout(function() {
    $("#alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 4000);
</script>
</html>
