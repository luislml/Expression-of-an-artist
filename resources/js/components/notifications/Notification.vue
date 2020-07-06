<template>
    <div class="card text-white bg-secondary">
        <div class="card-header">
            <h4 class="mb-0">Notificaciones</h4>
        </div>
        <div class="card-body" >
            <a >
            <div class="card mb-3 text-dark bg-light border-top-0 border-right-0 border-bottom-0 border-success rounded-0" style="border-left-width: 5px;">
                <div class="card-header">
                    <h5>Solicitud de Escuela del Usuario: <strong>{{user.name}}</strong> en fecha <strong>{{school.created_at}}</strong></h5> 
                </div>
                <div class="card-body">
                    <h4><strong>Nombre de Escuela:</strong> {{school.name_school}}</h4>
                    <h4><strong>Ubicacion:</strong> {{school.location}}</h4>
                    <h4><strong>Informacion:</strong> {{school.about}}</h4>
                    <h4><strong>Mision:</strong> {{school.mission}}</h4>
                    <h4><strong>Vision:</strong> {{school.vision}}</h4> 
                        
                    <br><br> 
                    <h4 v-if="state" class="text-danger">Esta Notificacion ya fue revisada</h4>  
                </div>
                <div class="card-footer">
                    
                    <div class="btn-group" role="group" >
                        <button v-if="classbutton" type="button" classbutton class="btn btn-secondary" v-on:click="accept(notify.id)">Aceptar</button>
                        <button v-if="classbutton" type="button" class="btn btn-secondary" v-on:click="danger(notify.id)">Rechasar</button>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>
</template>
<script>
import moment from 'moment'

export default ({
    
    props: ['id'],
     
    data () {
        return {
            school: this.id[0],
            user: this.id[1],
            notify: this.id[2],
            datos: '',
            message: '',
            typenotify: '',
            classbutton: true,
            state: false,
            
        }
    },
    
    created: function() {    
             if (this.school.state == true) {
                 this.classbutton = false;
             }
             if (this.notify['read_at']!=null) {
                 this.state = true;
             }
        },
    methods: {
            //marcar notificacione leida
            accept: function(id) {
                this.message = 'success';
                this.typenotify = 'succes';
                var url = 'notifications'+id;
                this.datos = [this.user.id, this.school.id, this.message, this.typenotify];
                axios.put(url, this.datos).then(response => {
                   
                    console.log(response.data);
                    toastr.success('aceptado');
                })
            },
            // rechasar peticion
            danger: function(id) {
                this.message = 'tocorrect';
                this.typenotify = 'danger';
                var url = 'notifications'+id;
                this.datos = [this.user.id, this.school.id, this.message, this.typenotify];
                axios.put(url, this.datos).then(response => {
                   this.school.state = true;
                    console.log(response.data);
                    toastr.error('Rechasado');
                })
            },
             
           
            
    }
})
</script>
<style lang="scss">
    .btn {
    color: rgb(0, 0, 0);
    background: rgb(117, 125, 131);
    &::before {
        background: #456cee; 
    }
    &:hover {
        color: #000;
        &::before {
            transform: scaleX(1);
            transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
        }
    }
    &.round {
        border-radius: 50px;
        &::before {
            border-radius: 50px;
        }
    }
    &.small {
        font-size: 14px;
        padding: 11px 20px;
    }
    &.medium {
        font-size: 16px;
        padding: 16px 20px;
    }
    &.large {
        font-size: 18px;
        padding: 21px 45px;
    }
    &.xlarge {
        font-size: 20px;
        padding: 25px 50px;
    }
    &.on {
        background: #fff;
        color: #000;
    }
    > i {
        margin-left: 10px;
    }
    &:focus, &:active {
        border: 0 none;
        outline: none;
        box-shadow: none;
    }
    &.btn-primary {
        background: #a81c1c;
        &:hover {
            color: #a81c1c;
        }
        &.on {
            background: #fff;
            color: #a81c1c;
            &:hover {
                &::before {
                    content: none;
                }
            }
        }
    }
}

</style>