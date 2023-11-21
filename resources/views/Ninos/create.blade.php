@extends('layouts.app')

@section('container')
    <h1 class="text-center">Nuevo Producto Niños</h1>
    <div class="container w-50">
        <form action="{{route('NinosStore')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nombre" class="form.label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}">
                @error('nombre')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="descripcion" class="form.label">Descripción</label>
                <input type="textarea" name="descripcion" id="descripcion" class="form-control" value="{{old('descripcion')}}">
                @error('descripcion')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="colores" class="form.label">Colores</label>
                <input type="number" name="colores" id="colores" class="form-control" value="{{old('colores')}}">
                @error('colores')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="categoria" class="form.label">Categoria</label>
                <select name="categoria" class="form-select">
                    <option>Calzado</option>
                    <option>Ropa</option>
                    <option>Accesorios</option>
                </select>
            </div>
            <div class="form-group">
                <label for="precio" class="form.label">Precio</label>
                <input type="text" name="precio" id="precio" class="form-control" value="{{old('precio')}}">
                @error('precio')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="imagen" class="form.label">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
                @error('imagen')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{route('NinosIndex')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection