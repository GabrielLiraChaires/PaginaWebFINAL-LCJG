<!-- Navegación -->
<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('MuroIndex')}}"><span class="text-primary fs-5 fw-bold">Crud Productos Nike</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item p-1">
                <a class="nav-link active" aria-current="page" href="{{route('TemporadasIndex')}}">Productos Temporada</a>
                </li>
                <li class="nav-item p-1">
                    <a class="nav-link active" aria-current="page" href="{{route('HombresIndex')}}">Productos Hombres</a>
                </li>
                <li class="nav-item p-1">
                    <a class="nav-link active" aria-current="page" href="{{route('MujeresIndex')}}">Productos Mujeres</a>
                </li>
                <li class="nav-item p-1">
                    <a class="nav-link active" aria-current="page" href="{{route('NinosIndex')}}">Productos Niños</a>
                </li>
                <li class="nav-item p-1">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Usuario: {{auth()->user()->username}}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" aria-current="page" href="{{route('ChatbootIndex')}}"><b>Ayuda</b></a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{route('LogoutStore')}}" method="post" class="dropdown-item text-center">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Cerrar Sesión</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>