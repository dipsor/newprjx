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
                        v-model="password.old"
                        name="password"
                        label="Staré heslo"
                        hint="Alespoň 6 znaků"
                        min="6"
                        :rules="[() => !!password.old || 'Prosím výplňte staré heslo.']"
                        :append-icon="e1 ? 'visibility' : 'visibility_off'"
                        :append-icon-cb="() => (e1 = !e1)"
                        :type="e1 ? 'text' : 'password'"
                        required
                ></v-text-field>
                <v-text-field
                        v-model="password.newPassword"
                        name="newPassword"
                        label="Nové heslo"
                        hint="Alespoň 6 znaků"
                        min="6"
                        :rules="[() => !!password.newPassword || 'Prosím výplňte nové heslo.']"

                        :append-icon="e2 ? 'visibility' : 'visibility_off'"
                        :append-icon-cb="() => (e2 = !e2)"
                        :type="e2 ? 'text' : 'password'"
                        required
                ></v-text-field>
                <v-text-field
                        v-model="password.newPassword_confirmation"
                        name="newPasswordConfirmation"
                        label="Nové heslo znovu"
                        hint="Alespoň 6 znaků"
                        min="6"
                        :rules="[() => !!password.newPassword_confirmation || 'Prosím výplňte nové heslo.']"
                        :append-icon="e3 ? 'visibility' : 'visibility_off'"
                        :append-icon-cb="() => (e3 = !e3)"
                        :type="e3 ? 'text' : 'password'"
                        required
                ></v-text-field>
            </v-card-text>
            <v-divider class="mt-1"></v-divider>
            <v-card-actions>
                <v-btn @click="updatePassword" color="primary">
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
        },

        methods: {
            updatePassword() {
                this.loading = true;

                axios.put(this.$laroute.route('users.api.update.password',{id: this.currentUser.id}), this.password).
                then((response) => {
                    this.eventBus.$emit('password-updated');
                    this.snackbar = true;
                    this.snackBarMessage = 'Uloženo'
                    this.loading = false;
                    //this.resetForm();
                }).catch((error) => {
                    this.loading = false;
                    this.snackBarMessage = 'Vyskytla se chyba pri ukládání'
//                    this.resetForm();
                });
            },

            resetForm(){
                this.password.old = '';
                this.password.newPassword = '';
                this.password.newPassword_confirmation = '';
            },
        }
    }
</script>