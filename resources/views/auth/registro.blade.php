@extends('layouts.app_principal')
@section('container')
    <h1 class="text-center">Registro</h1>
    <div class="container w-50">
        <form action="{{route('RegistroStore')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name" class="form.label">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" placeholder="Escribe tu nombre">
                @error('name')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="username" class="form.label">Usuario</label>
                <input type="text" name="username" id="username" class="form-control" value="{{old('username')}}" placeholder="Crea un usuario">
                @error('username')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email" class="form.label">Correo Electronico</label>
                <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" placeholder="Escribe tu correo electronico">
                @error('email')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="form.label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Escribe tu contraseña">
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="form.label">Repetir Contraseña</label>
                <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="Repite contraseña">
                @error('password')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Crear Cuenta</button>
                <a href="{{route('Index')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection