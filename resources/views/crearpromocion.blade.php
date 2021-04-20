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
                <div class="card text-white bg-success mb-3">
                  <div class="card-header">{{ $promo->nombre }}</div>
                  <div class="card-body">
                    <h5 class="card-title">Sobre esta promo:</h5>
                    <p class="card-text">{{ $promo->descripcion }}</p>
                  </div>
                </div>
              </div>
            @endforeach
          @endif
        @endisset

    </div>
</div>
@endsection
