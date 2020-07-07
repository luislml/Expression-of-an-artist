<template>
    <div class="pa-5"> 
        <v-text-field
            v-model="name_school"
            label="Nombre de la Escuela"
            dense
            outlined
        ></v-text-field>

        <v-text-field
            v-model="location"
            label="Ubicación"
            dense
            outlined
        ></v-text-field>

        <v-text-field
            v-model="about"
            label="Acerca de"
            dense
            outlined
        ></v-text-field>

        <v-textarea
            v-model="mission"
            outlined
            dense
            rows="3"
            label="Misión"
        ></v-textarea>

        <v-textarea
            v-model="vision"
            outlined
            dense
            rows="3"
            label="Visión"
        ></v-textarea>

        <v-btn color="primary" @click="createschool">Postular</v-btn>
        
    </div>
</template>
<script>
import toastr from 'toastr'
    import axios from 'axios'
    export default ({
        data () {
            return {    
                name_school: '',
                location: '',
                about: '',
                mission: '',
                vision: '',
                artschool: []
            }
        },
        methods: {
            //crear unidad
            createschool: function() {
                var url = 'art-school';
                axios.post(url, {
                    artschool: {
                        'name_school': this.name_school,
                        'location': this.location,
                        'about': this.about,
                        'mission': this.mission,
                        'vision': this.vision  
                    }  
                }).then(response => {
                    // console.log(response.data);
                    this.name_school = '';
                    this.location = '';
                    this.about = '';
                    this.mission = '';
                    this.vision = '';

                    this.$emit('close-dialog', false);
                    toastr.success('solicitud enviada correctamente');
                })
            }
        }  
    });
</script>