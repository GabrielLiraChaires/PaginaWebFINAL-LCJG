<!-- Navegación -->
<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('Index')}}"><span class="text-primary fs-5 fw-bold">Crud Productos Nike</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active text-center" aria-current="page" href="{{route('LoginIndex')}}">Iniciar sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-center" aria-current="page" href="{{route('RegistroStore')}}">Registro</a>
                </li>
            </ul>
        </div>
    </div>
</nav>