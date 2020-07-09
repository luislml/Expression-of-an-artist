<template>
    <div class="pt-15">
        <v-alert
            dense
            outlined
            color="red lighten-2"
        >
            <div class="text-h6">Eliminar mi cuenta</div>
            <p>Una vez que elimine a su cuenta, no hay vuelta atrás. Por favor, esté seguro</p>

            <v-btn
                @click="dialog = !dialog"
                dark
            >
                Eliminar mi cuenta
            </v-btn>
        </v-alert>

        <!-- Modal -->
        <v-dialog
            v-model="dialog"
            max-width="350"
            overlay-color="blue-grey darken-4"
            overlay-opacity="0.95"
            dark
        >
            <v-card>
                <v-card-title class="headline">¿Seguro que quieres hacer esto?</v-card-title>

                <form @submit.prevent="deleteUser">
                    <v-card-text>
                        <v-alert
                            dense
                            outlined
                            type="error"
                        >
                            <strong>Esto es extremadamente importante.</strong>
                        </v-alert>
                        <p>Al eliminar su cuenta de usuario, se eliminan todos los datos asociados a dicha cuenta.</p>
                        
                        <v-text-field
                            v-model="dataDelete.email"
                            label="Correo electrónico"
                            dense
                            outlined
                            :error-messages="emailErrors"
                            @input="$v.dataDelete.email.$touch()"
                            @blur="$v.dataDelete.email.$touch()"
                        ></v-text-field>

                        <v-text-field
                            v-model="dataDelete.password"
                            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                            :type="show1 ? 'text' : 'password'"
                            label="Contraseña"
                            hint="Confirmar contraseña"
                            counter
                            dense
                            outlined
                            @click:append="show1 = !show1"
                            :error-messages="passwordErrors"
                            @input="$v.dataDelete.password.$touch()"
                            @blur="$v.dataDelete.password.$touch()"
                        ></v-text-field>

                    </v-card-text>

                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn
                            color="cyan darken-4"
                            @click="dialog = !dialog"
                        >
                            Cancelar
                        </v-btn>
                        <v-btn
                            color="deep-orange accent-4"
                            type="submit"
                        >
                            Eliminar
                        </v-btn>
                    </v-card-actions>
                </form>
            </v-card>
        </v-dialog>

    </div>
</template>
<script>
import { required, requiredIf, email } from 'vuelidate/lib/validators'
export default {
    validations: {
        dataDelete: {
            email: { 
                required: requiredIf(function() {
                    return this.dialog
                }),
                email 
            },
            password: {
                required: requiredIf(function() {
                    return this.dialog
                }),
            }
        }
    },
    data() {
        return {
            dialog: false,
            show1: false,
            dataDelete: {
                email: '',
                password: ''
            }
        }
    },
    props: ['user'],
    computed: {
        emailErrors() {
            const errors = []
            if (!this.$v.dataDelete.email.$dirty) return errors
            !this.$v.dataDelete.email.email && errors.push('Debe ser un correo electrónico válido.')
            !this.$v.dataDelete.email.required && errors.push('Correo electrónico es obligatorio.')
            return errors
        },
        passwordErrors() {
            const errors = []
            if (!this.$v.dataDelete.password.$dirty) return errors
            !this.$v.dataDelete.password.required && errors.push('La contraseña es obligatorio.')
            return errors
        },
    },
    methods: {
        deleteUser() {
            this.$v.$touch();
            if (this.$v.$invalid) {
                toastr.warning('Verifique los campos!');
            } else {
                const formData = new FormData();
                formData.append('email', this.dataDelete.email);
                formData.append('password', this.dataDelete.password);

                formData.append('_method', 'DELETE');
                axios.post(`user/${this.user}`, formData)
                .then((response) => {
                    console.log(response);
                    location.href = '/';
                })
                .catch((error) => {
                    console.log(error);
                })
            }
        }
    },
}
</script>