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

    <style>
     * {box-sizing:border-box}

      /* Slideshow container */
      .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
      }

      /* Hide the images by default */
      .mySlides {
        display: none;
      }

      /* Next & previous buttons */
      .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -22px;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
      }

      /* Position the "next button" to the right */
      .next {
        right: 0;
        border-radius: 3px 0 0 3px;
      }

      /* On hover, add a black background color with a little bit see-through */
      .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
      }

      /* Caption text */
      .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
      }

      /* Number text (1/3 etc) */
      .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
      }

      /* The dots/bullets/indicators */
      .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
      }

      .active, .dot:hover {
        background-color: #717171;
      }

      /* Fading animation */
      .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        -webkit-animation-fill-mode: forwards; 
        animation-name: fade;
        animation-duration: 1.5s;
        animation-fill-mode: forwards; 
      }

      @-webkit-keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
      }

      @keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
      }
    </style>

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
                                <a class="nav-link" href="{{ route('landing') }}"><h6>Conocenos</h6></a>
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

                            @if(isset(Auth::user()->name))
                                @if ( Auth::user()->email != 'admin@admin.com')
                                <li class="nav-item">
                                    <a class="nav-item nav-link" href="{{ route('home') }}"><h6>Inicio</h6></a>
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

    <div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <br>
            <div class="card">
              <h5 class="card-header">Quienes somos?</h5>
              <div class="card-body">
                <h5 class="card-title">A que nos dedicamos en el Cañadon?</h5>
                <p class="card-text">Nos dedicamos a proveer la posibilidad de alquilar una cancha de futbol personalizada para poder pasar un buen rato entre amigos, familia o compñeros de trabajo. Registrate o Logueate y reserva.</p>
                <p class="card-text">Nos pueden contactar por telefono en: <strong>641 43 66 59</strong></p>
              </div>
            </div>
        </div>

        <div class="col-md-8">
            <br>
            <div class="card">
              <h5 class="card-header">Fotos del Cañadon</h5>
              <div class="card-body">

                  <div class="slideshow-container">
                  <!-- Full-width images with number and caption text -->
                  <div class="mySlides fade">
                    <div class="numbertext">1 / 8</div>
                    <img src="{{ asset('img/can1.jpeg') }}" style="width:100%">
                    <div class="text">El Cañadon</div>
                  </div>

                  <div class="mySlides fade">
                    <div class="numbertext">2 / 8</div>
                    <img src="{{ asset('img/can2.jpeg') }}" style="width:100%">
                    <div class="text">El Cañadon</div>
                  </div>

                  <div class="mySlides fade">
                    <div class="numbertext">3 / 8</div>
                    <img src="{{ asset('img/can3.jpeg') }}" style="width:100%">
                    <div class="text">El Cañadon</div>
                  </div>

                  <div class="mySlides fade">
                    <div class="numbertext">4 / 8</div>
                    <img src="{{ asset('img/can4.jpeg') }}" style="width:100%">
                    <div class="text">El Cañadon</div>
                  </div>

                  <div class="mySlides fade">
                    <div class="numbertext">5 / 8</div>
                    <img src="{{ asset('img/can5.jpeg') }}" style="width:100%">
                    <div class="text">El Cañadon</div>
                  </div>

                  <div class="mySlides fade">
                    <div class="numbertext">6 / 8</div>
                    <img src="{{ asset('img/can6.jpeg') }}" style="width:100%">
                    <div class="text">El Cañadon</div>
                  </div>

                  <div class="mySlides fade">
                    <div class="numbertext">7 / 8</div>
                    <img src="{{ asset('img/can7.jpeg') }}" style="width:100%">
                    <div class="text">El Cañadon</div>
                  </div>

                  <div class="mySlides fade">
                    <div class="numbertext">8 / 8</div>
                    <img src="{{ asset('img/can8.jpeg') }}" style="width:100%">
                    <div class="text">El Cañadon</div>
                  </div>
                  <!-- Next and previous buttons -->
                  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                  <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>

                <!-- The dots/circles -->
                <div style="text-align:center">
                  <span class="dot" onclick="currentSlide(1)"></span>
                  <span class="dot" onclick="currentSlide(2)"></span>
                  <span class="dot" onclick="currentSlide(3)"></span>
                  <span class="dot" onclick="currentSlide(4)"></span>
                  <span class="dot" onclick="currentSlide(5)"></span>
                  <span class="dot" onclick="currentSlide(6)"></span>
                  <span class="dot" onclick="currentSlide(7)"></span>
                  <span class="dot" onclick="currentSlide(8)"></span>
                </div>

              </div>
            </div>
        </div>


        <script type="text/javascript">
            var slideIndex = 1;
            showSlides(slideIndex);

            // Next/previous controls
            function plusSlides(n) {
              showSlides(slideIndex += n);
            }

            // Thumbnail image controls
            function currentSlide(n) {
              showSlides(slideIndex = n);
            }

            function showSlides(n) {
              var i;
              var slides = document.getElementsByClassName("mySlides");
              var dots = document.getElementsByClassName("dot");
              if (n > slides.length) {slideIndex = 1}
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";
              }
              for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";
              dots[slideIndex-1].className += " active";
            }
        </script>

    </div>
  </body>
</html>