@extends('layouts.app_principal')
@section('container')
    <h1 class="text-center">Login</h1>
    <div class="container w-50">
        <form action="{{route('LoginStore')}}" method="post">
            @csrf
            <div class="form-group">
                @if(session('mensaje'))
                    <div class="text-danger">{{session('mensaje')}}</div>
                @endif

                <label for="username" class="form.label">Usuario</label>
                <input type="text" name="username" id="username" class="form-control" value="{{old('username')}}" placeholder="Ingresa tu usuario">
                @error('username')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="form.label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Escribe tu contraseña">
                @error('password')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                <a href="{{route('Index')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection