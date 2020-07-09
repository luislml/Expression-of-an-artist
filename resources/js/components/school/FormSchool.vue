<template>
    <div class="pa-5">
        <form @submit.prevent="createschool">
            <v-text-field
                v-model="name_school"
                label="Nombre de la Escuela"
                dense
                outlined
                :error-messages="name_schoolErrors"
                @input="$v.name_school.$touch()"
                @blur="$v.name_school.$touch()"
            ></v-text-field>

            <v-text-field
                v-model="location"
                label="Ubicación"
                dense
                outlined
                :error-messages="locationErrors"
                @input="$v.location.$touch()"
                @blur="$v.location.$touch()"
            ></v-text-field>

            <v-text-field
                v-model="about"
                label="Acerca de"
                dense
                outlined
                :error-messages="aboutErrors"
                @input="$v.about.$touch()"
                @blur="$v.about.$touch()"
            ></v-text-field>

            <v-textarea
                v-model="mission"
                label="Misión"
                rows="3"
                dense
                outlined
                :error-messages="missionErrors"
                @input="$v.mission.$touch()"
                @blur="$v.mission.$touch()"
            ></v-textarea>

            <v-textarea
                v-model="vision"
                label="Visión"
                rows="3"
                dense
                outlined
                :error-messages="visionErrors"
                @input="$v.vision.$touch()"
                @blur="$v.vision.$touch()"
            ></v-textarea>

            <v-btn color="red darken-3 white--text" type="submit">Postular</v-btn>
        </form>
    </div>
</template>
<script>
import { required } from 'vuelidate/lib/validators'
export default ({
    validations: {
        name_school: { required },
        location: { required },
        about: { required },
        mission: { required },
        vision: { required },
    },
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
    computed: {
        name_schoolErrors() {
            const errors = []
            if (!this.$v.name_school.$dirty) return errors
            !this.$v.name_school.required && errors.push('Nombre es obligatorio.')
            return errors
        },
        locationErrors() {
            const errors = []
            if (!this.$v.location.$dirty) return errors
            !this.$v.location.required && errors.push('Ubicacion es obligatorio.')
            return errors
        },
        aboutErrors() {
            const errors = []
            if (!this.$v.about.$dirty) return errors
            !this.$v.about.required && errors.push('sobre la escuela es obligatorio.')
            return errors
        },
        missionErrors() {
            const errors = []
            if (!this.$v.mission.$dirty) return errors
            !this.$v.mission.required && errors.push('Mision es obligatorio.')
            return errors
        },
        visionErrors() {
            const errors = []
            if (!this.$v.vision.$dirty) return errors
            !this.$v.vision.required && errors.push('Vision es obligatorio.')
            return errors
        }
    },
    methods: {
        //crear unidad
        createschool: function() {
            this.$v.$touch();
            if (this.$v.$invalid) {
                toastr.warning('Verifique los campos!');
            } else {
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
    }  
});
</script>