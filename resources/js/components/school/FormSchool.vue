<template>
    <div> 
        <form method="POST" v-on:submit.prevent="createschool">
            <div class="form-group" style="width: 100%">
                <label for="name-school">Nombre de la Escuela</label>
                <input type="text" v-model="name_school" class="form-control" id="name_school" placeholder="Nombre de la Escuela">
            </div>
            
            <div class="form-group">
                <label for="location">Ubicacion</label>
                <input type="text" v-model="location" class="form-control" id="location" placeholder="Ubicacion">
            </div>
            <div class="form-group">
                <label for="about">Acerca de:</label>
                <input type="text" v-model="about" class="form-control" id="about" placeholder="Acerca de">
            </div>
  
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Mision</span>
                </div>
                <textarea v-model="mission" class="form-control" id="mission" aria-label="With textarea"></textarea>
            </div>
            <br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Vision:</span>
                </div>
                <textarea v-model="vision" class="form-control" id="vision" aria-label="With textarea"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
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
                console.log(response.data);
                    this.name_school = '';
                    this.location = '';
                    this.about = '';
                    this.mission = '';
                    this.vision = '';
                    $('#modalSchool').modal('hide');
                    toastr.success('solicitud enviada correctamente');
			    })
            }    
        }  
    });
</script>