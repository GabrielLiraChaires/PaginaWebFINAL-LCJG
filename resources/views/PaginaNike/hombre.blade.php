@extends('layouts.app_nikehombre')

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
      <!-- Presentación hombre -->
      <div class="container p-3">
        <div class="row row-cols-2 justify-content-center">
          <div class="col col-lg-6">
            <a href="#todo">
              <div class="card text-bg-dark" style="max-height: 100%;">
                <img src="{{ asset('images/p3.jpg') }}" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <div class="card-img-overlay d-flex flex-column justify-content-end" style="width: 200px;">
                    <p class="card-title"><b>Calzado</b></p>
                  </div>
                </div>
              </div>
              <p class="text-center p-style">¿Que esperas para sentir esa emoción en tu pecho?  &#129300;</p>
            </a>
          </div>
          <div class="col col-lg-6" style="max-height: 744;">
            <a href="#todo">
              <div class="card text-bg-dark mb-3">
                <img src="{{ asset('images/p2.jpg') }}" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <div class="card-img-overlay d-flex flex-column justify-content-end" style="width: 250px;">
                    <p class="card-title">Ropa.</p>
                  </div>
                </div>
              </div>
            </a>
            <a href="#todo">
              <div class="card text-bg-dark">
                <img src="{{ asset('images/p1.jpg') }}" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <div class="card-img-overlay d-flex flex-column justify-content-end" style="width: 250px;">
                    <p class="card-title">Equipo.</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
      <!-- Introducción a hombre -->
      <section id="introduccion" class="d-flex flex-column justify-content-center pt-5 text-center w-50 m-auto">
        <p class="p-3 fs-1 ">Si puedes verlo, <span style="color: #ba2b2b;">tu puedes alcanzarlo.</span></p>
      </section>
      {{-- Foreach --}}
    <div id="todo" class="container text-center mt-5">
        <div class="row row-cols-4 justify-content-center">
            @foreach ($hombres as $index => $hombre)
                @if ($index > 0 && $index % 4 == 0)
                    </div><div class="row row-cols-4 justify-content-center">
                @endif
                <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 d-flex wrap c justify-content-center">
                    <div class="card mb-3 lh-sm">
                        <img src="{{ $hombre->imagen ? asset('storage/images/' . $hombre->imagen) : asset('images/Found.png') }}" class="card-img-top mx-auto" alt="Imagen" style="width: 150px; height: 150px;">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $hombre->nombre }}</h5>
                            <p class="card-text">{{ $hombre->descripcion }}</p>
                            <p class="card-text">{{ $hombre->categoria }}</p>
                            <p class="card-text"><small class="text-body-secondary">{{ $hombre->colores }} colores</small></p>
                            <p class="card-text text-center"><b>${{ $hombre->precio }}</b></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection