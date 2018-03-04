<template>
    <div>
        <v-snackbar
                :timeout="4000"
                :top="y === 'top'"
                :right="x === 'right'"
                v-model="snackbar"
        >
            {{snackBarMessage}}
            <v-btn flat color="pink" @click.native="snackbar = false">Zavřít</v-btn>
        </v-snackbar>
        <v-card>
            <v-card-text>
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
            </v-card-text>
            <v-divider class="mt-1"></v-divider>
            <v-card-actions>
                <v-btn color="primary" @click.stop="updateUser">
                    Uložit &nbsp<v-progress-circular v-show="loading" indeterminate color="white"></v-progress-circular>
                </v-btn>
            </v-card-actions>
        </v-card>
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
                snackBarMessage: '',
                loading: false,
            }
        },

        props: {
            currentUser: null,
        },

        mounted() {
          this.getUserData();
            this.eventBus.$on('user-info-updated', () => {
                this.getUserData();
            });

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
                this.loading = true;
                axios.put(this.$laroute.route('users.api.update.general.info', {id: this.currentUser.id}), this.user).then((response) => {
                    this.eventBus.$emit('user-info-updated', this.user.name);
                    this.snackbar = true;
                    this.snackBarMessage = 'Uloženo'
                    this.loading = false;
                }).catch((error) => {
                    this.snackbar = true;
                    this.snackBarMessage = 'Vyskytla se chyba pri ukládání'
                    this.loading = false;
                });
            },
        }
    }
</script>