@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
  
        <div class="col-md-8">
            <br>
            <div class="card">
              <h5 class="card-header">Buscar Reserva</h5>
              <div class="card-body">
                    
                  <form action="{{ route('buscarReservas') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="fechares">Fecha</label>
                      <input type="text" class="form-control" id="fechares" name="fechares" placeholder="2021-03-23">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                  </form>

              </div>
            </div>
        </div>

        @isset($futbol5)
          @if(count($futbol5) > 0)
          <div class="col-md-8">
              <br>
              <ul class="list-group">
                      <li class="list-group-item active">Reservas Futbol 5</li>
                      @foreach($futbol5 as $reser)

                          <li class="list-group-item">El dia: {{$reser->fecha}} por: {{$reser->email}} en el horario: {{$reser->hora}} y estado de paga: {{$reser->pagado}}</li>

                      @endforeach
              </ul>
          </div>
          @endif
        @endisset

        @isset($futbol7)
          @if(count($futbol7) > 0)
          <div class="col-md-8">
              <br>
              <ul class="list-group">
                      <li class="list-group-item active">Reservas Futbol 7</li>
                      @foreach($futbol7 as $reser)

                          <li class="list-group-item">El dia: {{$reser->fecha}} por: {{$reser->email}} en el horario: {{$reser->hora}} y estado de paga: {{$reser->pagado}}</li>

                      @endforeach
              </ul>
          </div>
          @endif
        @endisset

        @isset($futbolrap)
          @if(count($futbolrap) > 0)
          <div class="col-md-8">
              <br>
              <ul class="list-group">
                      <li class="list-group-item active">Reservas Futbol Rapido</li>
                      @foreach($futbolrap as $reser)

                          <li class="list-group-item">El dia: {{$reser->fecha}} por: {{$reser->email}} en el horario: {{$reser->hora}} y estado de paga: {{$reser->pagado}}</li>

                      @endforeach
              </ul>
          </div>
          @endif
        @endisset


@endsection
