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
        
        <v-app id="inspire">
            <v-navigation-drawer
                v-model="drawer"
                app
                color="grey darken-3"
                clipped
                >
                {{-- esto mover --}}
                

                @if(auth()->user()->hasRoles(['4']))
                @include('admin.menu')
                @endif
                @if(auth()->user()->hasRoles(['3']))
                    @include('artschool.menu')
                @endif
                @if(auth()->user()->hasRoles(['2']))
                    @include('artist.menu')
                @endif
                {{-- hasta aqui --}}
            </v-navigation-drawer>
        
            <v-app-bar
                app
                color="grey darken-4"
                clipped-left
                dark
                >
                <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
                <v-toolbar-title>
                    <a class="navbar-brand" >
                        Arts
                    </a>
                </v-toolbar-title>
                <v-spacer></v-spacer>

                {{-- notificaciones --}}
                    <notificayions-dash></notificayions-dash>
                {{-- end notificaciones --}}

                <v-menu
                    :close-on-content-click="false"
                    :offset-x="false"
                    :offset-y="true"
                    >
                    <template v-slot:activator="{ on, attrs }">
                        <v-btn icon v-bind="attrs" v-on="on" class="ml-2 mr-0">
                            <v-avatar>
                                <img
                                src="{{ asset('images/avatars/' . Auth::user()->avatar) }}"
                                alt="John"
                                >
                            </v-avatar>
                        </v-btn>
                    </template>

                    <v-card>
                        <v-list>
                            <v-list-item>
                                <v-list-item-avatar color="black">
                                    <img src="{{ asset('images/avatars/' . Auth::user()->avatar) }}" alt="John">
                                </v-list-item-avatar>

                                <v-list-item-content>
                                    <v-list-item-title>{{ Auth::user()->name }}</v-list-item-title>
                                    <v-list-item-subtitle>Founder of Vuetify.js</v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>
                        </v-list>

                        <v-divider class="mt-0"></v-divider>

                        <v-list dense>
                            <v-list-item-group color="black">
                                <v-list-item href="{{ url('account') }}">
                                    <v-list-item-icon>
                                        <v-icon>mdi-account</v-icon>
                                    </v-list-item-icon>

                                    <v-list-item-content>
                                        <v-list-item-title>Mi cuenta</v-list-item-title>
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                >
                                    <v-list-item-icon>
                                        <v-icon>mdi-logout</v-icon>
                                    </v-list-item-icon>

                                    <v-list-item-content>
                                        <v-list-item-title>Salir</v-list-item-title>
                                    </v-list-item-content>
                                </v-list-item>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </v-list-item-group>
                        </v-list>
                    </v-card>
                </v-menu>
            </v-app-bar>
        
            <v-main>
                <v-container>
                    @yield('content')
                </v-container>
            </v-main>
            <v-footer
                color="grey darken-4"
                app
                >
                <span class="white--text">&copy; Arañas Dev </span>
            </v-footer>
        </v-app>
            
          
    </div>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="{{ asset('js/custom.js') }}"></script> --}}
    <!-- More scripts -->
    
    
   
        
  
    @yield('scripts')
    
</body>
</html>
