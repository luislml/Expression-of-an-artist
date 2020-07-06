<template>
    <div>
        <div v-if="loading" class="text-center py-5 text-danger">
            <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
        </div>
        <!-- <form v-else @submit.prevent="updateUser"> -->
        <FormulateForm v-else @submit="updateUser">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile">
                        <img :src="previewImg" class="img-fluid">
                        <a href="javascript:;" class="btn-picture" @click="openInputFile">
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </a>
                        <input type="file" @change="uploadImage" class="d-none" ref="fileInput" accept="image/png, image/jpeg">
                    </div>
                </div>
                <div class="col-md-8">
                    
                    <h5>Datos generales</h5>
                    <hr class="bg-danger">
                    
                    <div class="form-group">
                        <FormulateInput
                            type="text"
                            label="Nombre"
                            placeholder="Nombre *"
                            validation="required"
                            v-model="userData.name"
                        />
                    </div>

                    <div class="form-group">
                        <FormulateInput
                            type="email"
                            label="Correo electrónico"
                            placeholder="Correo electrónico *"
                            validation="required|email"
                            v-model="userData.email"
                        />
                    </div>

                    <!-- account artist -->
                    <div v-if="role === '2'">
                        <div class="form-group">
                            <FormulateInput
                                type="date"
                                label="Fecha de nacimiento"
                                placeholder="Fecha de nacimiento *"
                                validation="required"
                                v-model="artistData.birthday"
                            />
                        </div>

                        <div class="form-group">
                            <FormulateInput
                                type="tel"
                                label="Tel/Cel"
                                placeholder="Tel/Cel *"
                                validation="required|number"
                                v-model="artistData.tel_cel"
                            />
                        </div>

                        <div class="form-group">
                            <FormulateInput
                                type="text"
                                label="Ubicacion"
                                placeholder="Ubicacion *"
                                validation="required"
                                v-model="artistData.location"
                            />
                        </div>

                        <div class="form-group">
                            <FormulateInput
                                type="textarea"
                                label="Biografìa"
                                placeholder="Biografìa"
                                validation="required"
                                rows="3"
                                v-model="artistData.biography"
                            />
                        </div>

                        <h5>Curriculum</h5>
                        <hr class="bg-danger">
                        <FormulateInput
                            :options="{url: 'Url', pdf: 'Pdf', text: 'Text'}"
                            type="radio"
                            label="Tipo de curriculum"
                            v-model="artistData.cv.type_cv"
                        />

                        <!-- url -->
                        <div class="form-group" v-if="artistData.cv.type_cv === 'url'">
                            <FormulateInput
                                type="text"
                                label="Url del sitio"
                                placeholder="Url *"
                                validation="required"
                                v-model="artistData.cv.curriculum.url"
                            />
                        </div>
                        <!-- pdf -->
                        <div class="form-group" v-show="artistData.cv.type_cv === 'pdf'">
                            <!-- <input
                                class="form-control"
                                type="file"
                                placeholder="archivo Pdf"
                                accept="application/pdf"
                                @change="processFile($event)"
                            > -->
                            <FormulateInput
                                type="file"
                                help="Seleccione un archivo PDF para cargar"
                                validation="mime:application/pdf"
                                validation-name="Curriculum"
                                :uploader="uploadFile"
                            />
                            <a v-if="typeof artistData.cv.curriculum.pdf == 'string'" :href="'upload/cvs/' + artistData.cv.curriculum.pdf" target="blank" class="btn bg-info">Ver curriculum</a>
                            <!-- <div class="py-4" v-if="artistData.cv.curriculum.pdf != null">
                                <iframe :src="'upload/cvs/' + artistData.cv.curriculum.pdf" width="100%" height="250px"></iframe>
                            </div> -->
                        </div>
                        <!-- text -->
                        <div class="form-group" v-if="artistData.cv.type_cv === 'text'">
                            <FormulateInput
                                type="textarea"
                                label="Currilulum"
                                placeholder="Currilulum *"
                                validation="required"
                                rows="3"
                                v-model="artistData.cv.curriculum.text"
                            />
                        </div>

                        <h5>Habilidades</h5>
                        <hr class="bg-danger">
                        <div class="form-group">
                            <FormulateInput
                                :options="optionsCat"
                                type="checkbox"
                                validation="required"
                                validation-name="Tipo de arte"
                                v-model="artistData.categories"
                            />
                        </div>
                    </div>
                    <!-- end artist -->

                    <h5>Cambiar contraseña</h5>
                    <hr class="bg-danger">

                    <div class="form-group">
                        <FormulateInput
                            type="password"
                            label="Contraseña"
                            placeholder="Contraseña *"
                            :validation="(dataPassword.currentpass !== '') ? 'min:8,length' : 'min:0,length'"
                            validation-name="Contraseña"
                            v-model="dataPassword.currentpass"
                        />
                    </div>
                    <!--  -->

                    <div class="form-group">
                        <FormulateInput
                            type="password"
                            label="Nueva contraseña"
                            placeholder="Nueva contraseña"
                            :validation="(dataPassword.newPass !== '' || dataPassword.currentpass !== '') ? 'required|min:8,length|matches:/[0-9]/' : 'min:0,length'"
                            validation-name="Nueva contraseña"
                            :validation-messages="{
                                matches: 'Las contraseñas requieren al menos un número.'
                            }"
                            v-model="dataPassword.newPass"
                        />
                    </div>
                    <!--  -->

                    <div class="text-right">
                        <button type="submit" name="submit" class="btn btn-primary">
                            Actualizar
                        </button>
                    </div>
                    
                </div>
            </div>
        </FormulateForm>
        <!-- </form> -->
       
        <div class="pt-4">
            <delete-account :user="this.user"></delete-account>
        </div>

    </div>
</template>
<script>

export default {
    data() {
        return {
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
            this.artistData.cv.curriculum.pdf = event.target.files[0];
        },
        uploadFile (file, progress, error, option) {
            console.log(file);
            this.artistData.cv.curriculum.pdf = file;
            progress(100)
            return Promise.resolve({})
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
                var i = -1;
                response.data.forEach(element => {
                    this.optionsCat[i += 1] = {value: element.id, label: element.name, id: 'c'+element.id};
                });
                // this.optionsCat = response.data;
            })
            .catch((error) => {
                console.log(error);
            })
        },
        updateUser() {
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