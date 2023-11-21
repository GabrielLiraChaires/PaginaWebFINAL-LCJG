@extends('layouts.app_principal')

@section('container')
    <h1 class="text-center text-primary">Administración Nike</h1>
    <a href="{{route('NikeIndex')}}">
      <div class="d-flex p-4 align-items-center justify-content-center">
        <div class="card custom-card" style="max-height: 100%;">
          <img src="{{ asset('images/LogoInicial.jpg') }}" class="card-img-top" alt="Logo de Nike">
          <div class="card-img-overlay d-flex flex-column justify-content-end">
            <p class="card-title color-changing-text text-center" style=" font-size: 20px; color:rgb(0, 0, 0); margin-bottom: -50px;"><b>Acceder a Nike</b></p>
          </div>
        </div>
      </div>
    </a>
@endsection