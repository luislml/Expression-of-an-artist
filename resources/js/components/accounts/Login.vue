<template>
    <div class="form-container form-login d-flex align-items-center">
        <!-- <form method="POST" action=""> -->
        <FormulateForm @submit="login">
            <div class="form-group">
                <FormulateInput
                    type="email"
                    v-model="data.email"
                    label="Correo electrónico"
                    placeholder="Correo electrónico *"
                    validation="required|email"
                />
            </div>

            <div class="form-group">
                <FormulateInput
                    type="password"
                    v-model="data.password"
                    label="Contraseña"
                    placeholder="Contraseña *"
                    validation="required|min:8,length"
                    validation-name="Contraseña"
                />
            </div>

            <div class="form-group">
                <div class="form-check">
                    <FormulateInput
                        type="checkbox"
                        v-model="data.remember"
                        label="Recuérdame"
                    />
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary round">
                    Entrar
                </button>

                <br> &nbsp; <br>
                <a class="link" href="/password/reset">
                    ¿Olvidaste tu contraseña?
                </a>
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
                email: '',
                password: '',
                remember: false
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
        login() {
            const formData = new FormData();
            // Datas User
            formData.append('_token', this.csrf_token);
            formData.append('email', this.data.email);
            formData.append('password', this.data.password);
            formData.append('remember', this.data.remember);

            axios.post('login', formData)
            .then((response) => {
                // console.log(response);
                location.href = '/';
            })
            .catch((error) => {
                console.log(error);
                toastr.error('Estas credenciales no coinciden con nuestros registros.');
            })
        }
    },
}
</script>