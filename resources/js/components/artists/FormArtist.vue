<template>
    <div>
        <form @submit.prevent="createArtist">
            <v-stepper v-model="e6" vertical>
                <v-stepper-step :complete="e6 > 1" :editable="e6 > 1" step="1" color="red darken-3">
                    Datos generales
                    <!-- <small>Summarize if needed</small> -->
                </v-stepper-step>

                <v-stepper-content step="1">
                    <div class="my-3">
                        <v-menu
                            ref="nowMenu"
                            v-model="nowMenu"
                            :close-on-content-click="false"
                            :nudge-right="40"
                            :return-value.sync="step1.birthday"
                            transition="scale-transition"
                            min-width="290px"
                            offset-y
                        >
                            <template v-slot:activator="{ on, attrs }">
                                <v-text-field
                                    v-model="step1.birthday"
                                    label="Fecha de nacimiento"
                                    dense
                                    readonly
                                    outlined
                                    v-bind="attrs"
                                    v-on="on"
                                    :error-messages="birthdayErrors"
                                    @input="$v.step1.birthday.$touch()"
                                    @blur="$v.step1.birthday.$touch()"
                                ></v-text-field>
                            </template>
                            <v-date-picker
                                v-model="step1.birthday"
                                no-title
                                scrollable
                            >
                                <v-spacer></v-spacer>
                                <v-btn
                                    text
                                    color="primary"
                                    @click="nowMenu = false"
                                >
                                    Cancel
                                </v-btn>
                                <v-btn
                                    text
                                    color="primary"
                                    @click="$refs.nowMenu.save(step1.birthday)"
                                >
                                    OK
                                </v-btn>
                            </v-date-picker>
                        </v-menu>

                        <v-text-field
                            v-model="step1.tel_cel"
                            label="Tel/cel"
                            dense
                            outlined
                            :error-messages="tel_celErrors"
                            @input="$v.step1.tel_cel.$touch()"
                            @blur="$v.step1.tel_cel.$touch()"
                        ></v-text-field>

                        <v-text-field
                            v-model="step1.location"
                            label="Ubicación"
                            dense
                            outlined
                            :error-messages="locationErrors"
                            @input="$v.step1.location.$touch()"
                            @blur="$v.step1.location.$touch()"
                        ></v-text-field>

                        <v-textarea
                            v-model="step1.biography"
                            label="Biografía"
                            rows="3"
                            dense
                            outlined
                            :error-messages="biographyErrors"
                            @input="$v.step1.biography.$touch()"
                            @blur="$v.step1.biography.$touch()"
                        ></v-textarea>
                        
                    </div>

                    <v-btn color="red darken-3 white--text" @click="changeStep(2)">Siguiente</v-btn>
                </v-stepper-content>

                <v-stepper-step :complete="e6 > 2" :editable="e6 > 2" step="2" color="red darken-3">
                    Curriculum
                </v-stepper-step>

                <v-stepper-content step="2">
                    <div class="my-3">
                        <v-radio-group row v-model="step2.type_cv">
                            <v-radio
                                label="Url"
                                value="url"
                                color="grey"
                            ></v-radio>
                            <v-radio
                                label="Pdf"
                                value="pdf"
                                color="grey"
                            ></v-radio>
                            <v-radio
                                label="Text"
                                value="text"
                                color="grey"
                            ></v-radio>
                        </v-radio-group>

                        <!-- url -->
                        <div v-if="step2.type_cv === 'url'">
                            <v-text-field
                                v-model="step2.curriculum.url"
                                label="Url del sitio"
                                dense
                                outlined
                                :error-messages="urlErrors"
                                @input="$v.step2.curriculum.url.$touch()"
                                @blur="$v.step2.curriculum.url.$touch()"
                            ></v-text-field>
                        </div>
                        <!-- pdf -->
                        <div class="form-group" v-if="step2.type_cv === 'pdf'">
                            <v-file-input 
                                label="Archivo Pdf"
                                outlined
                                dense
                                accept="application/pdf"
                                @change="processFile"
                                :error-messages="pdfErrors"
                                @input="$v.step2.curriculum.pdf.$touch()"
                                @blur="$v.step2.curriculum.pdf.$touch()"
                            >
                            </v-file-input>
                        </div>
                        <!-- text -->
                        <div class="form-group" v-if="step2.type_cv === 'text'">
                            <v-textarea
                                v-model="step2.curriculum.text"
                                label="Currilulum"
                                dense
                                outlined
                                :error-messages="textErrors"
                                @input="$v.step2.curriculum.text.$touch()"
                                @blur="$v.step2.curriculum.text.$touch()"
                            ></v-textarea>
                        </div>
                    </div>

                    <v-btn color="red darken-3 white--text" @click="changeStep(3)">Siguiente</v-btn>
                </v-stepper-content>

                <v-stepper-step :complete="e6 > 3" :editable="e6 > 3" step="3" color="red darken-3">
                    Habilidades
                </v-stepper-step>

                <v-stepper-content step="3">
                    <div class="my-3">
                        <v-select
                            :items="optionsCat"
                            item-text="name"
                            item-value="id"
                            label="Artista en:"
                            outlined
                            multiple
                            chips
                            v-model="step3.listCat"
                            :error-messages="listCatErrors"
                            @input="$v.step3.listCat.$touch()"
                            @blur="$v.step3.listCat.$touch()"
                        ></v-select>
                        <!-- v-model="step3.listCat" -->
                    </div>

                    <v-btn color="red darken-3 white--text" type="submit">Postular</v-btn>
                </v-stepper-content>
            </v-stepper>
        </form>
    </div>
</template>
<script>
import { required, requiredIf, email, minLength, numeric } from 'vuelidate/lib/validators'
const isDate2 = (value) => {
    var regEx = /^\d{4}-\d{2}-\d{2}$/;
    if(!value.match(regEx)) return false;  // Invalid format
    var d = new Date(value);
    var dNum = d.getTime();
    if(!dNum && dNum !== 0) return false; // NaN value, Invalid date
    return d.toISOString().slice(0,10) === value;
}
export default {
    validations: {
        step1: {
            biography: { required },
            birthday: { 
                required,
                isDate (value) {
                    return isDate2(value);
                }
            },
            location: { required },
            tel_cel: { required, numeric },
        },
        step2: {
            curriculum: {
                url: {
                    required: requiredIf(function() {
                        return (this.step2.type_cv === 'url') ? true : false
                    })
                },
                pdf: {
                    required: requiredIf(function() {
                        return (this.step2.type_cv === 'pdf') ? true : false
                    })
                },
                text: {
                    required: requiredIf(function() {
                        return (this.step2.type_cv === 'text') ? true : false
                    })
                },
            }
        },
        step3: {
            listCat: { required },
        }
    },
    data() {
        return {
            e6: 1,
            nowMenu: false,

            optionsCat: [],
            step1: {
                birthday: '',
                tel_cel: '',
                location: '',
                biography: '',
                // profession: false
            },
            step2: {
                type_cv: 'url',
                curriculum: {
                    url: null,
                    pdf: null,
                    text: null
                }
            },
            step3: {
                listCat: []
            }
        }
    },
    created() {
        this.getCategories();
    },
    computed: {
        biographyErrors() {
            const errors = []
            if (!this.$v.step1.biography.$dirty) return errors
            !this.$v.step1.biography.required && errors.push('Una biografía es obligatorio.')
            return errors
        },
        birthdayErrors() {
            const errors = []
            if (!this.$v.step1.birthday.$dirty) return errors
            !this.$v.step1.birthday.required && errors.push('La fecha de nacimiento es obligatorio.')
            !this.$v.step1.birthday.isDate && errors.push('Formato de la fecha invalido.')
            return errors
        },
        locationErrors() {
            const errors = []
            if (!this.$v.step1.location.$dirty) return errors
            !this.$v.step1.location.required && errors.push('La ubicación es obligatorio.')
            return errors
        },
        tel_celErrors() {
            const errors = []
            if (!this.$v.step1.tel_cel.$dirty) return errors
            !this.$v.step1.tel_cel.required && errors.push('Número de Tel/Cel es obligatorio.')
            !this.$v.step1.tel_cel.numeric && errors.push('Número de Tel/Cel no valido.')
            return errors
        },
        urlErrors() {
            const errors = []
            if (!this.$v.step2.curriculum.url.$dirty) return errors
            !this.$v.step2.curriculum.url.required && errors.push('Url es obligatorio.')
            return errors
        },    
        pdfErrors() {
            const errors = []
            if (!this.$v.step2.curriculum.pdf.$dirty) return errors
            !this.$v.step2.curriculum.pdf.required && errors.push('Pdf es obligatorio.')
            return errors
        },
        textErrors() {
            const errors = []
            if (!this.$v.step2.curriculum.text.$dirty) return errors
            !this.$v.step2.curriculum.text.required && errors.push('Llenar el campo es obligatorio.')
            return errors
        },
        listCatErrors() {
            const errors = []
            if (!this.$v.step3.listCat.$dirty) return errors
            !this.$v.step3.listCat.required && errors.push('Seleccione al menos una habilidad.')
            return errors
        }
    },
    methods: {
        getCategories() {
            axios.get('/category')
            .then((response) => {
                this.optionsCat = response.data;
            })
            .catch((error) => {
                console.log(error);
            })
        },
        processFile(event) {
            // this.step2.curriculum.pdf = event.target.files[0];
            this.step2.curriculum.pdf = event;
        },
        changeStep(step) {
            if (step === 2) {
                this.$v.step1.$touch();
                if (this.$v.step1.$invalid) {
                    toastr.warning('Verifique los campos!');
                } else {
                    this.e6 = step;
                }
            } else if(step === 3) {
                this.$v.step2.$touch();
                if (this.$v.step2.$invalid) {
                    toastr.warning('Verifique los campos!');
                } else {
                    this.e6 = step;
                }
            }
        },
        createArtist() {
            this.$v.$touch();
            if (this.$v.$invalid) {
                toastr.warning('Verifique los campos!');
            } else {
                const formData = new FormData();
                formData.append('birthday', this.step1.birthday);
                formData.append('tel_cel', this.step1.tel_cel);
                formData.append('location', this.step1.location);
                formData.append('biography', this.step1.biography);
                /* let profession = (this.step1.profession == true) ? 1 : 0;
                formData.append('profession', profession); */
                
                formData.append('type_cv', this.step2.type_cv);
                switch (this.step2.type_cv) {
                    case 'url':
                        formData.append('curriculum', this.step2.curriculum.url);
                        break;
                    case 'pdf':
                        formData.append('curriculum', this.step2.curriculum.pdf);
                        break;
                    default:
                        formData.append('curriculum', this.step2.curriculum.text);
                        break;
                }

                formData.append('listCat', this.step3.listCat);
                formData.append('_method', 'POST');

                axios.post('/artist', formData)
                .then((response) => {
                    // console.log(response);
                    this.e6 = 1;
                    this.step1 = {
                        birthday: '',
                        tel_cel: '',
                        location: '',
                        biography: '',
                        // profession: false
                    };
                    this.step2 = {
                        type_cv: 'url',
                        curriculum: {
                            url: null,
                            pdf: null,
                            text: null
                        }
                    };
                    this.step3 = {
                        listCat: []
                    };
                    
                    this.$emit('close-dialog', false);
                    toastr.success('solicitud fue enviada correctamente');
                })
                .catch((error) => {
                    console.log(error);
                })
            }
        }
    }
}
</script>