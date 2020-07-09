<template>
    <v-card
    color="grey lighten-2"
    class="mx-auto"
    max-width="auto"
    outlined
>
        <v-list-item three-line v-if="state">
            <v-list-item-content>
                <div class="overline mb-4">{{request.created_at}}</div>
                <v-list-item-title class="headline mb-1">Usuario <strong>{{user.name}}</strong> Solicita crear Escuela con los siguientes datos</v-list-item-title>
                <v-list-item><h4><strong>Nombre de Escuela:</strong> {{request.name_school}}</h4></v-list-item>
                <v-list-item><h4><strong>Ubicacion:</strong> {{request.location}}</h4></v-list-item>
                <v-list-item><h4><strong>Informacion:</strong> {{request.about}}</h4></v-list-item>
                <v-list-item><h4><strong>Mision:</strong> {{request.mission}}</h4></v-list-item>
                <v-list-item><h4><strong>Vision:</strong> {{request.vision}}</h4></v-list-item>         
            </v-list-item-content>
        </v-list-item>
        <v-list-item three-line v-if="state==false">
            <v-list-item-content>
                <div class="overline mb-4">{{request.created_at}}</div>
                <v-list-item-title class="headline mb-1">Usuario <strong>{{user.name}}</strong> realizo peticion de artista</v-list-item-title>
                <v-list-item><h4><strong>Biografia:</strong> {{request.biography}}</h4></v-list-item>
                <v-list-item><h4><strong>Fecha de nacimiento:</strong> {{request.birthday}}</h4></v-list-item>
                <v-list-item><h4><strong>Telefono Cell:</strong> {{request.tel_cel}}</h4></v-list-item>
                <v-list-item><h4><strong>Ubicacion:</strong> {{request.created_at}}</h4></v-list-item>
                      
            </v-list-item-content>
        </v-list-item>

    <v-card-actions>
        
        
        <div class="my-2">
            <v-btn color="success" small dark v-on:click="accept(notify.id)">Aceptar</v-btn>
        </div>
        <div class="my-2">
            <v-btn color="error" small dark v-on:click="danger(notify.id)">Rechasar</v-btn>
        </div>
    </v-card-actions>
    
</v-card>
</template>
<script>
import moment from 'moment'

export default ({
    
    props: ['id'],
     
    data () {
        return {
            request: this.id[0],
            user: this.id[1],
            notify: this.id[2],
            datos: '',
            message: '',
            typenotify: '',
            state: false,
            
            
        }
    },
    
    created: function() {    
             if (typeof this.request.tel_cel == "undefined") {
                 this.state = true;
             }
             this.request.created_at = moment(this.request.created_at).format('LLL');
            
        },
    methods: {
            //marcar notificacione leida
            accept: function(id) {
                this.message = 'success';
                this.typenotify = 'succes';
                var url = 'notifications'+id;
                this.datos = [this.user.id, this.request.id, this.message, this.typenotify];
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
                this.datos = [this.user.id, this.request.id, this.message, this.typenotify];
                axios.put(url, this.datos).then(response => {
                    console.log(response.data);
                    toastr.error('Rechasado');
                })
            },
               
    }
})
</script>
