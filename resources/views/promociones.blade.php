@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
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

@endsection
