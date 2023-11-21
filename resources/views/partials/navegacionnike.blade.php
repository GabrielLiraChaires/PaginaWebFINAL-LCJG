<!-- Navegación -->
<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container-fluid d-flex justify-content-between">
      <!-- Logotipo -->
      <a class="nav-link active nav-linkColor" aria-current="page" href="{{route('NikeIndex')}}">
        <svg aria-hidden="true" class="pre-logo-svg" focusable="false" viewBox="0 0 24 24" role="img" width="100px" height="100px" fill="none"><path fill="currentColor" fill-rule="evenodd" d="M21 8.719L7.836 14.303C6.74 14.768 5.818 15 5.075 15c-.836 0-1.445-.295-1.819-.884-.485-.76-.273-1.982.559-3.272.494-.754 1.122-1.446 1.734-2.108-.144.234-1.415 2.349-.025 3.345.275.2.666.298 1.147.298.386 0 .829-.063 1.316-.19L21 8.719z" clip-rule="evenodd"></path></svg>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active menu" aria-current="page" href="{{route('NikeIndex')}}">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active menu" aria-current="page" href="{{ route('NikeMujer') }}">Mujer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active menu" aria-current="page" href="{{ route('NikeHombre') }}">Hombre</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active menu" aria-current="page" href="{{ route('NikeNino') }}">Niños</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active menu" aria-current="page" href="{{route('MuroIndex')}}">Salir</a>
          </li>
          <li class="nav-item">
            <div class="input-group input-group-xl p-1">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseWidthExample"><img src="{{ asset('images/Carrito.png') }}" alt="" class="carrito"></button>
                <div>
                  <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                      <div class="alert alert-danger text-center" role="alert">
                        Este elemento no se encuentra disponible por el momento...
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>