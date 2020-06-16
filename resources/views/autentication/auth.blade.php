<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        
        <!-- Styles -->
        <link href="{{ asset('css/auth/auth.css') }}" rel="stylesheet">
        <link href="{{ asset('css/auth/jquery-ui.css') }}" rel='stylesheet'>
        
    </head>
    <body>
        <div class="container" id="container">
            @include('autentication.login') 
            @include('autentication.register')
            @include('autentication.overlay')
        </div>
            @include('autentication.bg')
        
        <!-- Scripts -->
        <script src="{{ asset('js/auth/auth.js') }}" defer></script>
        <script src="{{ asset('js/auth/jquery.min.js') }}"></script>
        <script src="{{ asset('js/auth/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/auth/TweenMax.min.js') }}"></script>
    </body>
</html>
