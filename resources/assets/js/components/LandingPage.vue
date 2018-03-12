<template>
    <v-app light>
        <v-toolbar class="white">
            <v-toolbar-title>
                <a href="/">
                    <img src="/img/alfatisk-logo.png">
                </a>
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <div v-if="isUserLoggedIn">
                <!--<v-toolbar-side-icon class="hidden-xs-and-up"></v-toolbar-side-icon>-->
                <v-menu bottom left class="hidden-sm-and-up">
                    <v-btn icon slot="activator" light>
                        <v-icon>more_vert</v-icon>
                    </v-btn>
                    <v-list>
                        <v-list-tile @click="profile">
                            <v-list-tile-title>{{parsedUser.name}}</v-list-tile-title>
                        </v-list-tile>
                        <v-list-tile @click="logout">
                            <v-list-tile-title>Odhlásit</v-list-tile-title>
                        </v-list-tile>
                    </v-list>
                </v-menu>
                <v-toolbar-items class="main-menu-logged-in">
                    <v-btn @click="profile" flat>{{parsedUser.name}}</v-btn>
                    <v-btn @click="logout" flat>Odhlásit</v-btn>
                </v-toolbar-items>
            </div>

            <div v-else>
                <!--<v-toolbar-side-icon class="hidden-md-and-up"></v-toolbar-side-icon>-->
                <v-toolbar-items>
                    <v-btn @click.stop="login" flat>Přihlásit</v-btn>
                </v-toolbar-items>
            </div>
        </v-toolbar>
        <v-content>
            <section>
                <v-parallax src="/img/bak.jpg" height="500">
                    <v-layout
                            column
                            align-center
                            justify-center
                            class="white--text"
                    >
                        <h1 class="white--text mb-2 display-3 text-xs-center">Tvorba Bakalářek</h1>
                        <div class="mb-3 display-1 text-xs-center">ALFA-TISK.CZ</div>
                        <div v-if="!isUserLoggedIn">
                            <custom-dialog
                                    :current-user="currentUser"
                            ></custom-dialog>
                        </div>
                        <div v-else="">
                            <v-btn
                                    class="primary"
                                    dark
                                    large
                                    @click="createThesis"
                            >
                                <span class="group pa-2">
                                <v-icon>add</v-icon>
                              </span>Vytvořit Bakalářku
                            </v-btn>
                        </div>
                    </v-layout>
                </v-parallax>
            </section>
            <section>
                <v-layout
                        column
                        wrap
                        class="my-5"
                        align-center
                >
                    <v-flex xs12 sm4 class="my-3">
                        <div class="text-xs-center">
                            <h2 class="display-1">Vazby a tisk studentských prací</h2>
                            <span class="subheading">
                Nabízíme 2 druhy vazeb, výběr z několika barev desek,
stříbrný nebo zlatý potisk, potisk hřbetu, kapsy na posudek a CD/DVD,
to vše lze objednat i přímo zde, online!
              </span>
                        </div>
                    </v-flex>
                    <v-flex xs12>
                        <v-container grid-list-xl>
                            <v-layout row wrap>
                                <v-flex xs12 md4>
                                    <v-card class="elevation-0 transparent">
                                        <v-card-text class="text-xs-center">
                                            <v-icon x-large class="primary--text text--lighten-2">color_lens</v-icon>
                                        </v-card-text>
                                        <v-card-title primary-title class="layout justify-center">
                                            <div class="display-1 text-xs-center">Data pouze v PDF</div>
                                        </v-card-title>
                                        <v-card-text>
                                            Data k tisku bakalářských a diplomových prací zasílejte pouze ve formátu PDF. Při tisku z jiných formátů (Word atd.)
                                            může docházet k rozformátovaní Vašich prací*. Ve vlastním zájmu tedy dbejte na dodání dat v PDF. Bohužel jiné formáty pro tisk nemůžeme akceptovat. Pokud Vaše práce obsahuje čb i barevné kopie, připravte si seznam stránek, které budete tisknout v ČB či B. (Např. 1-30 ČB, 30-35 B)

                                            *odlišné verze MS Word různě zalamují konce řádků a mají trochu jiné formátování, což často z naší zkušenosti vedlo k rozformátování celého dokumentu, přestalo sedět stránkování "Obsahu", nadpisy se přesouvaly na konce stránek apod. Bohužel z těchto důvodů nemůžeme zaručit, že zrovna váš dokument takto neutrpí a musíme od tisku Word formátů ustoupit.
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                                <v-flex xs12 md4>
                                    <v-card class="elevation-0 transparent">
                                        <v-card-text class="text-xs-center">
                                            <v-icon x-large class="primary--text text--lighten-2">flash_on</v-icon>
                                        </v-card-text>
                                        <v-card-title primary-title class="layout justify-center">
                                            <div class="display-1  text-xs-center">Vazba diplomových prací Classic
                                            </div>
                                        </v-card-title>
                                        <v-card-text>
                                            Lepená vazba ve hřbetu pomocí tavného polyuretanového lepidla, podobně jak je tomu u knih. Výrazně hezčí a profesionálnější vzhled než u verze Classic. Zároveň je možné na desky aplikovat například logo či jinou grafiku. Nevýhodou je, že nelze hřbet rozvázat, pokud je jednou slepen.
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                                <v-flex xs12 md4>
                                    <v-card class="elevation-0 transparent">
                                        <v-card-text class="text-xs-center">
                                            <v-icon x-large class="primary--text text--lighten-2">build</v-icon>
                                        </v-card-text>
                                        <v-card-title primary-title class="layout justify-center">
                                            <div class="display-1 text-xs-center">Termovazba</div>
                                        </v-card-title>
                                        <v-card-text>
                                            Terrmovazba u nás nahrazuje kroužkovou vazbu, kdy tištěné dokumenty namístostočeného drátu jsou svázány hřbetem s tavným polyuretanovýmlepidlem. Podobně jako je tomu u vazby DeLuxe.

                                            Oproti vazbě kroužkové nejenže lépe vypadá, ale především se používáním stránky časem nevytrhávají
                                            a snadno se v ní listuje – jako např. v časopise. Považujeme ji proto za modernější a kvalitnější
                                            náhradu starší kroužkové vazby.
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-flex>
                </v-layout>
            </section>
            <footer-component></footer-component>

        </v-content>
    </v-app>
</template>
<style>
    @media only screen and (max-width: 599px) {
        .main-menu-logged-in {
            display:none;
        }
    }
</style>
<script>
    export default {
        data() {
            return {
                title: '<img src="/img/alfatisk-logo.png">',
                myDialog: false,
                parsedUser: {
                    name: null,
                },
                profileUrl: null,
                createThesisUrl: '',
                loggedInItems: [
                    { title: 'Odhlásit', action: '' },
                    { title: '' },
                    { title: 'Click Me' },
                    { title: 'Click Me 2' }
                ],

                loggedOutItems: [

                ],
            }
        },

        props: {
            isUserLoggedIn: null,
            currentUser: null
        },

        mounted() {
            this.parsedUser = this.currentUser != '' ? JSON.parse(this.currentUser) : null;
            this.createThesisUrl = this.$laroute.route('thesis.index');
        },

        methods: {
            logout() {
                axios.get(this.$laroute.route('users.logout'))
                .then((response) =>{
                    window.location.href = this.$laroute.route('home');
                }, (error) => {
                    console.log(error);
                });
            },

            login() {
                this.eventBus.$emit('open-login-dialog', true );
            },
            profile () {
                window.location.href = this.$laroute.route('users.show');
            },

            createThesis() {
                window.location.href = this.$laroute.route('thesis.index');
            }
        }
    }
</script>
