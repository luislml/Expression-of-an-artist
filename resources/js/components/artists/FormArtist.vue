<template>
    <div>
        <v-stepper v-model="e6" vertical>
            <v-stepper-step :complete="e6 > 1" :editable="e6 > 1" step="1">
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
                    ></v-text-field>

                    <v-text-field
                        v-model="step1.location"
                        label="Ubicación"
                        dense
                        outlined
                    ></v-text-field>

                    <v-textarea
                        v-model="step1.biography"
                        outlined
                        dense
                        rows="3"
                        label="Biografía"
                    ></v-textarea>
                    
                </div>

                <v-btn color="primary" @click="e6 = 2">Siguiente</v-btn>
            </v-stepper-content>

            <v-stepper-step :complete="e6 > 2" :editable="e6 > 2" step="2">
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
                        >
                        </v-file-input>
                    </div>
                    <!-- text -->
                    <div class="form-group" v-if="step2.type_cv === 'text'">
                        <v-textarea
                            v-model="step2.curriculum.text"
                            outlined
                            dense
                            label="Currilulum"
                        ></v-textarea>
                    </div>
                </div>

                <v-btn color="primary" @click="e6 = 3">Siguiente</v-btn>
            </v-stepper-content>

            <v-stepper-step :complete="e6 > 3" :editable="e6 > 3" step="3">
                Habilidades
            </v-stepper-step>

            <v-stepper-content step="3">
                <div class="my-3">
                    <v-select
                        :items="optionsCat"
                        item-text="name"
                        item-value="id"
                        label="Artista en:"
                        dense
                        outlined
                        multiple
                        chips
                        v-model="step3.listCat"
                    ></v-select>
                    <!-- v-model="step3.listCat" -->
                </div>

                <v-btn color="primary" @click="createArtist">Postular</v-btn>
            </v-stepper-content>
        </v-stepper>

    </div>
</template>
<script>
import toastr from 'toastr'
import axios from 'axios'
export default {
    name: 'FormArtist',
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
                profession: false
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
        createArtist() {
            const formData = new FormData();
            formData.append('birthday', this.step1.birthday);
            formData.append('tel_cel', this.step1.tel_cel);
            formData.append('location', this.step1.location);
            formData.append('biography', this.step1.biography);
            let profession = (this.step1.profession == true) ? 1 : 0;
            formData.append('profession', profession);
            
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
                    profession: false
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
</script>