@extends('layouts.app')

@section('container')
    <h1 class="text-center p-5">Chatboot de Ayuda</h1>
    <div class="container">
        <div class="row">
            <!-- Contenedor izquierdo -->
            <div class="col-md-6 text-left">
                <!-- Formulario de creación y edición -->
                <form action="{{ route('ChatbootStore') }}" method="post" id="chatForm">
                    @csrf
                    <div class="form-group">
                        <label for="pregunta" class="form.label">Pregunta</label>
                        <input type="text" name="pregunta" id="pregunta" class="form-control" value="{{ isset($registro) ? $registro->Pregunta : old('pregunta') }}">
                        @error('pregunta')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="respuesta" class="form.label">Respuesta</label>
                        <input type="text" name="respuesta" id="respuesta" class="form-control" value="{{ isset($registro) ? $registro->Respuesta : old('respuesta') }}">
                        @error('respuesta')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mx-2">Guardar</button>
                        <a href="{{ route('ChatbootIndex') }}" class="btn btn-danger mx-2">Cancelar</a>
                    </div>
                </form>
            </div>
            <!-- Contenedor derecho -->
            <div class="col-md-6 text-left">
                <table class="table table-responsive table-striped-columns text-center">
                    <tr class="table-primary">
                        <td>ID</td>
                        <td>Pregunta</td>
                        <td>Respuesta</td>
                        <td>Acciones</td>
                    </tr>
                    @forelse ($registros as $chat)
                        <tr data-id="{{ $chat->id }}">
                            <td>{{ $chat->id }}</td>
                            <td>{{ $chat->Pregunta }}</td>
                            <td>{{ $chat->Respuesta }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('ChatbootEdit', $chat->id) }}" class="btn btn-success mx-1">Editar</a>
                                    <form class="formulario-eliminar" action="{{ route('ChatbootDestroy', $chat->id) }}" method="post">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger mx-1">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay registros disponibles.</td>
                        </tr>
                    @endforelse
                </table>
                {{ $registros->links('pagination::bootstrap-5') }}
            </div>
        </div>
        <a href="{{ route('ChatbootVista') }}" onclick="openChatBootWindow(); return false;">
            <div class="d-flex p-4 align-items-center justify-content-center">
                <div class="card custom-card" style="max-height: 100%;">
                    <img src="{{ asset('images/ChatBoot.webp') }}" class="card-img-top" alt="ChatBoot">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <p class="card-title color-changing-text text-center" style="font-size: 20px; color:rgb(0, 0, 0); margin-bottom: -50px;"><b>Acceder a ChatBoot</b></p>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setupEliminarForms();
        });

        function setupEliminarForms() {
            const formularios = document.querySelectorAll('.formulario-eliminar');

            formularios.forEach(formulario => {
                formulario.addEventListener('submit', function (e) {
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
        }

        function openChatBootWindow() {
            window.open('{{ route('ChatbootVista') }}', 'ChatBoot', 'width=700, height=500');
        }
    </script>
@endsection
