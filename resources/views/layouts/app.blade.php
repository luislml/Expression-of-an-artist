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
        <v-app>
            <v-app-bar 
            app
            height="80"
            hide-on-scroll
            dark
            src="https://source.unsplash.com/random/?paint"
            >
                <template v-slot:img="{ props }">
                    <v-img
                        v-bind="props"
                        gradient="to top right, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.7)"
                    ></v-img>
                </template>

                <v-toolbar-title>
                    <v-btn href="/" text>
                        Sitio para los artistas
                    </v-btn>
                </v-toolbar-title>

                <v-spacer></v-spacer>

                @if (Auth::check())

                @if (auth()->user()->hasRoles(['1']))
                    <v-btn class="mx-2" dark color="red darken-3" rounded>
                        Artista
                        <v-icon medium>mdi-palette</v-icon>
                    </v-btn>
                @endif

                <v-menu
                :close-on-content-click="false"
                :offset-x="false"
                :offset-y="true"
                >
                    <template v-slot:activator="{ on, attrs }">
                        <v-btn icon v-bind="attrs" v-on="on" class="mx-2">
                            <v-badge
                                content="5"
                                value="5"
                                color="green"
                                overlap
                            >
                                <v-icon medium>mdi-bell</v-icon>
                            </v-badge>
                        </v-btn>
                    </template>

                    <v-card>
                        <v-list dense style="max-width: 300px">
                            <v-list-item-group color="black">
                                {{-- item notification --}}
                                <v-list-item>
                                    <v-list-item-avatar>
                                        <v-img src="https://cdn.vuetifyjs.com/images/lists/1.jpg"></v-img>
                                    </v-list-item-avatar>

                                    <v-list-item-content>
                                        <v-list-item-title>Brunch this weekend?</v-list-item-title>
                                        <v-list-item-subtitle>
                                            <span class='text--primary'>to Alex, Scott, Jennifer</span> &mdash; Wish I could come, but I'm out of town this weekend.
                                        </v-list-item-subtitle>
                                    </v-list-item-content>
                                </v-list-item>
                                {{-- item notification --}}
                                <v-list-item>
                                    <v-list-item-avatar>
                                        <v-img src="https://cdn.vuetifyjs.com/images/lists/1.jpg"></v-img>
                                    </v-list-item-avatar>

                                    <v-list-item-content>
                                        <v-list-item-title>Brunch this weekend?</v-list-item-title>
                                        <v-list-item-subtitle>
                                            <span class='text--primary'>to Alex, Scott, Jennifer</span> &mdash; Wish I could come, but I'm out of town this weekend.
                                        </v-list-item-subtitle>
                                    </v-list-item-content>
                                </v-list-item>
                            </v-list-item-group>
                        </v-list>
                    </v-card>
                </v-menu>

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
                                @if(auth()->user()->hasRoles(['4']))
                                    <v-list-item href="{{ route('admin.index') }}">
                                        <v-list-item-icon>
                                            <v-icon>mdi-view-dashboard</v-icon>
                                        </v-list-item-icon>
    
                                        <v-list-item-content>
                                            <v-list-item-title>Dashboard</v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                @endif
                                @if(auth()->user()->hasRoles(['3']))
                                    <v-list-item href="{{ route('art-school.index') }}">
                                        <v-list-item-icon>
                                            <v-icon>mdi-view-dashboard</v-icon>
                                        </v-list-item-icon>
    
                                        <v-list-item-content>
                                            <v-list-item-title>Dashboard</v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                @endif
                                @if(auth()->user()->hasRoles(['2']))
                                    <v-list-item href="{{ route('artist.index') }}">
                                        <v-list-item-icon>
                                            <v-icon>mdi-view-dashboard</v-icon>
                                        </v-list-item-icon>
    
                                        <v-list-item-content>
                                            <v-list-item-title>Dashboard</v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                @endif

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
                @else
                <v-btn class="mx-2" fab small color="teal" href="{{ route('loginregister') }}">
                    <v-icon medium>mdi-account</v-icon>
                </v-btn>
                @endif

                <template v-slot:extension>
                    <v-tabs
                    v-model="tab"
                    centered
                    slider-color="red darken-3"
                    background-color="black"
                    >
                        <v-tab>Home</v-tab>
                        <v-tab>About</v-tab>
                        <v-tab>Contact</v-tab>
                    </v-tabs>
                </template>
            </v-app-bar>
          
            <!-- Sizes your content based upon application components -->
            <v-main>
          
                <!-- Provides the application the proper gutter -->
                <v-container fluid>
                    @yield('content')
                </v-container>
            </v-main>
          
            <v-footer>
                hello
            </v-footer>
        </v-app>



        {{-- notificacion --}}
        {{-- <notification-general></notification-general> --}}
        {{-- navigation --}}
        {{-- @include('partials.main-nav') --}}
        {{-- end navigation --}}

        {{-- <main>
            @yield('content')
        </main> --}}

        {{-- modals --}}
        {{-- @include('partials.modals-app') --}}
        {{-- end modals --}}

        {{-- footer --}}
        {{-- @include('partials.footer') --}}
        {{-- end footer --}}
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- More scripts -->
    <script>

    </script>
    @yield('scripts')
</body>
</html>
