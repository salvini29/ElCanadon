<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h5>{{ config('app.name', 'Laravel') }}</h5>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
        {{--@if(isset(Auth::user()->name))

                    @if ( Auth::user()->email != 'admin@admin.com')
                            <div class="navbar-nav">
                              <a class="nav-item nav-link active" href="{{ route('home') }}"><h6>Inicio</h6></a>
                              <a class="nav-item nav-link" href="{{ route('futbol5') }}"><h6>Futbol 5</h6></a>
                              <a class="nav-item nav-link" href="{{ route('futbol7') }}"><h6>Futbol 7</h6></a>
                              <a class="nav-item nav-link" href="{{ route('futbolrapido') }}"><h6>Futbol Rapido</h6></a>
                              <a class="nav-item nav-link" href="{{ route('promociones') }}"><h6>Promociones</h6></a>
                            </div>
                    @else
                            <div class="navbar-nav">
                              <a class="nav-item nav-link active" href="{{ route('home') }}"><h6>Inicio</h6></a>
                              <a class="nav-item nav-link" href="{{ route('reservas') }}"><h6>Reservas</h6></a>
                              <a class="nav-item nav-link" href="{{ route('crearpromociones') }}"><h6>Crear Promo</h6></a>
                              <a class="nav-item nav-link" href="{{ route('crearpromociones') }}"><h6>LimpiarDB</h6></a>
                            </div>
                    @endif

                @endif --}}

            {{--<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                      <a class="nav-item nav-link active" href="{{ route('home') }}"><h6>Inicio</h6></a>
                      <a class="nav-item nav-link" href="{{ route('futbol5') }}"><h6>Futbol 5</h6></a>
                      <a class="nav-item nav-link" href="{{ route('futbol7') }}"><h6>Futbol 7</h6></a>
                      <a class="nav-item nav-link" href="{{ route('futbolrapido') }}"><h6>Futbol Rapido</h6></a>
                    </div>
                </div>--}}

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registro</a>
                                </li>
                            @endif
                        @else

                            @if(isset(Auth::user()->name))
                                @if ( Auth::user()->email != 'admin@admin.com')
                                <li class="nav-item">
                                    <a class="nav-item nav-link active" href="{{ route('home') }}"><h6>Inicio</h6></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link" href="{{ route('futbol5') }}"><h6>Futbol 5</h6></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link" href="{{ route('futbol7') }}"><h6>Futbol 7</h6></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link" href="{{ route('futbolrapido') }}"><h6>Futbol Rapido</h6></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link" href="{{ route('promociones') }}"><h6>Promociones</h6></a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-item nav-link active" href="{{ route('home') }}"><h6>Inicio</h6></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link" href="{{ route('reservas') }}"><h6>Reservas</h6></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link" href="{{ route('crearpromociones') }}"><h6>Crear Promo</h6></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link" href="{{ route('limpiarDB') }}"><h6>LimpiarDB</h6></a>
                                </li>
                                @endif

                            @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
