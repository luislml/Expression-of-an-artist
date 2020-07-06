<template>
    <div class="form-container form-register d-flex align-items-center">
        <!-- <form method="POST" action="{{ route('register') }}"> -->
        <FormulateForm @submit="register">
            <div class="form-group">
                <FormulateInput
                    type="text"
                    label="Nombre"
                    placeholder="Nombre *"
                    validation="required"
                    v-model="data.name"
                />
            </div>

            <div class="form-group">
                <FormulateInput
                    type="email"
                    label="Correo electrónico"
                    placeholder="Correo electrónico *"
                    validation="required|email"
                    v-model="data.email"
                />
            </div>

            <div class="form-group">
                <FormulateInput
                    label="Contraseña"
                    type="password"
                    name="password"
                    placeholder="Contraseña *"
                    validation="required"
                    v-model="data.password"
                />
            </div>

            <div class="form-group mb-4">
                <FormulateInput
                    label="Confirmar contraseña"
                    type="password"
                    name="password_confirm"
                    placeholder="Confirmar contraseña *"
                    validation="required|confirm"
                    validation-name="Confirmar contraseña"
                    v-model="data.password_confirmation"
                />
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary round">
                    Registrarse
                </button>
            </div>
        </FormulateForm>
        <!-- </form> -->
    </div>
</template>
<script>
export default {
    data() {
        return {
            data: {
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
            }
        }
    },
    computed: {
        csrf_token() {
            let token = document.head.querySelector('meta[name="csrf-token"]')
            return token.content
        }
    },
    methods: {
        register() {
            const formData = new FormData();
            // Datas User
            formData.append('_token', this.csrf_token);
            formData.append('name', this.data.name);
            formData.append('email', this.data.email);
            formData.append('password', this.data.password);
            formData.append('password_confirmation', this.data.password_confirmation);

            axios.post('register', formData)
            .then( (response) => {
                // console.log(response);
                location.href = '/';
            })
            .catch( (error) => {
                console.log(error);
                toastr.error('El correo electrónico ya ha sido registrado.');
            })
        }
    },
}
</script>