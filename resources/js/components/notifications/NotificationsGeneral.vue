<template>
    <div>
        <div v-if="success" class="top-alert mb-0 alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{title}}</strong><br>
                {{message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" v-on:click="readnotifications()">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div v-if="error" class="top-alert mb-0 alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{title}}</strong><br>
                {{message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" v-on:click="readnotifications()" >
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
    </div>
    
</template>
<script>

export default ({
     
    data () {
        return {
            
            message: '',
            title: '',
            success: false,
            error: false,
            unreadnotifications: [],
            msjid: '',
            idabstract: 1,
            
        }
    },
    mounted() {
        Echo.channel('UserNotify').listen('UserNotify', (data) => {
            this.readmessage(data.UserNotify);
            
        })  
    },
    created: function() {
            this.readmessage();
            
        },
    methods: {
        //mostrar notificaciones generales

        readmessage: function(data) {
           console.log(data);
            if (data == 'success') {
                this.title = 'Felicidades!';
                this.success = true;
                this.message = 'Su postulación fue aceptada, ya puede navegar por las diferentes opciones';
            } 
            if (data == 'tocorrect') {
                this.title = 'Peticion Denegada!!!';
                this.error = true;
                this.message = 'Su postulación fue denegada, revise su informacion y vuelva a enviar su solicitud';
            }   
        },  
        //marcar notificacion leida
        readnotifications: function() {
            this.msjid = 'readnotifysuccess';
            var url = 'notification/'+this.msjid;
            axios.get(url).then(response => {
                console.log(response.data);
            })
        },             
    }
})
    
</script>