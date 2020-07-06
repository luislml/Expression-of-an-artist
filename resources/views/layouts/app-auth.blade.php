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
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- <link href="{{ asset('css/auth/auth.css') }}" rel="stylesheet"> --}}
        {{-- <link href="{{ asset('css/auth/jquery-ui.css') }}" rel='stylesheet'> --}}
        
    </head>
    <body>

        <div id="app" class="c-auth">
            {{-- <div class="container-auth" id="container">
                @yield('content')
            </div> --}}
            <div class="bg-container d-flex align-items-center justify-content-center">
                <div class="container">
                    <div id="auth" class="container-auth">
                        @yield('content')
                    </div>
                </div>
            </div>

            <div class="bg-efect">
                @include('auth.bg')
            </div>
        </div>

        
        
        <!-- Scripts -->
        {{-- <script src="{{ asset('js/auth/auth.js') }}"></script> --}}
        {{-- <script src="{{ asset('js/auth/jquery.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('js/auth/jquery-ui.min.js') }}"></script> --}}
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script src="{{ asset('js/auth/TweenMax.min.js') }}"></script>
    </body>
</html>
