<template>
    <div>
        <div v-if="loading" class="text-center py-5 text-danger">
            <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
        </div>
        <form v-else @submit.prevent="updateUser">
        <!-- <FormulateForm v-else @submit="updateUser"> -->
            <v-row>
                <v-col cols="12" sm="4">
                    <div style="position: relative; background: #263238">
                        <v-img
                            :src="previewImg"
                            gradient="to top right, rgba(38, 50, 56, .7), rgba(38, 50, 56, .5), rgba(38, 50, 56, 0)"
                        ></v-img>
                        <v-btn
                            absolute
                            dark
                            fab
                            bottom
                            right
                            color="red darken-3"
                            @click="openInputFile"
                        >
                            <v-icon>mdi-camera</v-icon>
                        </v-btn>
                        <input type="file" @change="uploadImage" class="d-none" ref="fileInput" accept="image/png, image/jpeg">
                    </div>
                </v-col>

                <v-col cols="12" sm="8">
                    <div class="text-h5">Datos generales</div>
                    <v-divider class="mb-4"></v-divider>

                    <v-text-field
                        v-model="userData.name"
                        label="Nombre"
                        dense
                        outlined
                        :error-messages="nameErrors"
                        @input="$v.userData.name.$touch()"
                        @blur="$v.userData.name.$touch()"
                    ></v-text-field>

                    <v-text-field
                        v-model="userData.email"
                        label="Correo electrónico"
                        dense
                        outlined
                        :error-messages="emailErrors"
                        @input="$v.userData.email.$touch()"
                        @blur="$v.userData.email.$touch()"
                    ></v-text-field>

                    <!-- account artist -->
                    <div v-if="role === '2'">
                        <v-menu
                            ref="nowMenu"
                            v-model="nowMenu"
                            :close-on-content-click="false"
                            :nudge-right="40"
                            :return-value.sync="artistData.birthday"
                            transition="scale-transition"
                            min-width="290px"
                            offset-y
                        >
                            <template v-slot:activator="{ on, attrs }">
                                <v-text-field
                                    v-model="artistData.birthday"
                                    label="Fecha de nacimiento"
                                    dense
                                    readonly
                                    outlined
                                    v-bind="attrs"
                                    v-on="on"
                                    :error-messages="birthdayErrors"
                                    @input="$v.artistData.birthday.$touch()"
                                    @blur="$v.artistData.birthday.$touch()"
                                ></v-text-field>
                            </template>
                            <v-date-picker
                                v-model="artistData.birthday"
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
                                    @click="$refs.nowMenu.save(artistData.birthday)"
                                >
                                    OK
                                </v-btn>
                            </v-date-picker>
                        </v-menu>

                        <v-text-field
                            v-model="artistData.tel_cel"
                            label="Tel/cel"
                            dense
                            outlined
                            :error-messages="tel_celErrors"
                            @input="$v.artistData.tel_cel.$touch()"
                            @blur="$v.artistData.tel_cel.$touch()"
                        ></v-text-field>

                        <v-text-field
                            v-model="artistData.location"
                            label="Ubicación"
                            dense
                            outlined
                            :error-messages="locationErrors"
                            @input="$v.artistData.location.$touch()"
                            @blur="$v.artistData.location.$touch()"
                        ></v-text-field>

                        <v-textarea
                            v-model="artistData.biography"
                            outlined
                            dense
                            rows="3"
                            label="Biografía"
                            :error-messages="biographyErrors"
                            @input="$v.artistData.biography.$touch()"
                            @blur="$v.artistData.biography.$touch()"
                        ></v-textarea>

                        <div class="text-h5">Curriculum</div>
                        <v-divider class="mb-4"></v-divider>

                        <v-radio-group
                            row
                            v-model="artistData.cv.type_cv"
                        >
                            <v-radio
                                label="Url"
                                value="url"
                                color="red darken-3"
                            ></v-radio>
                            <v-radio
                                label="Pdf"
                                value="pdf"
                                color="red darken-3"
                            ></v-radio>
                            <v-radio
                                label="Text"
                                value="text"
                                color="red darken-3"
                            ></v-radio>
                        </v-radio-group>

                        <!-- url -->
                        <div v-if="artistData.cv.type_cv === 'url'">
                            <v-text-field
                                v-model="artistData.cv.curriculum.url"
                                label="Url del sitio"
                                dense
                                outlined
                                :error-messages="urlErrors"
                                @input="$v.artistData.cv.curriculum.url.$touch()"
                                @blur="$v.artistData.cv.curriculum.url.$touch()"
                            ></v-text-field>
                        </div>
                        <!-- pdf -->
                        <div v-if="artistData.cv.type_cv === 'pdf'">
                            <v-btn
                                v-if="typeof artistData.cv.curriculum.pdf == 'string'"
                                :href="'upload/cvs/' + artistData.cv.curriculum.pdf"
                                target="blank"
                                small
                                color="green white--text"
                                class="mb-4"
                            >
                                Ver archivo
                                <v-icon medium>mdi-file-pdf</v-icon>
                            </v-btn>

                            <v-file-input 
                                label="Archivo Pdf"
                                outlined
                                dense
                                accept="application/pdf"
                                @change="processFile"
                                :error-messages="pdfErrors"
                                @input="$v.artistData.cv.curriculum.pdf.$touch()"
                                @blur="$v.artistData.cv.curriculum.pdf.$touch()"
                            >
                            </v-file-input>
                        </div>
                        <!-- text -->
                        <div v-if="artistData.cv.type_cv === 'text'">
                            <v-textarea
                                v-model="artistData.cv.curriculum.text"
                                outlined
                                dense
                                label="Currilulum"
                                :error-messages="textErrors"
                                @input="$v.artistData.cv.curriculum.text.$touch()"
                                @blur="$v.artistData.cv.curriculum.text.$touch()"
                            ></v-textarea>
                        </div>
                        
                        <div class="text-h5">Habilidades</div>
                        <v-divider class="mb-4"></v-divider>

                        <v-select
                            :items="optionsCat"
                            item-text="name"
                            item-value="id"
                            label="Artista en:"
                            outlined
                            multiple
                            chips
                            v-model="artistData.categories"
                            :error-messages="categoriesErrors"
                            @input="$v.artistData.categories.$touch()"
                            @blur="$v.artistData.categories.$touch()"
                        ></v-select>
                    </div>
                    <!-- end artist -->

                    <div class="text-h5">Cambiar contraseña</div>
                    <v-divider class="mb-4"></v-divider>

                    <v-text-field
                        v-model="dataPassword.currentpass"
                        :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                        :type="show1 ? 'text' : 'password'"
                        label="Contraseña"
                        hint="Contraseña actual"
                        counter
                        dense
                        outlined
                        @click:append="show1 = !show1"
                    ></v-text-field>

                    <v-text-field
                        v-model="dataPassword.newPass"
                        :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                        :type="show2 ? 'text' : 'password'"
                        label="Nueva contraseña"
                        hint="Nueva contraseña, min 8 caracteres"
                        counter
                        dense
                        outlined
                        @click:append="show2 = !show2"
                        :error-messages="passwordErrors"
                        @input="$v.dataPassword.newPass.$touch()"
                        @blur="$v.dataPassword.newPass.$touch()"
                    ></v-text-field>
                    <!--  -->

                    <div class="text-right">
                        <v-btn
                            color="red darken-3 white--text"
                            type="submit"
                        >
                            Actualizar
                        </v-btn>
                    </div>
                </v-col>
            </v-row>
        <!-- </FormulateForm> -->
        </form>
       
        <div class="mt-10">
            <delete-account :user="this.user"></delete-account>
        </div>

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
        userData: {
            name: { required },
            email: { required, email },
        },
        dataPassword: {
            newPass: { 
                required: requiredIf(function() {
                    return (this.dataPassword.currentpass !== '') ? true : false
                }),
                minLength: minLength(8)
            }
        },
        artistData: {
            biography: { required },
            birthday: { 
                required,
                isDate (value) {
                    return isDate2(value);
                }
            },
            location: { required },
            tel_cel: { required, numeric },
            cv: {
                curriculum: {
                    url: {
                        required: requiredIf(function() {
                            return (this.artistData.cv.type_cv === 'url') ? true : false
                        })
                    },
                    pdf: {
                        required: requiredIf(function() {
                            return (this.artistData.cv.type_cv === 'pdf') ? true : false
                        })
                    },
                    text: {
                        required: requiredIf(function() {
                            return (this.artistData.cv.type_cv === 'text') ? true : false
                        })
                    },
                }
            },
            categories: { required },
        }
    },
    data() {
        return {
            show1: false,
            show2: false,
            nowMenu: false,
            
            loading: true,
            optionsCat: [],
            previewImg: '',
            userData: {
                avatar: null,
                email: '',
                name: ''
            },
            dataPassword: {
                currentpass: '',
                newPass: ''
            },
            artistData: {
                biography: '',
                birthday: '',
                location: '',
                tel_cel: '',
                cv: {
                    type_cv: '',
                    curriculum: {
                        url: null,
                        pdf: null,
                        text: null
                    }
                },
                categories: []
            }
        }
    },
    props: ['user', 'role'],
    computed: {
        nameErrors() {
            const errors = []
            if (!this.$v.userData.name.$dirty) return errors
            !this.$v.userData.name.required && errors.push('Nombre es obligatorio.')
            return errors
        },
        emailErrors() {
            const errors = []
            if (!this.$v.userData.email.$dirty) return errors
            !this.$v.userData.email.email && errors.push('Debe ser un correo electrónico válido.')
            !this.$v.userData.email.required && errors.push('Correo electrónico es obligatorio.')
            return errors
        },
        passwordErrors() {
            const errors = []
            if (!this.$v.dataPassword.newPass.$dirty) return errors
            !this.$v.dataPassword.newPass.minLength && errors.push('Minimo 8 caracteres.')
            !this.$v.dataPassword.newPass.required && errors.push('La nueva contraseña es obligatorio.')
            return errors
        },
        biographyErrors() {
            const errors = []
            if (!this.$v.artistData.biography.$dirty) return errors
            !this.$v.artistData.biography.required && errors.push('Una biografía es obligatorio.')
            return errors
        },
        birthdayErrors() {
            const errors = []
            if (!this.$v.artistData.birthday.$dirty) return errors
            !this.$v.artistData.birthday.required && errors.push('La fecha de nacimiento es obligatorio.')
            !this.$v.artistData.birthday.isDate && errors.push('Formato de la fecha invalido.')
            return errors
        },
        locationErrors() {
            const errors = []
            if (!this.$v.artistData.location.$dirty) return errors
            !this.$v.artistData.location.required && errors.push('La ubicación es obligatorio.')
            return errors
        },
        tel_celErrors() {
            const errors = []
            if (!this.$v.artistData.tel_cel.$dirty) return errors
            !this.$v.artistData.tel_cel.required && errors.push('Número de Tel/Cel es obligatorio.')
            !this.$v.artistData.tel_cel.numeric && errors.push('Número de Tel/Cel no valido.')
            return errors
        },
        urlErrors() {
            const errors = []
            if (!this.$v.artistData.cv.curriculum.url.$dirty) return errors
            !this.$v.artistData.cv.curriculum.url.required && errors.push('Url es obligatorio.')
            return errors
        },    
        pdfErrors() {
            const errors = []
            if (!this.$v.artistData.cv.curriculum.pdf.$dirty) return errors
            !this.$v.artistData.cv.curriculum.pdf.required && errors.push('Pdf es obligatorio.')
            return errors
        },
        textErrors() {
            const errors = []
            if (!this.$v.artistData.cv.curriculum.text.$dirty) return errors
            !this.$v.artistData.cv.curriculum.text.required && errors.push('Llenar el campo es obligatorio.')
            return errors
        },
        categoriesErrors() {
            const errors = []
            if (!this.$v.artistData.categories.$dirty) return errors
            !this.$v.artistData.categories.required && errors.push('Seleccione al menos una habilidad.')
            return errors
        }
    },
    mounted() {
        if (localStorage.getItem('notification')) {
            var dataNot = JSON.parse(localStorage.getItem('notification'));
            dataNot.forEach(element => {
                if (element.state == 'success') {
                    toastr.success(element.msg);
                }
                else {
                    toastr.error(element.msg);
                }
            });
            localStorage.removeItem('notification');
        }
    },
    created() {
        if (this.role === '2') {
            this.getCategories();
        }
        this.dataUser();
    },
    methods: {
        openInputFile() {
            this.$refs.fileInput.click();
        },
        uploadImage(event) {
            const file = event.target.files[0];
            // console.log(file);
            this.previewImg = URL.createObjectURL(file);
            this.userData.avatar = file;
        },
        processFile(event) {
            // this.artistData.cv.curriculum.pdf = event.target.files[0];
            this.artistData.cv.curriculum.pdf = event;
        },
        dataUser() {
            axios.get(`user/${this.user}/edit`)
            .then((response) => {
                this.loading = false;
                /* user */
                this.previewImg = 'images/avatars/' + response.data.user.avatar;
                this.userData.email = response.data.user.email;
                this.userData.name = response.data.user.name;
                
                /* artist */
                if (response.data.artist !== '') {
                    this.artistData.biography = response.data.artist.biography;                        
                    this.artistData.birthday = response.data.artist.birthday;                    
                    this.artistData.location = response.data.artist.location;                    
                    this.artistData.tel_cel = response.data.artist.tel_cel;                    
                    this.artistData.cv.type_cv = response.data.artist.cvs[0].type_cv;
                    switch (response.data.artist.cvs[0].type_cv) {
                        case 'url':
                            this.artistData.cv.curriculum.url = response.data.artist.cvs[0].curriculum;
                            break;
                        case 'text':
                            this.artistData.cv.curriculum.text = response.data.artist.cvs[0].curriculum;
                            break;
                        default:
                            this.artistData.cv.curriculum.pdf = response.data.artist.cvs[0].curriculum;
                            break;
                    }
                    response.data.artist.categories.forEach(element => {
                        this.artistData.categories.push(element.id);                      
                    });           
                }
            })
            .catch((error) => {
                console.log(error);
            })
        },
        getCategories() {
            axios.get('/category')
            .then((response) => {
                /* var i = -1;
                response.data.forEach(element => {
                    this.optionsCat[i += 1] = {value: element.id, label: element.name, id: 'c'+element.id};
                }); */
                this.optionsCat = response.data;
            })
            .catch((error) => {
                console.log(error);
            })
        },
        updateUser() {
            if (this.role === 2) {
                this.$v.$touch();
                if (this.$v.$invalid) {
                    toastr.warning('Verifique los campos!');
                } else {
                    this.update();
                }
            } else {
                this.$v.$touch();
                if (this.$v.userData.$invalid || this.$v.dataPassword.$invalid) {
                    toastr.warning('Verifique los campos!');
                } else {
                    this.update();
                }
            }
        },
        update() {
            const formData = new FormData();
            // Datas User
            formData.append('avatar', this.userData.avatar);
            formData.append('email', this.userData.email);
            formData.append('name', this.userData.name);

            // Update password
            formData.append('currentpass', this.dataPassword.currentpass);
            formData.append('newpassword', this.dataPassword.newPass);

            // Datas Artists
            formData.append('birthday', this.artistData.birthday);
            formData.append('tel_cel', this.artistData.tel_cel);
            formData.append('location', this.artistData.location);
            formData.append('biography', this.artistData.biography);
            formData.append('type_cv', this.artistData.cv.type_cv);
            switch (this.artistData.cv.type_cv) {
                case 'url':
                    formData.append('curriculum', this.artistData.cv.curriculum.url);
                    break;
                case 'pdf':
                    formData.append('curriculum', this.artistData.cv.curriculum.pdf);
                    break;
                default:
                    formData.append('curriculum', this.artistData.cv.curriculum.text);
                    break;
            }
            formData.append('listCat', this.artistData.categories);

            formData.append('_method', 'PUT');
            axios.post(`user/${this.user}`, formData)
            .then((response) => {
                /* response.data.forEach(element => {
                    if (element.state == 'success') {
                        toastr.success(element.msg);
                    }
                    else {
                        toastr.error(element.msg);
                    }
                }); */
                localStorage.setItem('notification', JSON.stringify(response.data));
                location.reload();
            })
            .catch((error) => {
                console.log(error);
            })
        }
    },
}
</script>