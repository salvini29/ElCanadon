@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
  
        <div class="col-md-8">
            <br>
            <div class="card">
              <h5 class="card-header">Crear Promocion</h5>
              <div class="card-body">
                    
                   <form action="{{ route('postPromociones') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="nombrepromo">Nombre</label>
                      <input type="text" class="form-control" name="nombrepromo" id="nombrepromo" placeholder="Super promo">
                    </div>
                    <div class="form-group">
                      <label for="descpromo">Descripcion</label>
                      <input type="text" class="form-control" name="descpromo" id="descpromo" style="height:80px;" placeholder="Si reservas dos canchas...">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Crear</button>
                  </form>

              </div>
            </div>
        </div>

        @isset($promos)
          @if(count($promos) > 0)
            @foreach($promos as $promo)              
              <div class="col-md-8">
                <br>
                @if( $promo->activa == 1)
                      <div class="card text-white bg-primary mb-3">
                        <div class="card-header">{{ $promo->nombre }}</div>
                        <div class="card-body">
                          <h5 class="card-title">Sobre esta promo:</h5>
                          <p class="card-text">{{ $promo->descripcion }}</p>
                          <p class="card-text">Activa: {{ $promo->activa }}</p>
                        </div>
                        <div class="card-footer">                  
                            <form action="{{ route('cambiarEstadoPromo') }}" method="post">
                              @csrf
                              <input type="text" class="form-control" id="idPromo" name="idPromo" value="{{ $promo->id }}" hidden>
                              <input type="text" class="form-control" id="estadoPromo" name="estadoPromo" value="{{ $promo->activa }}" hidden>
                              <button type="submit" class="btn btn-light" name="desactivarPromo" id="desactivarPromo">Desactivar</button>
                            </form>
                        </div>  
                      </div>
                @else
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-header">{{ $promo->nombre }}</div>
                        <div class="card-body">
                          <h5 class="card-title">Sobre esta promo:</h5>
                          <p class="card-text">{{ $promo->descripcion }}</p>
                          <p class="card-text">Activa: {{ $promo->activa }}</p>
                        </div>
                        <div class="card-footer">                  
                            <form action="{{ route('cambiarEstadoPromo') }}" method="post">
                              @csrf
                              <input type="text" class="form-control" id="idPromo" name="idPromo" value="{{ $promo->id }}" hidden>
                              <input type="text" class="form-control" id="estadoPromo" name="estadoPromo" value="{{ $promo->activa }}" hidden>
                              <button type="submit" class="btn btn-light" name="activarPromo" id="activarPromo">Activar</button>
                              
                            </form>
                        </div>  
                      </div>
                @endif

              </div>
            @endforeach
          @endif
        @endisset

    </div>
</div>
@endsection
