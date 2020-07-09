<template>
    <v-container>
        <v-row>
            <v-col
                cols="12"
                sm="12"
                md="6"
                >
                
                <v-card color="white" flat>
                    <v-toolbar color="red" dark>
                        <v-toolbar-title>Notificaciones sin leer</v-toolbar-title>
                        <v-spacer></v-spacer>
                    </v-toolbar>
                    <template >
                    <v-col v-for="unreadnotification in unreadnotifications" :key="unreadnotification.id">
                        <v-hover
                            v-slot:default="{ hover }"
                            open-delay="200"
                            >
                            <v-card
                                class="mx-auto"
                                :elevation="hover ? 16 : 2"                  
                            >
                                <v-card-text>
                                    <div>{{unreadnotification['created_at']}}</div>
                                    <p class="display-1">
                                        Solicitud {{unreadnotification['data']['type']}}
                                    </p>
                                    <div>
                                        De: {{unreadnotification['data']['name']}}
                                    </div>
                                </v-card-text>
                                

                                <v-card-actions>
                                    <v-btn
                                        text
                                        color="red"
                                        :href="'notifications/' + unreadnotification['id']"
                                    >
                                        Leer Mas
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-hover>
                    </v-col>
                </template>
                </v-card>
                
            </v-col>
            <v-col
                cols="12"
                sm="12"
                md="6"
                >
                <v-card color="white" flat >
                    <v-toolbar color="green" dark>
                        <v-toolbar-title>Notificaciones leídas</v-toolbar-title>
                        <v-spacer></v-spacer>
                    </v-toolbar>
                    <template >
                        <v-col class="mx-auto"
                            v-for="readnotification in readnotifications" :key="readnotification.id">
                            <v-hover
                                v-slot:default="{ hover }"
                                open-delay="200"
                                >
                                <v-card
                                    class="mx-auto"
                                    :elevation="hover ? 16 : 2" 
                                    >
                                    <v-card-text>
                                        <div>{{readnotification['created_at']}}</div>
                                        <p class="display-1">
                                            Solucitud {{readnotification['data']['type']}}
                                        </p>
                                        <div>
                                            De: {{readnotification['data']['name']}}
                                        </div>
                                    </v-card-text>
                                    <v-card-actions>
                                        <v-btn
                                            text
                                            color="red"
                                            :href="'notifications/' + readnotification['id']"
                                        >
                                            Leer Mas
                                        </v-btn> -->
                                        <!-- modal
                                        
                                        
                                            <v-btn
                                            color="primary"
                                            dark
                                            @click.stop="dialog = true"
                                            >
                                            Open Dialog
                                            </v-btn>

                                            
                                        

                                        <!-- end modal -->
                                    </v-card-actions>
                                </v-card>
                            </v-hover>
                        </v-col>

                        <!-- dialog -->
                        <v-dialog
                                            v-model="dialog"
                                            max-width="290"
                                            >
                                            <v-card>
                                                <v-card-title class="headline">Use Google's location service?</v-card-title>

                                                <v-card-text>
                                                Let Google help apps determine location. This means sending anonymous location data to Google, even when no apps are running.
                                                </v-card-text>

                                                <v-card-actions>
                                                <v-spacer></v-spacer>

                                                <v-btn
                                                    color="green darken-1"
                                                    text
                                                    @click="dialog = false"
                                                >
                                                    Disagree
                                                </v-btn>

                                                <v-btn
                                                    color="green darken-1"
                                                    text
                                                    @click="dialog = false"
                                                >
                                                    Agree
                                                </v-btn>
                                                </v-card-actions>
                                            </v-card>
                                            </v-dialog>
                        <!-- end dialog -->
                    </template>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
import moment from 'moment'


export default ({
     
    data () {
        return {
            dialog: true,
            readnotifications: [],
            unreadnotifications: [],
        }
    },
    mounted() {
        Echo.channel('AdminNotify').listen('AdminsNotify', (data) => {
            this.getnotifications();
        })  
    },
    created: function() {
            this.dialog = false;
            this.getnotifications();

        },
    methods: {
            //mostrar notificaciones
            getnotifications: function() {
                var urlnotification = 'getnotify';
                axios.get(urlnotification).then(response => {
                    this.unreadnotifications = response.data.unreadnotifications;
                    this.readnotifications = response.data.readnotifications;
                    this.unreadnotifications.forEach(function(unreadnotification, index) {
                        unreadnotification['created_at'] = moment(unreadnotification['created_at']).format('LLL');
                    });
                    this.readnotifications.forEach(function(readnotification, index) {
                        readnotification['created_at'] = moment(readnotification['created_at']).format('LLL');
                    });
                });
            },
             
           
            
    }
})
    
</script>