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
                            
                            
                            @if(auth()->user()->hasRoles(['4']))
                                <a class="dropdown-item" href="{{ route('admin.index') }}">
                                    {{ __('admin') }}
                                </a>
                            @endif
                            @if(auth()->user()->hasRoles(['3']))
                                <a class="dropdown-item" href="{{ route('art-school.index') }}">
                                    {{ __('escuela') }}
                                </a>
                            @endif
                            @if(auth()->user()->hasRoles(['2']))
                                <a class="dropdown-item" href="{{ route('artist.index') }}">
                                    {{ __('artista') }}
                                </a>
                            @endif

                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="options" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            opcion
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="options">
                            <a class="dropdown-item" href="javascript:;" data-toggle="modal" data-target="#modalArtist">
                                {{ __('Artista') }}
                            </a>
                            <a class="dropdown-item" href="javascript:;" data-toggle="modal" data-target="#modalSchool">
                                {{ __('Escuela') }}
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>