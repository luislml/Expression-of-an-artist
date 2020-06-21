<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar py-0 navbar-expand-lg navbar-dash">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Arts
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto align-items-center">
                        {{-- Public links --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/')}}">
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:;">
                                <i class="fa fa-bell" aria-hidden="true"></i>
                            </a>
                        </li>
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img class="avatar rounded-circle mr-1" src="{{ asset('images/user.jpg') }}" alt="user">
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Salir') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <aside class="sidebar"> 
            <div class="side-scroll">

                <div class="nav-user">
                    <a href="javascript:;">
                        <div class="cover" style="background-image: url({{ asset('images/blog-img1.jpg') }})"></div>
                        <div class="image">
                            <img class="rounded-circle" src="{{ asset('images/user.jpg') }}" alt="user">
                        </div>
                        <div class="info">
                            {{ auth()->user()->name }}
                            <small>
                            @if(auth()->user()->hasRoles(['4']))
                                Administrador
                            @endif
                            @if(auth()->user()->hasRoles(['3']))
                                Escuela
                            @endif
                            @if(auth()->user()->hasRoles(['2']))
                                Artista
                            @endif
                            </small>
                        </div>
                    </a>
                </div>

                @if(auth()->user()->hasRoles(['4']))
                    @include('admin.menu')
                @endif
                @if(auth()->user()->hasRoles(['3']))
                    @include('artschool.menu')
                @endif
                @if(auth()->user()->hasRoles(['2']))
                    @include('artist.menu')
                @endif

            </div>

            <a href="javascript:;" id="minified">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </a>
        </aside>

        <main class="dash-content">
            @yield('content')
        </main>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- More scripts -->
    <script>
        $(document).ready(function() {

            $('#minified').on('click', function() {
                $('body').toggleClass('sidebar-minified');
                $('.sidebar-minified .sub-menu').removeClass('on');
                $('.sidebar-minified .sub-menu>ul').hide('fade');
            });
            
            $('.sub-menu>a').on('click', function() {

                if ($(this).parent().hasClass('on')) {
                    $(this).parent().children('ul').hide('fade');
                    $(this).parent().removeClass('on');
                } else {
                    $(this).parent().children('ul').show('fade');
                    $(this).parent().addClass('on');
                }
                
            });

            if (!$('body').hasClass('sidebar-minified')) {
                
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
