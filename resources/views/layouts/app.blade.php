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
</head>
<body>
    <div id="app">
        {{-- navigation --}}
        @include('partials.main-nav')
        {{-- end navigation --}}

        <main>
            @yield('content')
        </main>

        {{-- modals --}}
        @include('partials.modals-app')
        {{-- end modals --}}

        {{-- footer --}}
        @include('partials.footer')
        {{-- end footer --}}
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- More scripts -->
    @yield('scripts')
</body>
</html>
