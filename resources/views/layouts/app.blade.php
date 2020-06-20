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
        <nav class="navbar py-0 navbar-expand-md main-nav">
            <div class="container">
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
                    <ul class="navbar-nav ml-auto">
                        {{-- Public links --}}
                        <li class="nav-item active">
                            <a class="nav-link" href="#">
                                {{ __('Home') }}
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                {{ __('Shop') }}
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                {{ __('Contact') }}
                                <i class="fa fa-comment" aria-hidden="true"></i>
                            </a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('loginregister') }}">
                                    {{ __('Ingresar') }}
                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    <i class="fa fa-user" aria-hidden="true"></i>
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>

        <footer id="footer" class="bg-dark">
            <div class="container">
                <div class="copyright">
                
                    <ul class="row-links">
                        <li><a href="#" class="link">Contact us</a></li>
                        <li><a href="#" class="link">Privacy policy</a></li>
                        <li><a href="#" class="link">Terms of use</a></li>
                        <li><a href="#" class="link">Faq</a></li>                    
                    </ul>
                    
                    <p class="mb-0">© 2015 <a href="#">RED ART</a>. All rights reserved.</p>
                    
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- More scripts -->
    <script>
        $(window).scroll(function() {    // this will work when your window scrolled.
            var height = $(window).scrollTop();  //getting the scrolling height of window
            
            if(height == 0) {
                $(".main-nav").removeClass('sticky');
                $('.main-nav').css({top: '0px', opacity: '1'});
            }
            else {
                if(height  <= 200) {
                    $(".main-nav").addClass('sticky');
                    $('.main-nav').animate({top: '-100px', opacity: '0'}, 0);
                } 
                else {
                    $(".main-nav").addClass('sticky');
                    $('.main-nav').animate({top: '0px', opacity: '1'}, 0);
                }
            }

            // animation
            if(height == 0) {
                $('.animate-top').css({
                    margin: '0'
                });
            }
            else {
                $('.animate-top').animate({
                    margin: '-' + height + 'px 0px 0px 0px'
                }, 0);
            }

            // animation
            if(height == 0) {
                $('.animate-top-xs').css({
                    margin: '0'
                });
            }
            else {
                $('.animate-top-xs').animate({
                    margin: '-' + height*0.2 + 'px 0px 0px 0px'
                }, 0);
                // banner
                $('.c-banner').animate({
                    'background-position-y': -height*0.2 + 'px'
                }, 0);
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
