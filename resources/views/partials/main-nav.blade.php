<nav class="navbar navbar-expand-md main-nav">
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
            <ul class="navbar-nav ml-auto align-items-center">
                {{-- Public links --}}
                <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">
                        {{ __('Home') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        {{ __('Contact') }}
                    </a>
                </li>
                <notificayions-dash></notificayions-dash>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('loginregister') }}">
                            {{ __('Ingresar') }}
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
                            <img src="{{ asset('images/avatars/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('account') }}">
                                {{ __('Mi cuenta') }}
                            </a>

                            @if(auth()->user()->hasRoles(['4']))
                                <a class="dropdown-item" href="{{ route('admin.index') }}">
                                    {{ __('Dashboard') }}
                                </a>
                            @endif
                            @if(auth()->user()->hasRoles(['3']))
                                <a class="dropdown-item" href="{{ route('art-school.index') }}">
                                    {{ __('Dashboard') }}
                                </a>
                            @endif
                            @if(auth()->user()->hasRoles(['2']))
                                <a class="dropdown-item" href="{{ route('artist.index') }}">
                                    {{ __('Artista') }}
                                </a>
                            @endif

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

                    @if (auth()->user()->hasRoles(['1']))
                    <li class="nav-item dropdown">
                        <a id="options" class="nav-link dropdown-toggle nav-link-solid" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Publica tus obras de arte
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="options">
                            <a class="dropdown-item" href="javascript:;" data-toggle="modal" data-target="#modalArtist">
                                {{ __('¿Eres un artista?') }}
                            </a>
                            <a class="dropdown-item" href="javascript:;" data-toggle="modal" data-target="#modalSchool">
                                {{ __('¿Tienes una escuela de Arte?') }}
                            </a>
                        </div>
                    </li>
                    @endif
                @endguest
            </ul>
        </div>
    </div>
</nav>