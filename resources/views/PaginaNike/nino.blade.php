@extends('layouts.app_nikenino')

@section('container')
    <!-- Navega entre secciones -->
    <div class=" border-top border-3 d-flex justify-content-center text-center">
        <nav class="navbar navbar-expand custom-nav">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item p-1">
                            <a class="nav-link active menu" aria-current="page" href="#todo"><span class="secciones" style="color: #ba2b2b">Calzado</span></a>
                        </li>
                        <li class="nav-item p-1">
                            <a class="nav-link active menu" aria-current="page" href="#todo" ><span style="color: #ba2b2b">Ropa</span></a>
                        </li>
                        <li class="nav-item p-1">
                            <a class="nav-link active menu" aria-current="page" href="#todo"><span style="color: #ba2b2b">Accesorios y equipo</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- Carousel -->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active data-bs-interval=1000">
            <img src="{{ asset('images/Nikeland.jpg') }}" class="d-block img-fluid" alt="...">
          </div>
          <div class="carousel-item data-bs-interval=1000">
            <img src="{{ asset('images/ninos.jpg') }}" class="d-block img-fluid" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Introducción-->
    <section id="introduccion" class="d-flex flex-column justify-content pt-5 text-center w-100 m-auto f">
        <p class="p-3 fs-2 "><span style="color: #7F8BDB">NIKELAND</span> en Roblox es un mundo increíble en donde el futuro del deporte es tuyo para crear. Echa una mirada a las últimas actualizaciones para descubrir nuevas formas de jugar.</p>
    </section>
      
      <!-- Sección de Calzado -->
      <section id="calzado"class="d-flex flex-row pt-5 text-center w-50 m-auto p-5">
        <h1 class="p-3 fs-2 border-top border-5 w-100 fst-italic "> <span style="color: #19225a">Calzado</span></h1>
      </section>
    {{-- Foreach --}}
    <div id="todo" class="container text-center mt-5">
        <div class="row row-cols-4 justify-content-center">
            @foreach ($ninos as $index => $nino)
                @if ($index > 0 && $index % 4 == 0)
                    </div><div class="row row-cols-4 justify-content-center">
                @endif
                <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 d-flex wrap c justify-content-center">
                    <div class="card mb-3 lh-sm">
                        <img src="{{ $nino->imagen ? asset('storage/images/' . $nino->imagen) : asset('images/Found.png') }}" class="card-img-top mx-auto" alt="Imagen" style="width: 150px; height: 150px;">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $nino->nombre }}</h5>
                            <p class="card-text">{{ $nino->descripcion }}</p>
                            <p class="card-text">{{ $nino->categoria }}</p>
                            <p class="card-text"><small class="text-body-secondary">{{ $nino->colores }} colores</small></p>
                            <p class="card-text text-center"><b>${{ $nino->precio }}</b></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection