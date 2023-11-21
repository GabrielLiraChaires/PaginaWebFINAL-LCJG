@extends('layouts.app')

@section('container')
    <h1 class="text-center">Editar Registro</h1>
    <div class="container w-50">
        <form action="{{route('ChatbootUpdate',$registro->id)}}" method="post" enctype="multipart/form-data">
            @csrf @method('PATCH')

            <div class="form-group">
                <label for="pregunta" class="form.label">Pregunta</label>
                <input type="text" name="pregunta" id="pregunta" class="form-control" value="{{old('pregunta',$registro->Pregunta)}}">
                @error('pregunta')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="respuesta" class="form.label">Respuesta</label>
                <input type="textarea" name="respuesta" id="respuesta" class="form-control" value="{{old('respuesta',$registro->Respuesta)}}">
                @error('respuesta')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{route('ChatbootIndex')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection