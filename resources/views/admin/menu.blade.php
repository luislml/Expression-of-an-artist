{{-- <div class="list-group">
    <a href="{{ url('admin') }}" class="list-group-item list-group-item-action {{ (request()->is('admin')) ? 'active' : '' }}">
        <i class="fa fa-th-large"></i>
        <span>Dashboard</span>
    </a>
    <a href="{{ url('notifications') }}" class="list-group-item list-group-item-action {{ (request()->is('notificatios')) ? 'active' : '' }}">
        <i class="fa fa-bell" aria-hidden="true"></i>
        <span>Notificaciones</span>
    </a>
</div> --}}

{{-- <v-img
    src="https://cdn.vuetifyjs.com/images/lists/ali.png"
    height="65px"
    dark
    >
    <v-row class="fill-center">
        <v-card-title class="white--text pl-15 pt-6" >
            Admin
        </v-card-title>
    </v-row>
</v-img> --}}

<v-card
    class="mx-auto"
    width="300"
    
  >
    <v-list shaped
    color="grey darken-3"
    dark>
        {{-- menu normal --}}
        <v-list-item 
        link 
        
        href="{{ url('admin') }}" class="{{ (request()->is('admin')) ? 'active' : '' }}"
        >
            <v-list-item-icon>
                <v-icon>mdi-view-dashboard</v-icon>
            </v-list-item-icon>
            <v-list-item-title>Dashboard</v-list-item-title>
        </v-list-item>
        <v-list-item 
        link 
        href="{{ url('notifications') }}" class="{{ (request()->is('notificatios')) ? 'active' : '' }}"
        >
            <v-list-item-icon>
                <v-icon>mdi-bell</v-icon>
            </v-list-item-icon>
            <v-list-item-title>Notificaciones</v-list-item-title>
        </v-list-item>
        {{-- end menu normal --}}
        {{-- sub menu --}}
        <v-list-group
            prepend-icon="mdi mdi-account-circle"
            
        >
            <template v-slot:activator>
            <v-list-item-title>Users</v-list-item-title>
            </template>

            <v-list-group
            no-action
            sub-group
                >
                <template v-slot:activator>
                    <v-list-item-content>
                    <v-list-item-title>Admin</v-list-item-title>
                    </v-list-item-content>
                </template>

                <v-list-item link>
                    <v-list-item-title>Administracion</v-list-item-title>
                    <v-list-item-icon>
                        <v-icon >mdi-account-multiple-outline</v-icon>
                    </v-list-item-icon>
                </v-list-item>
            </v-list-group>
        </v-list-group>
        {{-- end sub menu --}}
    </v-list>
  </v-card>