<template>
    <div>
        <div class="stepper">
            <div class="step" :class="[(currentStep <= 3) ? 'active' : '']">
                <a href="javascript:;" @click="goToStep(1)">
                    <span class="stepper-circle">1</span>
                    <span class="stepper-label">Datos generales</span>
                </a>
            </div>
            <div class="step" :class="[(currentStep <= 3 && currentStep >= 2) ? 'active' : '']">
                <a href="javascript:;" @click="goToStep(2)">
                    <span class="stepper-circle">2</span>
                    <span class="stepper-label">Curriculum</span>
                </a>
            </div>
            <div class="step" :class="[(currentStep === 3) ? 'active' : '']">
                <a href="javascript:;" @click="goToStep(3)">
                    <span class="stepper-circle">3</span>
                    <span class="stepper-label">Artista en:</span>
                </a>
            </div>
        </div>

        <form novalidate="novalidate" @submit.prevent="createArtist">
            <!-- Step Datas -->
            <div id="step1" v-if="currentStep === 1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input 
                                class="form-control" 
                                type="date" 
                                autocomplete="off" 
                                placeholder="Fecha de nacimientos"
                                required
                                v-model="step1.birthday"
                            >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input 
                                class="form-control"
                                type="number"
                                autocomplete="off"
                                placeholder="Tel/Cel"
                                required
                                v-model="step1.tel_cel"
                            >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <input
                        class="form-control"
                        type="text"
                        autocomplete="off"
                        placeholder="Ubicación"
                        required
                        v-model="step1.location"
                    >
                </div>

                <div class="form-group">
                    <textarea
                        class="form-control"
                        required
                        rows="3"
                        cols="5"
                        name="txtmessage"
                        placeholder="Biografìa *"
                        v-model="step1.biography"
                    >
                    </textarea>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input
                            type="checkbox"
                            class="custom-control-input"
                            id="profession"
                            v-model="step1.profession"
                        >
                        <label class="custom-control-label" for="profession">Tiene alguna Profesión</label>
                    </div>
                </div>

                <div class="text-right">
                    <button type="button" name="next" class="btn btn-primary" @click="goToStep(2)">
                        Siguiente 
                    </button>
                </div>
            </div>

            <!-- Step curriculum -->
            <div id="step2" v-if="currentStep === 2">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="url" class="custom-control-input" value="url" v-model="step2.type_cv">
                    <label class="custom-control-label" for="url">Url</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="pdf" class="custom-control-input" value="pdf" v-model="step2.type_cv">
                    <label class="custom-control-label" for="pdf">Pdf</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="text" class="custom-control-input" value="text" v-model="step2.type_cv">
                    <label class="custom-control-label" for="text">Text</label>
                </div>

                <!-- url -->
                <div class="form-group" v-if="step2.type_cv === 'url'">
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Url"
                        v-model="step2.curriculum.url"
                    >
                </div>
                <!-- pdf -->
                <div class="form-group" v-if="step2.type_cv === 'pdf'">
                    <input
                        class="form-control"
                        type="file"
                        placeholder="archivo Pdf"
                        accept="application/pdf"
                        @change="processFile($event)"
                    >
                </div>
                <!-- text -->
                <div class="form-group" v-if="step2.type_cv === 'text'">
                    <textarea
                        class="form-control"
                        required
                        rows="3"
                        cols="5"
                        name="txtmessage"
                        placeholder="Currilulum"
                        v-model="step2.curriculum.text"
                    >
                    </textarea>
                </div>

                <div class="text-right">
                    <button type="button" name="next" class="btn btn-primary" @click="goToStep(3)">
                        Siguiente 
                    </button>
                </div>
            </div>

            <!-- Step category -->
            <div id="step3" v-if="currentStep === 3">
                <div class="custom-control custom-checkbox" v-for="(item) in optionsCat" :key="item.id">
                    <input
                        type="checkbox"
                        class="custom-control-input"
                        :id="'cat'+item.id"
                        :value="item.id"
                        v-model="step3.listCat"
                    >
                    <label class="custom-control-label" :for="'cat'+item.id">{{ item.name }}</label>
                </div>

                <div class="text-right">
                    <button type="submit" name="submit" class="btn btn-primary">
                        Postular 
                    </button>
                </div>
            </div>

        </form>
    </div>
</template>
<script>
import toastr from 'toastr'
import axios from 'axios'
export default {
    name: 'FormArtist',
    data() {
        return {
            currentStep: 1,
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
        goToStep(step) {
            this.currentStep = step;
        },
        processFile(event) {
            this.step2.curriculum.pdf = event.target.files[0];
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
                this.currentStep = 1;
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
                $('#modalArtist').modal('hide');
                toastr.success('solicitud fue enviada correctamente');
            })
            .catch((error) => {
                console.log(error);
            })
        }
    }
}
</script>
<style lang="scss">
    .stepper {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
        .step {
            position: relative;
            a {
                padding: 10px;
                font-size: 16px;
                display: inline-block;
                border-radius: 40px;
                .stepper-circle {
                    background: #a81c1c;
                    display: inline-block;
                    text-align: center;
                    vertical-align: middle;
                    padding: 6.5px;
                    width: 35px;
                    font-size: 18px;
                    font-weight: bold;
                    border-radius: 50%;
                }
            }
            &.active {
                a:hover {
                    box-shadow: 0 0 8px 1px #545a5f;
                }
            }
            &:not(:last-child) {
                margin-right: 25px;
                &::after {
                    content: '';
                    position: absolute;
                    width: 25px;
                    height: 2px;
                    background: #a81c1c;
                    top: 50%;
                    transform: translateY(-50%);
                    right: -25px;
                }
            }
            &:not(.active) {
                a {
                    cursor: default;
                    pointer-events: none;
                    opacity: 0.4;
                }
            }
        }
    }
</style>