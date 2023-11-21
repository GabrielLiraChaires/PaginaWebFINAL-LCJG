@extends('layouts.app_nikemujer')

@section('container')
    <!-- Navega entre secciones -->
    <div class=" border-top border-3 d-flex justify-content-center text-center">
        <nav class="navbar navbar-expand custom-nav">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item p-1">
                            <a class="nav-link active menu" aria-current="page" href="#todo"><span style="color: #ba2b2b">Calzado</span></a>
                        </li>
                        <li class="nav-item p-1">
                            <a class="nav-link active menu" aria-current="page" href="#todo"><span style="color: #ba2b2b">Ropa</span></a>
                        </li>
                        <li class="nav-item p-1">
                            <a class="nav-link active menu" aria-current="page" href="#todo"><span style="color: #ba2b2b">Accesorios y equipo</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- Presentación a Mujer -->
    <div class="ratio ratio-16x9" style="display:desabled">
        <img src="{{ asset('images/MujerTo.jpeg') }}" alt="">
      </div>
      <section id="introduccion" class="d-flex flex-column justify-content-center pt-5 text-center w-50 m-auto"> 
        <h1 class="p-3 fs-1 border-top border-bottom border-3">PIÉRDELO TODO. <span style="color: #ba2b2b;">GÁNALO TODO.</span></h1>
      </section>
      <!-- Introducción a Mujer -->
      <section id="introduccion" class="d-flex flex-column justify-content-center pt-5 text-center w-50 m-auto">
        <p class="p-3 fs-2 ">Cuantó más lejos llegues, más lejos estarás de rendirte.</p>
      </section>
      
      <!-- Sección de Calzado -->
      <section id="calzado"class="d-flex flex-row pt-5 text-center w-50 m-auto p-5">
        <h1 class="p-3 fs-2 border-top border-5 w-100 fst-italic ">Calzado</h1>
    </section>
    {{-- Foreach --}}
    <div id="todo" class="container text-center mt-5">
        <div class="row row-cols-4 justify-content-center">
            @foreach ($mujeres as $index => $mujeres)
                @if ($index > 0 && $index % 4 == 0)
                    </div><div class="row row-cols-4 justify-content-center">
                @endif
                <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 d-flex wrap c justify-content-center">
                    <div class="card mb-3 lh-sm">
                        <img src="{{ $mujeres->imagen ? asset('storage/images/' . $mujeres->imagen) : asset('images/Found.png') }}" class="card-img-top mx-auto" alt="Imagen" style="width: 150px; height: 150px;">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $mujeres->nombre }}</h5>
                            <p class="card-text">{{ $mujeres->descripcion }}</p>
                            <p class="card-text">{{ $mujeres->categoria }}</p>
                            <p class="card-text"><small class="text-body-secondary">{{ $mujeres->colores }} colores</small></p>
                            <p class="card-text text-center"><b>${{ $mujeres->precio }}</b></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection