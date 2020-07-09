<template>
    <div>
        <v-alert 
            v-if="success"   
            type="success"    
        >
            <strong>{{title}}</strong> {{message}}
            <v-btn 
            color="success" 
            dark
            fab
            v-on:click="readnotifications()">x</v-btn>
        </v-alert>        
        <v-alert 
            v-if="error"   
            type="error"    
        >
            <strong>{{title}}</strong> {{message}}
            <v-btn 
            color="error" 
            dark
            fab
            v-on:click="readnotifications()">x</v-btn>
        </v-alert>  
        
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
                this.success = false;
                console.log(response.data);
            })
        },             
    }
})
    
</script>