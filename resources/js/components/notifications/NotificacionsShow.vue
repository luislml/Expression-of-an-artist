<template>
    <div class="row">
        <div class="col-md-6" >
            <div class="card text-white bg-secondary">
                <div class="card-header">
                    <h4 class="mb-0">Notificaciones sin leer</h4>
                </div>
                <div class="card-body" v-for="unreadnotification in unreadnotifications" :key="unreadnotifications.id">
                    <a :href="'notifications/' + unreadnotification['id']">
                    <div class="card mb-3 text-dark bg-light border-top-0 border-right-0 border-bottom-0 border-success rounded-0" style="border-left-width: 5px;">
                        <div class="card-header">
                            solicitud {{unreadnotification['data']['type']}}
                        </div>
                        <div class="card-body">
                            De: {{unreadnotification['data']['name']}}
                        </div>
                        <div class="card-footer">
                            {{unreadnotification['created_at']}}
                            
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-white bg-secondary">
            <div class="card-header">
                <h4 class="mb-0">Notificaciones leídas</h4>
            </div>
            <div class="card-body" v-for="readnotification in readnotifications" :key="readnotifications.id">
                    <a :href="'notifications/' + readnotification['id']">
                    <div class="card mb-3 text-dark bg-light border-top-0 border-right-0 border-bottom-0 border-success rounded-0" style="border-left-width: 5px;">
                        <div class="card-header">
                            solicitud {{readnotification['data']['type']}}
                        </div>
                        <div class="card-body">
                            De: {{readnotification['data']['name']}}
                        </div>
                        <div class="card-footer">
                            {{readnotification['created_at']}}
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import moment from 'moment'


export default ({
     
    data () {
        return {
            
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