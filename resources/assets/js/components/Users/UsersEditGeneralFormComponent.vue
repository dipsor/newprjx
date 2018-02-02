<template>
    <div>
        <v-snackbar
                :timeout="4000"
                :top="y === 'top'"
                :right="x === 'right'"
                v-model="snackbar"
        >
            error
            <v-btn flat color="pink" @click.native="snackbar = false">Close</v-btn>
        </v-snackbar>
        <v-form v-model="valid">
            <v-flex>
                <v-text-field
                        label="Jméno"
                        v-model="user.name"
                        :rules="nameRules"
                        required
                ></v-text-field>
                <v-text-field
                        label="E-mail"
                        v-model="user.email"
                        :rules="emailRules"
                        required
                ></v-text-field>
            </v-flex>

            <v-flex xs-12><v-btn color="primary" @click.stop="updateUser">Odeslat</v-btn></v-flex>

        </v-form>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                valid: false,
                name: '',
                nameRules: [
                    (v) => !!v || 'Prosím vyplnte jméno.',
                ],
                email: '',
                emailRules: [
                    (v) => !!v || 'Prosím vyplnte E-mail.',
                    (v) => /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail musi byt validní.'
                ],
                user: {
                    name: '',
                    email: ''
                },
                password: {
                    old: '',
                    newPassword: '',
                    newPassword_confirmation: '',
                },
                snackbar: false,
                y: 'top',
                x: 'right',
            }
        },

        props: {
            currentUser: null,
        },

        mounted() {
          this.getUserData();
        },

        methods: {
            getUserData() {
                axios.get(this.$laroute.route('users.api.show', {id: this.currentUser.id})).then((response) => {
                    this.user.name = response.data.name;
                    this.user.email = response.data.email;
                }).catch((error) => {
                    console.log(error);
                });
            },

            updateUser() {
                this.isLoading = true;

                axios.put(this.$laroute.route('users.api.update.general.info', {id: this.currentUser.id}), this.user).then((response) => {
                    this.eventBus.$emit('user-info-updated', this.user.name);
                    this.snackbar = true;

                }).catch((error) => {
                    this.isLoading = false;
                    this.snackbar = true;
                    console.log(error);
                });
            },

            updatePassword() {
                this.isLoading = true;

                axios.put(this.$laroute.route('users.api.update.password', {id: this.currentUser.id}), this.password).then((response) => {
                    this.eventBus.$emit('password-updated');
                }).catch((error) => {
                    this.isLoading = false;
                    Materialize.toast(error, 4000);

                    console.log(error);
                });
            }
        }
    }
</script>