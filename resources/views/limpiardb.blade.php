@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
  
        <div class="col-md-8">
            <br>
            <div class="card text-white bg-danger mb-3">
              <h5 class="card-header">Atencion</h5>
              <div class="card-body">
                <h5 class="card-title">Que hago con este formulario?</h5>
                <p class="card-text">En este formulario escribo una fecha y borro en la Base de Datos todas las reservas generadas antes de esa fecha.</p>
              </div>
            </div>
        </div>

        <div class="col-md-8">
            <br>
            <div class="card">
              <h5 class="card-header">Buscar Reserva</h5>
              <div class="card-body">
                    
                  <form action="{{ route('limpiarDBfecha') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="fechaborrar">Fecha</label>
                      <input type="text" class="form-control" id="fechaborrar" name="fechaborrar" placeholder="2021-03-23">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-danger">Borrar</button>
                  </form>

              </div>
            </div>
        </div>
      </div>
@endsection
