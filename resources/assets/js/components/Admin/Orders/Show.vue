<template>
    <div>
        <v-content>
            <v-container grid-list-md text-xs-center>
                <v-layout row wrap>
                    <v-flex xs12>
                        <breadcrumbs
                                :breadcrumbs-items="items"
                        ></breadcrumbs>
                    </v-flex>
                    <v-flex xs12>
                        <v-layout row wrap>
                            <v-flex xs12>
                                <v-card>
                                    <v-toolbar color="purple darken-3" dark>
                                        <v-toolbar-title>Shrnutí objednávky</v-toolbar-title>
                                        <v-spacer></v-spacer>
                                    </v-toolbar>
                                    <v-list v-if="order !== null">
                                        <v-list-tile @click="">
                                            <v-list-tile-content>Objednávka:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.orderName}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider></v-divider>

                                        <v-list-tile @click="">
                                            <v-list-tile-content>Jméno:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.first_name}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider></v-divider>

                                        <v-list-tile @click="">
                                            <v-list-tile-content>Příjmení:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.last_name}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider></v-divider>
                                        <v-list-tile @click="">
                                            <v-list-tile-content>Ulice:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.street}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider></v-divider>
                                        <v-list-tile @click="">
                                            <v-list-tile-content>Tel číslo:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.user.phone_number}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider></v-divider>
                                        <v-list-tile @click="">
                                            <v-list-tile-content>Email:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.user.email}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider></v-divider>
                                        <v-list-tile @click="">
                                            <v-list-tile-content>Cena:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.price}} Kč</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider></v-divider>
                                        <v-list-tile @click="">
                                            <v-list-tile-content>Status:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.status}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider></v-divider>
                                        <v-list-tile>
                                            <v-list-tile-content><a class="btn primary pr-2 pl-2" @click="generateCsv(order.thesis.id)">Generovat Csv</a></v-list-tile-content>
                                            <v-list-tile-content align-right><v-btn align-right primary>Zmenit stav objednavky</v-btn></v-list-tile-content>
                                        </v-list-tile>
                                    </v-list>
                                </v-card>
                            </v-flex>
                        </v-layout>
                        <v-layout row wrap>
                            <v-flex xs12>
                                <v-card>
                                    <v-toolbar color="purple darken-3" dark>
                                        <v-toolbar-title>Zadání</v-toolbar-title>
                                        <v-spacer></v-spacer>
                                    </v-toolbar>
                                    <v-list v-if="order !== null">
                                        <v-list-tile @click="">
                                            <v-list-tile-content>Soubor:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.typZadani}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider v-if="order.thesis.typZadani !== undefined"></v-divider>
                                        <v-list-tile @click="">
                                            <v-list-tile-content>Typ zadání:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.typZadani}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider v-if="order.thesis.rozsahStran !== undefined"></v-divider>
                                        <v-list-tile @click=""  v-if="order.thesis.rozsahStran !== undefined">
                                            <v-list-tile-content>Předpokládaný rozsah stran:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.rozsahStran}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider v-if="order.thesis.presnyPocetStran !== undefined"></v-divider>
                                        <v-list-tile @click="" v-if="order.thesis.presnyPocetStran !== undefined">
                                            <v-list-tile-content>Přesný počet listů:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.presnyPocetStran}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider></v-divider>
                                        <v-list-tile @click="">
                                            <v-list-tile-content>Typ tisku:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.typTisku}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider></v-divider>
                                        <v-list-tile @click="">
                                            <v-list-tile-content>Barevnost:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.barevnost}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider></v-divider>
                                        <v-list-tile @click="">
                                            <v-list-tile-content>Škola:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.skoly}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider v-if="order.thesis.jinaSkola !== null"></v-divider>
                                        <v-list-tile @click=""  v-if="order.thesis.jinaSkola !== null">
                                            <v-list-tile-content>Škola:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.jinaSkola}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider></v-divider>
                                        <v-list-tile @click="">
                                            <v-list-tile-content>Fakulta:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.fakulty}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider v-if="order.thesis.katedry !== undefined"></v-divider>
                                        <v-list-tile @click="" v-if="order.thesis.katedry !== undefined">
                                            <v-list-tile-content>Katedra:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.katedry}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider v-if="order.thesis.nazev_prace !== null"></v-divider>
                                        <v-list-tile @click="" v-if="order.thesis.nazev_prace !== null">
                                            <v-list-tile-content>Název práce:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.nazev_prace}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider v-if="order.thesis.spodniTextVlevo !== null"></v-divider>
                                        <v-list-tile @click="" v-if="order.thesis.spodniTextVlevo !== null">
                                            <v-list-tile-content>Spodní řádek vlevo:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.spodniTextVlevo}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider v-if="order.thesis.spodniTextVpravo !== null"></v-divider>
                                        <v-list-tile @click="" v-if="order.thesis.spodniTextVpravo !== null">
                                            <v-list-tile-content>Spodní řádek vpravo:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.spodniTextVpravo}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider v-if="order.thesis.potiskNahore !== null"></v-divider>
                                        <v-list-tile @click="" v-if="order.thesis.potiskNahore !== null">
                                            <v-list-tile-content>Potisk hřbetu nahoře:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.potiskNahore}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider v-if="order.thesis.potiskDole !== null"></v-divider>
                                        <v-list-tile @click="" v-if="order.thesis.potiskDole !== null">
                                            <v-list-tile-content>Potisk hřbetu dole:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.potiskDole}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider></v-divider>
                                        <v-list-tile @click="">
                                            <v-list-tile-content>Počet pevných desek:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.pocetPevnychDesek}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider></v-divider>
                                        <v-list-tile @click="">
                                            <v-list-tile-content>Počet kroužkových desek:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.pocetKrouzkovychDesek}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider></v-divider>
                                        <v-list-tile @click="">
                                            <v-list-tile-content>Barva desek:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.barvaDesek}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider></v-divider>
                                        <v-list-tile @click="">
                                            <v-list-tile-content>Barva písma:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.barvaPisma}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider></v-divider>
                                        <v-list-tile @click="">
                                            <v-list-tile-content>Kapsa pro CD:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.pocetKapesProCD}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider></v-divider>
                                        <v-list-tile @click="">
                                            <v-list-tile-content>Kapsa pro posudek:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.pocetKapesProPosudek}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider></v-divider>
                                        <v-list-tile @click="">
                                            <v-list-tile-content>Doba zhotovení:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.dobaZhotoveni}}</v-list-tile-content>
                                        </v-list-tile>
                                        <v-divider></v-divider>
                                        <v-list-tile @click="">
                                            <v-list-tile-content>Poznámky k objednávce:</v-list-tile-content>
                                            <v-list-tile-content class="align-end">{{order.thesis.poznamky}}</v-list-tile-content>
                                        </v-list-tile>
                                    </v-list>
                                </v-card>
                            </v-flex>
                        </v-layout>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-content>
    </div>
</template>
<script>
    export default {
        props:['currentUser', 'gopayOrderId'],
        data () {
            return {
                thesis: null,
                loading: false,
                errors: null,
                embedJs: null,
                gw_url: null,
                order: null,
                user: null,
                items: [],
                status: null,
                breadcrumText: '',
                fileUrl: '',
            }
        },

        mounted() {
            this.items = this.getBreadCrumbs();
            this.getOrder();
        },
        watch: {
            order(val) {
                console.log('watcher');
                console.log(val);
                this.status = val.status;
                this.breadcrumText = val.orderName;
                this.items = this.getBreadCrumbs();

                console.log(this.order.thesis.katedry);

            },
            fileUrl(val) {
                this.openFile(val);
            }
        },

        methods: {
            getOrder() {
                axios.get(this.$laroute.route('orders.api.show', {id: this.gopayOrderId})).then((response) => {
                    this.loading = false;
                    this.order = response.data;
                    console.log(this.order);
                }).catch((error) => {
                    this.loading = false;
                    this.error = error.response.data.errors;
                });
            },

            getBreadCrumbs(){
                return [
                    {
                        text: this.currentUser.name,
                        disabled: false,
                        link: this.$laroute.route('users.index')
                    },
                    {
                        text: this.breadcrumText,
                        disabled: true,
                    }
                ]
            },

            generateCsv(id) {
                axios.post(this.$laroute.route('admin.generate.csv', {id: id}))
                    .then((response) => {
                        this.fileUrl = response.data;
                    }).catch((error) => {
                    this.loading = false;
                    this.error = error.response.data.errors;
                    console.log(error.response);
                });
            },

            openFile(val)
            {
                window.location = this.fileUrl;
                console.log(this.fileUrl);
            }
        }
    }
</script>