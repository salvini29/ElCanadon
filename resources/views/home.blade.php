@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
    {{--<div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bienvenido!') }}
                </div>
            </div>
        </div> --}}

        <div class="col-md-8">
            <br>
            <div class="card">
              <h5 class="card-header">Pasos para reservar</h5>
              <div class="card-body">
                <h5 class="card-title">Como reservar?</h5>
                <p class="card-text">Para reservar una cancha veran en la barra superior las 3 canchas disponibles hay que clickear la cancha que uno elija y se abrira un calendario, ahi proceder a hacer click en el dia que se quiera reservar y seleccionar las preferencias.</p>
              </div>
            </div>
        </div>

        <div class="col-md-8">
            <br>
            <div class="card">
              <h5 class="card-header">Promociones</h5>
              <div class="card-body">
                <h5 class="card-title">Ver las promociones</h5>
                <p class="card-text">Para ver las promociones puedes clickear el boton de abajo</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
        </div>

    </div>
</div>
@endsection
