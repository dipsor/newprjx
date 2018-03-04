<template>
    <div>

    <v-btn
            class="primary mt-5"
            dark
            large
            @click.stop="myDialog = !myDialog"
    >
        Začít
    </v-btn>
    <v-dialog v-model="myDialog" width="500px">
            <v-layout row wrap>
                <v-flex xs12>
                    <v-card>
                        <v-toolbar color="primary" dark>
                            <v-toolbar-title>
                                <span class="group pa-2">
                                <v-icon>lock_outline</v-icon>
                              </span>
                                Přihlásit se</v-toolbar-title>
                        </v-toolbar>
                        <v-card-text>
                            <v-flex xs12 v-if="errors">
                                <v-alert color="error" icon="warning" value="true">
                                    <li v-for="error in errors">{{error[0]}}</li>
                                </v-alert>
                            </v-flex>
                            <v-text-field
                                    label="E-mail "
                                    class="mt-2"
                                    v-model="email"
                                    :rules="nameRules"
                                    required
                                    prepend-icon="account_box"
                            ></v-text-field>
                            <v-text-field
                                    label="Heslo"
                                    hint="This field is not required"
                                    v-model="password"
                                    :rules="passRules"
                                    prepend-icon="lock"
                                    required
                                    type="password"
                            ></v-text-field>
                            <v-flex>
                                <v-checkbox label="Zapamatovat si" v-model="remember" value="1"></v-checkbox>
                            </v-flex>
                            <v-btn block color="primary" @click="login">Přihlásit<v-progress-circular v-if="animateLogin" indeterminate color="purple"></v-progress-circular></v-btn>
                                <v-layout row wrap>
                                    <v-flex class="pr-1" xs6><v-btn @click="googleLogin" dark block color="black">Google</v-btn></v-flex>
                                    <v-flex class="pl-1" xs6><v-btn @click="facebookLogin" dark block color="blue darken-4">Facebook</v-btn></v-flex>
                                </v-layout>
                        </v-card-text>
                    </v-card>
                </v-flex>
            </v-layout>
    </v-dialog>
</div>
</template>
<script>
    export default {
        data: () => ({
            myDialog: false,
            select: null,
            items: [
                { name: 'Sandra Adams', group: 'Group 1', price: 13 },
                { name: 'Miroslav', group: 'Group 1', price: 25 }
            ],

            selectItems: null,
            business: null,
            email: null,
            password: null,
            remember: null,
            nameRules: [
                (v) => !!v || 'Prosím zadejte E-mail',
            ],
            passRules: [
                (v) => !!v || 'Prosím zadejte heslo',
            ],
            parsedUser: null,
            csrfToken: document.head.querySelector('meta[name="csrf-token"]').content,
            csrfHeader: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            },
            errors: null,
            animateLogin: false,
        }),

        props: {
            currentUser: null
        },

        mounted() {
            this.parsedUser = this.currentUser != null ? this.currentUser : null;
            console.log(this.currentUser);
            this.eventBus.$on('open-login-dialog', function() {
                console.log('open login');
                this.myDialog = true;
            }.bind(this));
        },

        methods: {
            login() {
                this.animateLogin = true;

                axios.post('/login', {'email': this.email, 'password': this.password})
                    .then((response) =>{
                        this.animateLogin = false;
                        window.location.href = this.$laroute.route('home');
                    }).catch( error => {
                    this.animateLogin = false;
                        this.errors = error.response.data.errors;
                        console.log(error.response.data.errors);
                });
            },

            googleLogin() {
                window.location.href = this.$laroute.route('google.login');
            },
            facebookLogin() {
                window.location.href = this.$laroute.route('facebook.login');
            }
        },

    }
</script>
