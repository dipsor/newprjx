<template>
    <div>
        <v-card color="grey lighten-3">
            <v-card-text>
                <v-layout row>
                    <v-flex xs12>
                        <v-card :class="'pb-1'">
                            <v-toolbar color="purple darken-3" dark>
                                <v-toolbar-title>Shrnutí</v-toolbar-title>
                                <v-spacer></v-spacer>
                            </v-toolbar>
                            <v-list v-if="thesis != null">
                                <v-list-tile @click="">
                                    <v-list-tile-content>Typ zadání:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.typZadani}}</v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Předpokládaný rozsah stran:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.rozsahStran}}</v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Přesný počet listů:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.presnyPocetStran}}</v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Typ tisku:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.typTisku}}</v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Barevnost:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.barevnost}}</v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Škola:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.skoly}}</v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Fakulta:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.fakulty}}</v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Katedra:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.typZadani}}</v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Název práce:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.typZadani}}</v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Spodní řádek vlevo:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.spodniTextVlevo}}</v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Spodní řádek vpravo:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.spodniTextVpravo}}</v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Potisk hřbetu nahoře:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.potiskNahore}}</v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Potisk hřbetu dole:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.potiskDole}}</v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Počet pevných desek:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.pocetPevnychDesek}}</v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Počet kroužkových desek:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.pocetKrouzkovychDesek}}</v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Barva desek:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.barvaDesek}}</v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Barva písma:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.barvaPisma}}</v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Kapsa pro CD:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.pocetKapesProCD}}</v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Kapsa pro posudek:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.pocetKapesProPosudek}}</v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Doba zhotovení:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.dobaZhotoveni}}</v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Poznámky k objednávce:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{thesis.poznamky}}</v-list-tile-content>
                                </v-list-tile>
                            </v-list>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-card-text>
            <v-alert v-if="errors !== null" type="error" :value="true">
                <div v-for="error in errors">{{error}}</div>
            </v-alert>
            <v-divider class="mt-5"></v-divider>
            <v-card-actions>
                <v-btn color="primary" @click.native="goToNextPage(2)">
                    Zpět
                </v-btn>
                <v-spacer></v-spacer>
                <v-btn color="primary" @click="createOrder()">
                    Vytvořit objednávku &nbsp<v-progress-circular v-show="loading" indeterminate color="white"></v-progress-circular>
                </v-btn>
            </v-card-actions>
        </v-card>
    </div>
</template>
<script>
    export default {
        props:['currentUser', 'thesisId'],
        data () {
            return {
                e1: 0,
                items: [],
                accessUpload: false,
                bcId: null,
                thesis: null,
                loading: false,
                errors: null,
            }
        },

        mounted() {
        },

        watch: {
            thesisId(val) {
                this.getThesis();
            }
        },

        methods: {
            createOrder() {
                this.loading = true;
                axios.post(this.$laroute.route('orders.api.store'),this.getOrderData()).then((response) => {
                    this.loading = false;
                    this.eventBus.$emit('go-to-next-page', {page_id: 4, bc_id: response.data.id});
                    this.eventBus.$emit('order-created', response.data.id);

                }).catch((error) => {
                    this.loading = false;
                    this.errors = error.response.data.errors;

                });
            },

            getThesis() {
                axios.get(this.$laroute.route('thesis.api.show', {id: this.thesisId})).then((response) => {
                    this.loading = false;
                    this.thesis = response.data;
                }).catch((error) => {
                    this.loading = false;
                    this.error = error.response.data.errors;
                    console.log(error.response);
                });
            },
            goToNextPage(pageId) {
                this.eventBus.$emit('go-to-next-page', {page_id: pageId, bc_id: this.thesisId});
            },

            getOrderData() {
                return {
                    'user_id' : this.currentUser.id,
                    'thesis_id' : this.thesisId,
                    'orderName': this.thesis.typZadani,
                    'first_name' : this.currentUser.first_name2,
                    'last_name' : this.currentUser.last_name,
                    'phone_number' : this.currentUser.phone_number,
                    'city' : this.currentUser.city,
                    'street' : this.currentUser.street,
                    'postal_code' : this.currentUser.postal_code,
                    'country_code' : this.currentUser.country_code,
                    'price' : this.thesis.price,
                }
            }
        }
    }
</script>