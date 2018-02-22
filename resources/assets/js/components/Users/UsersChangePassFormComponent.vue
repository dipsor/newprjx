<template>
    <v-card color="grey lighten-4" flat>
        <v-card-text>
            <v-container fluid>
                <v-layout row>
                    <v-flex xs4>
                        <v-subheader>Staré heslo</v-subheader>
                    </v-flex>
                    <v-flex xs8>
                        <v-text-field
                                v-model="password.old"
                                name="password"
                                label="Staré heslo"
                                hint="Alespoň 6 znaků"
                                min="6"
                                :append-icon="e2 ? 'visibility' : 'visibility_off'"
                                :append-icon-cb="() => (e2 = !e2)"
                                value="wqfasds"
                                class="input-group--focused"
                                :type="e2 ? 'password' : 'text'"
                        ></v-text-field>
                    </v-flex>
                </v-layout>
                <v-layout row>
                    <v-flex xs4>
                        <v-subheader>Nové heslo</v-subheader>
                    </v-flex>
                    <v-flex xs8>
                        <v-text-field
                                v-model="password.newPassword"
                                name="newPassword"
                                label="Nové heslo"
                                hint="Alespoň 6 znaků"
                                min="6"
                                :append-icon="e2 ? 'visibility' : 'visibility_off'"
                                :append-icon-cb="() => (e2 = !e2)"
                                value="wqfasds"
                                class="input-group--focused"
                                :type="e2 ? 'password' : 'text'"
                        ></v-text-field>
                    </v-flex>
                </v-layout>
                <v-layout row>
                    <v-flex xs4>
                        <v-subheader>Nové heslo znovu</v-subheader>
                    </v-flex>
                    <v-flex xs8>
                        <v-text-field
                                v-model="password.newPassword_confirmation"
                                name="newPasswordConfirmation"
                                label="Nové heslo znovu"
                                hint="Alespoň 6 znaků"
                                min="6"
                                :append-icon="e2 ? 'visibility' : 'visibility_off'"
                                :append-icon-cb="() => (e2 = !e2)"
                                value="wqfasds"
                                class="input-group--focused"
                                :type="e2 ? 'password' : 'text'"
                        ></v-text-field>
                    </v-flex>
                </v-layout>
                <v-layout>
                    <v-flex xs-12><v-btn @click="updatePassword" left color="primary">Změnit Heslo</v-btn></v-flex>
                </v-layout>
            </v-container>
        </v-card-text>
    </v-card>
</template>
<script>
    export default {
        data () {
            return {
                e1: false,
                e2: false,
                e3: false,
                e4: false,
                password: {
                    old: '',
                    newPassword: '',
                    newPassword_confirmation: '',
                },
                parsedUser: null,
            }
        },

        props: {
            currentUser: null,
        },

        mounted() {
        },

        methods: {
            updatePassword() {
                this.isLoading = true;

                axios.put(this.$laroute.route('users.api.update.password',{id: this.currentUser.id}), this.password).
                then((response) => {
                    this.eventBus.$emit('password-updated');
                }).catch((error) => {
                    this.isLoading = false;
//                    Materialize.toast(error, 4000);
                    console.log(error);
                });
            },
        }
    }
</script>