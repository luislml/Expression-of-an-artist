<template>
    <li class="nav-item dropdown">
        <a id="notification" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <i class="fa fa-bell" aria-hidden="true"></i>
            <span class="badge badge-pill badge-danger">3</span>
        </a>

        <div class="dropdown-menu dropdown-menu-right notify-drop">
            <div class="notify-drop-title">
                <div class="row no-gutters">
                    <div class="col-6">
                        Notificaciones (<b> 3 </b>)
                    </div>
                    <div class="col-6 text-right">
                        <a href="/notificatios"><i class="fa fa-eye"></i> Ver todo</a>
                    </div>
                </div>
            </div>
            <!-- end notify title -->
            <!-- notify content -->
            <div class="drop-content">
                <ul class="list-unstyled">
                    <li>
                        <a href="#">
                            <div class="media align-items-center">
                                <img src="images/user.jpg" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1">Solicitud escuela <small>(nombre)</small></h5>
                                    <span>10-12-2020</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1">Alerta de uso </h5>
                                    <span>10-12-2020</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="media align-items-center">
                                <img src="images/user.jpg" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1">Solicitud Artista <small>(nombre)</small></h5>
                                    <span>10-12-2020</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </li>
</template>
<script>
export default {
    data() {
        return {
            
        }
    },
    mounted() {
        Echo.channel('admin').listen('NewArtist', (data) => {
            console.log(data);
        })
    },
}
</script>