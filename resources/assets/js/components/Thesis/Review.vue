<template>
    <div>
        <v-container fluid>
            <v-layout row v-if="thesis != null">
                <v-flex xs12 sm6>
                    <v-card>
                        <v-toolbar color="indigo" dark>
                            <v-toolbar-title>Shrnutí</v-toolbar-title>
                            <v-spacer></v-spacer>
                        </v-toolbar>
                        <v-list>
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
                <v-flex xs12 sm6>
                    <v-card>
                        <v-toolbar color="indigo" dark>
                            <v-toolbar-title>Cena</v-toolbar-title>
                            <v-spacer></v-spacer>
                        </v-toolbar>
                        <v-list>
                            <v-list-tile @click="">
                                <v-list-tile-content>Cena:</v-list-tile-content>
                                <v-list-tile-content class="align-end">{{thesis.price}} Kč</v-list-tile-content>
                            </v-list-tile>
                        </v-list>
                    </v-card>
                </v-flex>
            </v-layout>

        </v-container>
        <v-btn color="primary" @click.native="goToNextPage(2)">Zpět</v-btn>
        <v-btn color="primary" @click.native="goToNextPage(4)">Další</v-btn>
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
            }
        },

        mounted() {

            this.eventBus.$on('load-thesis', (payload) => {
                this.getThesis();
            });

            this.eventBus.$on('load-bc', () => {
                this.getThesis();
            });
        },

        methods: {
            getThesis() {
                axios.get(this.$laroute.route('thesis.api.show', {id: this.thesisId})).then((response) => {
                    this.loading = false;
                    this.thesis = response.data;
                }).catch((error) => {
                    this.loading = false;
                    console.log(error);
                });
            },
            goToNextPage(pageId) {
                this.eventBus.$emit('go-to-next-page', {page_id: pageId, bc_id: this.thesisId});
            }
        }
    }
</script>