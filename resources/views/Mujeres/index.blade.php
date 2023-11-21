@extends('layouts.app')

@section('container')
    
    <h1 class="text-center">Productos de Mujer</h1>
    <div class="container">
        <form action="{{route('MujeresCreate')}}" method="get">
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
            @foreach ($mujeres as $mujer)
                <tr>
                    <td>{{$mujer->id}}</td>
                    <td>{{$mujer->nombre}}</td>
                    <td>{{$mujer->descripcion}}</td>
                    <td>{{$mujer->colores}} colores</td>
                    <td>{{$mujer->categoria}}</td>
                    <td>{{$mujer->precio}}$</td>
                    <td>
                        @if($mujer->imagen)
                            <img src="{{ asset('storage/images/' . $mujer->imagen) }}" alt="Imagen" width="50">
                        @else
                            <img src="{{ asset('images/Found.png') }}" alt="Imagen por defecto" width="50">
                        @endif
                    </td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('MujeresEdit',$mujer->id)}}" class="btn btn-success mx-1">Editar</a>
                            <form class="formulario-eliminar" action="{{route('MujeresDestroy',$mujer->id)}}" method="post">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger mx-1">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$mujeres->links('pagination::bootstrap-5')}}
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