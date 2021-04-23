<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <style>
      body {background: url({{ asset('img/Canadon.jpeg') }}) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;}
    </style>

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

                    {{-- <div class="navbar-nav">
                      <a class="nav-item nav-link active" href="{{ route('home') }}"><h6>Inicio</h6></a>
                      <a class="nav-item nav-link active" href="{{ route('promociones') }}"><h6>Promociones</h6></a>
                      <a class="nav-item nav-link active" href="{{ route('conocenos') }}"><h6>Conocenos</h6></a>
                    </div> --}}

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->                  
                        @guest

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}"><h6>Inicio</h6></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('promociones') }}"><h6>Promociones</h6></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('conocenos') }}"><h6>Conocenos</h6></a>
                            </li>

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><h6>{{ __('Login') }}</h6></a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><h6>Registro</h6></a>
                                </li>
                            @endif

                        @else
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

    <br>
    <div class="container">
    <br>
    <div class="row">
      <div class="col">
          
      </div>
      <div class="col-6">
          <div class="card">
            <h5 class="card-header">Google</h5>
            <div class="card-body">
              <iframe width="500" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=500&amp;hl=es&amp;q=Les%20Rambles,%201%20Barcelona,%20Spain+(Canadon)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
            </div>
          </div>
      </div>
      <div class="col">
       
      </div>
    </div>

    <br>
    <br>

    <div class="row">
      <div class="col">
          
      </div>
      <div class="col-6">
          <div class="card">
            <h5 class="card-header">Facebook</h5>
            <div class="card-body">
              <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=500&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="500" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
          </div>
      </div>
      <div class="col">
       
      </div>
    </div>

    <br>
    <br>
    <div class="row">
      <div class="col">
          
      </div>
      <div class="col-6">
          <div class="card">
            <h5 class="card-header">Youtube</h5>
            <div class="card-body">
              <iframe src="https://www.youtube.com/embed/Rz1uru_SfpA" width="500" height="500" frameborder="0"></iframe>
            </div>
          </div>
      </div>
      <div class="col">
       
      </div>
    </div>

    <br>
    <br>
    <div class="row">
      <div class="col">
          
      </div>
      <div class="col-6">
          <div class="card">
            <h5 class="card-header">Instagram</h5>
            <div class="card-body">             
              <iframe width="500" height="500" src="https://www.instagram.com/p/CNekMWWAnaw/embed" frameborder="0"></iframe>
            </div>
          </div>
      </div>
      <div class="col">
       
      </div>
    </div>

    <br>
    <br>
    <div class="row">
      <div class="col">
          
      </div>
      <div class="col-6">
          <div class="card">
            <h5 class="card-header">TikTok</h5>
            <div class="card-body">
              <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@matycocinaok/video/6949584359821151494" data-video-id="6949584359821151494" style="max-width: 605px;min-width: 325px;" > <section> <a target="_blank" title="@matycocinaok" href="https://www.tiktok.com/@matycocinaok">@matycocinaok</a> <p>Hoy 17 hs de Arg! Clase en vivo de donas! <a title="parati" target="_blank" href="https://www.tiktok.com/tag/parati">#parati</a> <a title="aprendeentiktok" target="_blank" href="https://www.tiktok.com/tag/aprendeentiktok">#aprendeentiktok</a> <a title="soycreador" target="_blank" href="https://www.tiktok.com/tag/soycreador">#soycreador</a></p> <a target="_blank" title="♬ sonido original - Matycocinaok" href="https://www.tiktok.com/music/sonido-original-6949584268569955077">♬ sonido original - Matycocinaok</a> </section> </blockquote> <script async src="https://www.tiktok.com/embed.js"></script>
            </div>
          </div>
      </div>
      <div class="col">
       
      </div>
    </div>

    {{-- <br>
    <br>
    <div class="row">
      <div class="col">
          
      </div>
      <div class="col-6">
          <div class="card">
            <h5 class="card-header">LinkedIn</h5>
            <div class="card-body">
              <iframe src="https://www.youtube.com/embed/Rz1uru_SfpA" width="500" height="500" frameborder="0"></iframe>
            </div>
          </div>
      </div>
      <div class="col">
       
      </div>
    </div> --}}

    <br>
    <br>
    <div class="row">
      <div class="col">
          
      </div>
      <div class="col-6">
          <div class="card">
            <h5 class="card-header">Twitter</h5>
            <div class="card-body">
              
              <a class="twitter-timeline" href="https://twitter.com/PSG_espanol?ref_src=twsrc%5Etfw">Tweets by PSG_espanol</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
              
            </div>
          </div>
      </div>
      <div class="col">
       
      </div>
    </div>

    <br>
    <br>
  
  </div>

  </body>
</html>