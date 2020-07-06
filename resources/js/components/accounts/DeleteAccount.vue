<template>
    <div>
        <h5>Borrar cuenta</h5>
        <p>Una vez que elimine su cuenta, no hay vuelta atrás. Por favor, esté seguro</p>
        <hr class="bg-danger">
        <button type="button" class="btn border border-danger" data-toggle="modal" data-target="#exampleModalCenter">Eliminar tu cuenta</button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content text-dark">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">¿Seguro que quieres hacer esto?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- <form @submit.prevent="deleteUser"> -->
                    <FormulateForm @submit="deleteUser">
                        <div class="modal-body">
                            <div class="alert alert-danger" role="alert">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                Esto es extremadamente importante.
                            </div>
                            <p>Al eliminar su cuenta de usuario, se eliminan todos los datos asociados a dicha cuenta.</p>
                            
                                <div class="form-group">
                                    <FormulateInput
                                        type="email"
                                        label="Correo electrónico"
                                        placeholder="Correo electrónico *"
                                        validation="required|email"
                                        v-model="dataDelete.email"
                                    />
                                </div>
                                <div class="form-group">
                                    <FormulateInput
                                        type="password"
                                        label="Contraseña"
                                        placeholder="Confirmar contraseña *"
                                        validation="required|min:8,length"
                                        validation-name="Contraseña"
                                        v-model="dataDelete.password"
                                    />
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Eliminar esta cuenta</button>
                        </div>
                    </FormulateForm>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            dataDelete: {
                email: '',
                password: ''
            }
        }
    },
    props: ['user'],
    methods: {
        deleteUser() {
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
    },
}
</script>