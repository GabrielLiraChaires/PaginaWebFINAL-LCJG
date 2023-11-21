@extends('layouts.app_nikeindex')

@section('container')
    <!-- Buscar -->
    <div class="container p-5">
        <div class="row row-cols-2 justify-content-end">
          <div class="col-12">
            <div class="input-group input-group-xl">
              <input type="text" class="form-control border border-secondary-subtle" placeholder="Buscar..." aria-label="Buscar..." aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Buscar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Presentación a Nike -->
      <div class="ratio ratio-16x9" style="display:desabled">
        <video controls autoplay muted loop width="560" height="315">
          <source src="{{ asset('images/Nike.mp4') }}" type="video/mp4">
          Tu navegador no admite la reproducción de video.
        </video>
      </div>
      <!-- Introducción a nike -->
    <section id="introduccion" class="d-flex flex-column justify-content-center pt-5 text-center w-50 m-auto">
        <h1 class="p-3 fs-1 border-top border-bottom border-3">JUST <span style="color: #ba2b2b;">DO IT</span></h1>
        <p class="p-3 fs-2 ">Cuantó más lejos llegues, más lejos estarás de rendirte.</p>
    </section>
    <!-- Cards destacadas -->
    <div class="container p-3">
        <div class="row row-cols-2 justify-content-center">
          <div class="col col-lg-6">
            <a href="#temporada">
              <div class="card text-bg-dark mb-3" style="max-height: 100%;">
                <img src="{{ asset('images/Temporada.png') }}" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <div class="card-img-overlay d-flex flex-column justify-content-end" style="width: 200px;">
                    <p class="card-title">Tendencias para esta temporada.</p>
                  </div>
                </div>
              </div>
              <p class="text-center p-style">Hecho para aquellos que siempre estan a la moda &#128521;</p>
            </a>
          </div>
          <div class="col col-lg-6" style="max-height: 744;">
            <a href="mujer.html">
              <div class="card text-bg-dark mb-3">
                <img src="{{ asset('images/Mujer.png') }}" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <div class="card-img-overlay d-flex flex-column justify-content-end" style="width: 250px;">
                    <p class="card-title">La sección de solo para mujeres.</p>
                  </div>
                </div>
              </div>
            </a>
            <a href="hombre.html">
              <div class="card text-bg-dark">
                <img src="{{ asset('images/Hombre.png') }}" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <div class="card-img-overlay d-flex flex-column justify-content-end" style="width: 250px;">
                    <p class="card-title">La sección de solo para hombres.</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
    </div>
    <!-- Sección de temporada -->
    <section id="temporada"class="d-flex flex-row justify-content-center pt-5 text-center w-50 m-auto">
        <h1 class="p-3 fs-2 border-top border-3 fst-italic">Dulce o truco</h1>
        <p class="p-1 fs-5 text-start border-bottom border-3 f"><span style="color: #ba2b2b;">Nike</span> está relacionado con la tradición, siempre puedes encontrar una gran variedad de productos exclusivos de temporada, tales como los favoritos de día de muertos.</p>
    </section>
    {{-- Foreach --}}
    <div class="container text-center mt-5">
      <div class="row row-cols-4 justify-content-center">
          @foreach ($temporadas as $index => $temporada)
              @if ($index > 0 && $index % 4 == 0)
                  </div><div class="row row-cols-4 justify-content-center">
              @endif
              <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 d-flex wrap c justify-content-center">
                  <div class="card mb-3 lh-sm">
                      <img src="{{ $temporada->imagen ? asset('storage/images/' . $temporada->imagen) : asset('images/Found.png') }}" class="card-img-top mx-auto" alt="Imagen" style="width: 150px; height: 150px;">
                      <div class="card-body">
                          <h5 class="card-title text-center">{{ $temporada->nombre }}</h5>
                          <p class="card-text">{{ $temporada->descripcion }}</p>
                          <p class="card-text">{{ $temporada->categoria }}</p>
                          <p class="card-text"><small class="text-body-secondary">{{ $temporada->colores }} colores</small></p>
                          <p class="card-text text-center"><b>${{ $temporada->precio }}</b></p>
                      </div>
                  </div>
              </div>
          @endforeach
      </div>
  </div>
@endsection
