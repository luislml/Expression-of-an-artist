<template>
    <div>
        <v-btn class="mx-2" dark color="red darken-3" rounded @click="userOption = !userOption">
            Artista
            <v-icon medium>mdi-palette</v-icon>
        </v-btn>

        <v-dialog
            v-model="userOption"
            max-width="350"
            overlay-color="blue-grey darken-4"
            overlay-opacity="0.8"
        >
            <v-card class="pb-3">
                <v-card-title class="headline">¿Eres un artista?</v-card-title>
                <v-card-text>Eres un artista y quieres publicar tus obras de arte para que todo el mundo lo vea.</v-card-text>
                <v-card-actions class="justify-center">
                    <v-btn tile outlined color="success" @click="openDialog('arts')">
                        Postulate <v-icon left>mdi-palette</v-icon>
                    </v-btn>
                </v-card-actions>

                <v-card-title class="headline">¿Administras una escuela de arte?</v-card-title>
                <v-card-text>Eres el director de una escuela de arte o simplemente tienes a cargo un grupo de artistas.</v-card-text>
                <v-card-actions class="justify-center">
                    <v-btn tile outlined color="success" @click="openDialog('school')">
                        Postulate <v-icon left>mdi-bus-school</v-icon>
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

        <!-- Dialog Option user -->
        <v-dialog
            v-model="mainDialog"
            max-width="500"
            overlay-color="blue-grey darken-4"
            overlay-opacity="0.8"
        >
            <v-card>
                <form-artist v-if="tmpOption" @close-dialog="mainDialog = $event"></form-artist>
                <form-school v-else @close-dialog="mainDialog = $event"></form-school>
            </v-card>
        </v-dialog>
    </div>
</template>
<script>
export default {
    data() {
        return {
            userOption: false,
            mainDialog: false,
            tmpOption: true
        }
    },
    methods: {
        openDialog(tmp) {
            this.userOption = !this.userOption;
            this.mainDialog = !this.mainDialog;
            if (tmp === 'arts') {
                this.tmpOption = true;
            } else {
                this.tmpOption = false;
            }
        }
    },
}
</script>