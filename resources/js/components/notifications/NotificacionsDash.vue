<template>
    <v-menu
    :close-on-content-click="false"
    :offset-x="false"
    :offset-y="true"
    >
        <template v-slot:activator="{ on, attrs }">
            <v-btn icon v-bind="attrs" v-on="on" class="mx-2">
                <v-badge
                    :content="notify"
                    :value="notify"
                    color="red"
                    overlap
                >
                    <v-icon medium>mdi-bell</v-icon>
                </v-badge>
            </v-btn>
        </template>

        <v-card v-if="notify>=1">
            <v-list dense style="max-width: 300px">
                <v-list-item-group color="black">
                    <!-- item notification -->
                    <v-list-item v-for="notification in notifications" :key="notification.id"
                    :href="'notifications/' + notification['id']">
                        <v-list-item-avatar>
                            <v-img src="https://cdn.vuetifyjs.com/images/lists/1.jpg"></v-img>
                        </v-list-item-avatar>

                        <v-list-item-content>
                            <v-list-item-title>Solicitud {{notification['data']['type']}}</v-list-item-title>
                            <v-list-item-subtitle>
                                <span class='text--primary'>{{notification['data']['name']}}</span> &mdash;{{notification['created_at']}}
                            </v-list-item-subtitle>
        
                        </v-list-item-content>
                    </v-list-item>
                </v-list-item-group>
            </v-list>
        </v-card>
        <v-card v-if="notify<1">
            <v-list dense style="max-width: 300px">
                <v-list-item-group color="black">
                    <!-- item notification -->
                    <v-list-item >
                        Sin Notificaciones
                    </v-list-item>
                </v-list-item-group>
            </v-list>
        </v-card>

    </v-menu>
     
</template>
<script>
import moment from 'moment'
export default ({
    data () {
        return {
            notifications: [],
            notify: '',
             
        }
    },
    mounted() {
        Echo.channel('AdminNotify').listen('AdminsNotify', (data) => {
            
            this.getnotifications();
            
        })
        
    },
    created: function() {
            this.getnotifications();
        },
    methods: {
        //mostrar notificaciones
        getnotifications: function() {
            var urlnotification = 'getnotify';
            axios.get(urlnotification).then(response => {
                this.notifications = response.data.unreadnotifications;
                this.notify = this.notifications.length;
                this.notifications.forEach(function(notification, index) {
                    notification['created_at'] = moment(notification['created_at']).format('LLL');
                    
                });
            });
        },
    }
})
</script>