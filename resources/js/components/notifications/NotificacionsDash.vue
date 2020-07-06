<template>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bell" aria-hidden="true"></i>
            <span class="badge badge-pill badge-danger" >{{notify}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right notify-drop" v-if="notify>0">
            <div class="notify-drop-title">
                <div class="row no-gutters">
                    <div class="col-6">
                        Notificaciones (<b v-text="notify"></b>)
                    </div>
                    <div class="col-6 text-right">
                        <a href="#"><i class="fa fa-eye"></i> Ver todo</a>
                    </div>
                </div>
            </div>
            <!-- end notify title -->
            <!-- notify content -->
            <div class="drop-content">
                <ul class="list-unstyled" v-for="notification in notifications" :key="notification.id">
                    <li>
                        <a :href="'notifications/' + notification['id']">
                            <div class="media align-items-center">
                                <img src="images/user.jpg" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1">Solicitud {{notification['data']['type']}} <small>{{notification['data']['name']}}</small></h5>
                                    <span>{{notification['created_at']}}</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="dropdown-menu dropdown-menu-right notify-drop" v-if="notify<1">
            <div class="notify-drop-title">
                <div class="row no-gutters" >
                    <h5>Sin Notificaciones</h5>
                </div>
            </div>
            <!-- end notify title --> 
        </div>
    </li>
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