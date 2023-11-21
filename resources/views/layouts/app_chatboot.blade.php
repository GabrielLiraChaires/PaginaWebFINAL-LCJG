<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ChatBoot</title>

        @vite(['resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/stylechat.css') }}">
    </head>
    <body>
        @yield('container')
        @yield('js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </body>
</html>
