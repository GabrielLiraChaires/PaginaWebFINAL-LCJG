@extends('layouts.app')

@section('container')
    <h1 class="text-center">Productos de Temporada</h1>
    <div class="container">
        <form action="{{route('TemporadasCreate')}}" method="get">
            <button class="btn btn-primary mb-2" type="submit">
                <span class="p-4">Nuevo</span>
            </button>
        </form>
        <table class="table table-responsive table-striped-columns text-center">
            <tr class="table-primary">
                <td>ID</td>
                <td>Nombre</td>
                <td>Descripción</td>
                <td>Colores</td>
                <td>Categoria</td>
                <td>Precio</td>
                <td>Imagen</td>
                <td>Acciones</td>
            </tr>
            @foreach ($temporadas as $temporada)
                <tr>
                    <td>{{$temporada->id}}</td>
                    <td>{{$temporada->nombre}}</td>
                    <td>{{$temporada->descripcion}}</td>
                    <td>{{$temporada->colores}} colores</td>
                    <td>{{$temporada->categoria}}</td>
                    <td>{{$temporada->precio}}$</td>
                    <td>
                        @if($temporada->imagen)
                            <img src="{{ asset('storage/images/' . $temporada->imagen) }}" alt="Imagen" width="50">
                        @else
                            <img src="{{ asset('images/Found.png') }}" alt="Imagen por defecto" width="50">
                        @endif
                    </td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('TemporadasEdit',$temporada->id)}}" class="btn btn-success mx-1">Editar</a>
                            <form class="formulario-eliminar" action="{{route('TemporadasDestroy',$temporada->id)}}" method="post">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger mx-1">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$temporadas->links('pagination::bootstrap-5')}}
    </div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
 document.addEventListener('DOMContentLoaded', function() {
 const formularios = document.querySelectorAll('.formulario-eliminar');
 
 formularios.forEach(formulario => {
 formulario.addEventListener('submit', function(e) {
 e.preventDefault();
 
 Swal.fire({
 title: '¿Estás seguro?',
 text: '¡Esta acción no es reversible!',
 icon: 'warning',
 showCancelButton: true,
 confirmButtonColor: '#3085d6',
 cancelButtonColor: '#d33',
 confirmButtonText: 'Sí, eliminar',
 cancelButtonText: 'Cancelar'
 }).then((result) => {
 if (result.isConfirmed) {
 this.submit();
 }
 });
 });
 });
 });
</script>
@endsection