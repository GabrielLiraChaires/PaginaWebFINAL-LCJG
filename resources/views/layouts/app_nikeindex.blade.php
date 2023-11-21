<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nike Index</title>

        @vite(['resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/stylenike.css') }}">
    </head>
    <body>
        @include('partials.navegacionnike')
        @yield('container')
        @include('partials.footernike')
    </body>
</html>