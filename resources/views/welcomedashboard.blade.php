@extends('layouts.app')

@section('container')
    <h1 class="text-center">Bienvenido {{auth()->user()->username}}</h1>
    <div class="universe">
        <img src="{{ asset('images/LogoTec.jpg') }}" class="card-img-top logo" alt="Logo de Nike">
    </div>
@endsection