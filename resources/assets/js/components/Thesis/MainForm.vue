<template>
    <div>
        <v-card color="grey lighten-3">
            <v-card-text>
                <v-layout row>
                    <v-flex xs12>
                        <v-card>
                            <v-toolbar color="purple darken-3" dark>
                                <v-toolbar-title>Zde vytvorte formular</v-toolbar-title>
                                <v-spacer></v-spacer>
                            </v-toolbar>
                            <v-container>

                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader v-text="'Typ zadání'"></v-subheader>
                                </v-flex>
                                <v-flex xs8>
                                    <v-select
                                            v-bind:items="formItemsData.typZadani"
                                            v-model="selectedData.typZadani"
                                            label=""
                                            light
                                            return-object
                                    ></v-select>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap v-show="selectedData.typZadani.value == 2">
                                <v-flex xs4>
                                </v-flex>
                                <v-flex xs8>
                                    <v-select
                                            v-bind:items="formItemsData.rozsahStran"
                                            v-model="selectedData.pribliznyPocetListu"
                                            label="Předpokládaný rozsah stran"
                                            light
                                            item-value="value"
                                    ></v-select>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap v-show="selectedData.typZadani.value == 1">
                                <v-flex xs4>
                                    <v-subheader v-text="'Přesný počet listů'"></v-subheader>
                                </v-flex>
                                <v-flex xs6>
                                    <v-slider @change="getTotalPrice" v-model="selectedData.presnyPocetStran" thumb-label v-bind:max="1000"></v-slider>
                                </v-flex>
                                <v-flex xs2>
                                    <v-text-field
                                            @change="getTotalPrice"
                                            name="selectedPresnyPocetstran"
                                            label="Počet"
                                            id="selectedPresnyPocetStran"
                                            item-value="selectedData.presnyPocetStran"
                                            v-model="selectedData.presnyPocetStran"
                                    ></v-text-field>
                                </v-flex>

                                <v-flex xs4>
                                </v-flex>
                                <v-flex xs4>
                                    <v-select
                                            v-bind:items="formItemsData.typTisku"
                                            v-model="selectedData.typTisku"
                                            label="Typ tisku"
                                            light
                                            return-object

                                    ></v-select>
                                </v-flex>
                                <v-flex xs4>
                                    <v-select
                                            v-bind:items="formItemsData.barevnost"
                                            v-model="selectedData.barevnost"
                                            label="Barevnost"
                                            light
                                            return-object
                                    ></v-select>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader v-text="'Škola'"></v-subheader>
                                </v-flex>
                                <v-flex xs8>
                                    <v-select
                                            v-bind:items="formItemsData.skoly"
                                            v-model="selectedData.skoly"
                                            label="Zde prosím vyberte školu"
                                            light
                                            return-object
                                    ></v-select>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap v-show="selectedData.skoly.value == 0">
                                <v-flex xs4>
                                </v-flex>
                                <v-flex xs8>
                                    <v-text-field
                                            v-model="selectedData.jinaSkola"
                                            name="jinaSkola"
                                            label="Jiná škola"
                                            id="jinaSkola"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader v-text="'Fakulta'"></v-subheader>
                                </v-flex>
                                <v-flex xs8>
                                    <v-select
                                            v-bind:items="formItemsData.fakulty"
                                            v-model="selectedData.fakulty"
                                            label="Zde prosím vyberte fakultu"
                                            light
                                            return-object
                                    ></v-select>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap v-show="selectedData.fakulty == 0">
                                <v-flex xs4>
                                </v-flex>
                                <v-flex xs8>
                                    <v-text-field
                                            v-model="selectedData.jinaFakulta"
                                            name="jinaFakulta"
                                            label="Jiná fakulta"
                                            id="jinaFakulta"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader>Katedra</v-subheader>
                                </v-flex>
                                <v-flex xs8>
                                    <v-text-field
                                            name="input-1"
                                            label="Název katedry"
                                            id="katedra"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader>Název práce</v-subheader>
                                </v-flex>
                                <v-flex xs8>
                                    <v-text-field
                                            name="input-1"
                                            label="Název práce"
                                            id="nazevPrace"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader v-text="'Typ práce'"></v-subheader>
                                </v-flex>
                                <v-flex xs8>
                                    <v-select
                                            v-bind:items="formItemsData.typPrace"
                                            v-model="selectedData.typPrace"
                                            label="Zde prosím vyberte typ práce"
                                            light
                                            return-object
                                    ></v-select>
                                </v-flex>
                            </v-layout>


                            <v-layout row wrap v-show="selectedData.typPrace == 0">
                                <v-flex xs4>
                                </v-flex>
                                <v-flex xs8>
                                    <v-text-field
                                            v-model="selectedData.jinyTypPrace"
                                            name="jinyTypPrace"
                                            label="Jiná práce"
                                            id="jinyTypPrace"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader v-text="'Spodní řádek'"></v-subheader>
                                </v-flex>
                                <v-flex xs4>
                                    <v-text-field
                                            v-model="selectedData.spodniTextVlevo"
                                            name="input-1"
                                            label="Text vlevo"
                                            id="spodniTextVlevo"
                                    ></v-text-field>
                                </v-flex>
                                <v-flex xs4>
                                    <v-text-field
                                            v-model="selectedData.spodniTextVpravo"
                                            name="input-1"
                                            label="Text vpravo"
                                            id="spodniTextVpravo"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader v-text="'Potisk hřbetu'"></v-subheader>
                                </v-flex>
                                <v-flex xs8>
                                    <v-switch v-bind:label="potiskHrbetu == false ? 'Ne' : 'Ano'" v-model="potiskHrbetu"></v-switch>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap v-show="potiskHrbetu == true">
                                <v-flex xs4>
                                </v-flex>
                                <v-flex xs4>
                                    <v-text-field
                                            v-model="selectedData.potiskNahore"
                                            name="potiskNahore"
                                            label="Potisk hřbetu nahoře"
                                            id="potiskNahore"
                                    ></v-text-field>
                                </v-flex>
                                <v-flex xs4>
                                    <v-text-field
                                            v-model="selectedData.potiskDole"
                                            name="potiskDole"
                                            label="Potisk hřbetu dole"
                                            id="potiskDole"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader v-text="'Počet pevných desek'"></v-subheader>
                                </v-flex>
                                <v-flex xs6>
                                    <v-slider v-model="selectedData.pocetPevnychDesek" thumb-label v-bind:max="20"></v-slider>
                                </v-flex>
                                <v-flex xs2>
                                    <v-text-field
                                            name="pocetPevnychDesek"
                                            label="Počet"
                                            id="pocetPevnychDesek"
                                            item-value="selectedData.pocetPevnychDesek"
                                            v-model="selectedData.pocetPevnychDesek"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader v-text="'Počet kroužkových desek'"></v-subheader>
                                </v-flex>
                                <v-flex xs6>
                                    <v-slider v-model="selectedData.pocetKrouzkovychDesek" thumb-label v-bind:max="20"></v-slider>
                                </v-flex>
                                <v-flex xs2>
                                    <v-text-field
                                            name="pocetKrouzkovychDesek"
                                            label="Počet"
                                            id="pocetKrouzkovychDesek"
                                            item-value="selectedData.pocetKrouzkovychDesek"
                                            v-model="selectedData.pocetKrouzkovychDesek"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader v-text="'Barva desek'"></v-subheader>
                                </v-flex>
                                <v-flex xs8>
                                    <v-select
                                            v-bind:items="formItemsData.barvaDesek"
                                            v-model="selectedData.barvaDesek"
                                            label="Vyberte barvu desek"
                                            light
                                            return-object
                                    ></v-select>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader v-text="'Barva písma'"></v-subheader>
                                </v-flex>
                                <v-flex xs8>
                                    <v-select
                                            v-bind:items="formItemsData.barvaPisma"
                                            v-model="selectedData.barvaPisma"
                                            label="Vyberte barvu písma"
                                            light
                                            return-object
                                    ></v-select>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader v-text="'Kapsa pro CD'"></v-subheader>
                                </v-flex>
                                <v-flex xs1>
                                    <v-switch v-bind:label="kapsaProCD == true ? 'Ano' : 'Ne'" v-model="kapsaProCD"></v-switch>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap v-show="kapsaProCD == true">
                                <v-flex xs4>
                                </v-flex>
                                <v-flex xs4>
                                    <v-slider v-model="selectedData.pocetKapesProCD" thumb-label v-bind:max="5"></v-slider>
                                </v-flex>
                                <v-flex xs2>
                                    <v-text-field
                                            name="pocetKapesProCD"
                                            label="Počet"
                                            id="pocetKapesProCD"
                                            item-value="selectedData.pocetKapesProCD"
                                            v-model="selectedData.pocetKapesProCD"
                                    ></v-text-field>
                                </v-flex>
                                <v-flex xs2>
                                    <v-switch v-bind:label="kapsaProCD == true ? 'Vpředu' : 'Vzadu'" v-model="selectedData.kapsaCdVpredu"></v-switch>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader v-text="'Kapsa pro posudek'"></v-subheader>
                                </v-flex>
                                <v-flex xs2>
                                    <v-switch v-bind:label="kapsaProPosudek == true ? 'Ano' : 'Ne'" v-model="kapsaProPosudek"></v-switch>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap  v-show="kapsaProPosudek == true">
                                <v-flex xs4></v-flex>
                                <v-flex xs4>
                                    <v-slider v-model="selectedData.pocetKapesProPosudek" thumb-label v-bind:max="5"></v-slider>
                                </v-flex>
                                <v-flex xs2>
                                    <v-text-field
                                            name="pocetKapesProPosudek"
                                            label="Počet"
                                            id="pocetKapesProPosudek"
                                            item-value="selectedData.pocetKapesProPosudek"
                                            v-model="selectedData.pocetKapesProPosudek"
                                    ></v-text-field>
                                </v-flex>
                                <v-flex xs2>
                                    <v-switch v-bind:label="kapsaProCD == true ? 'Vpředu' : 'Vzadu'" v-model="selectedData.kapsaPosudekVpredu"></v-switch>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader v-text="'Doba zhotovení'"></v-subheader>
                                </v-flex>
                                <v-flex xs8>
                                    <v-select
                                            v-bind:items="formItemsData.dobaZhotoveni"
                                            v-model="selectedData.dobaZhotoveni"
                                            label="vyberte dobu zhotovení"
                                            light
                                            return-object
                                    ></v-select>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader v-text="'Poznámky k objednávce'"></v-subheader>
                                </v-flex>
                                <v-flex xs8>
                                    <v-text-field
                                            v-model="selectedData.poznamky"
                                            name="poznamky"
                                            label="Poznámky k objednavce"
                                            textarea
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>
                            <v-layout row wrap>
                                <v-flex xs4>
                                </v-flex>
                                <v-flex xs8>
                                    <v-subheader v-if="price >= 0"v-text="'cena: '+price+' Kč'"></v-subheader>
                                </v-flex>
                            </v-layout>
                            <v-layout row wrap>
                                <v-flex xs4>
                                </v-flex>
                                <v-flex xs8>

                                </v-flex>
                            </v-layout>
                            </v-container>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-card-text>
            <v-divider class="mt-5"></v-divider>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn v-if="!thesisCreated" @click="createThesis" color="primary" :disabled="!accessUpload">Vytvořit &nbsp<v-progress-circular v-show="loading" indeterminate color="white"></v-progress-circular>
                </v-btn>
                <div v-if="thesisCreated">
                    <v-btn color="primary" @click="updateThesis" :disabled="!accessUpload">Uložit změny</v-btn>
                    <v-btn color="primary" @click="goToNextPage" :disabled="!accessUpload">Pokračovat k dalšímu kroku</v-btn>
                </div>
            </v-card-actions>
        </v-card>

        <v-container fluid>

        </v-container>
    </div>
</template>
<script>
    export default {
        props: {
            currentUser: null,
        },
        data () {
            return {
                isFormValid: false,
                loading: false,
                accessUpload: false,

                potiskHrbetu: false,
                kapsaProCD: false,
                kapsaProPosudek: false,

                selectedData: {
                    user_id: null,
                    typZadani: {text: 'Vytisknout praci a vyrobit desky', value: 1, price: 10},
                    pribliznyPocetListu: {text: '25 - 40 listů', value: 3},
                    presnyPocetStran: 0,
                    typTisku: {text: 'Jednostranny', value: 11, price: 10},
                    barevnost: {text: 'Cernobile', value: 14, price: 1.5},
                    skoly: {text: 'ZÁPADOČESKÁ UNIVERZITA V PLZNI', value: 16},
                    jinaSkola: null,
                    fakulty: {text: 'FAKULTA APLIKOVANÝCH VĚD', value: 26},
                    jinaFakulta: null,
                    typPrace: {text: 'DIPLOMOVÁ PRÁCE', value: 33},
                    jinyTypPrace: null,
                    spodniTextVlevo: null,
                    spodniTextVpravo: null,
                    potiskNahore: null,
                    potiskDole: null,
                    pocetPevnychDesek: 0,
                    pocetKrouzkovychDesek: 0,
                    barvaDesek: {text: 'MODRÁ', value: 40},
                    barvaPisma: {text: 'ZLATÉ', value: 42},
                    pocetKapesProCD: 0,
                    pocetKapesProPosudek: 0,
                    kapsaCdVpredu: null,
                    kapsaPosudekVpredu: null,
                    dobaZhotoveni: {text: 'Základ - 239 Kč ( do 4 pracovních dnů )', value: 44, price: 239},
                    poznamky: null,
                },
                formatedDataForSubmit: {},

                price: 0,
                bcId: null,

                formItemsData: {
                    typZadani: [
                        {text: 'Vytisknout praci a vyrobit desky', value: 1, price: 10},
                        {text: 'Vyrobit pouze desky', value: 2, price: 20},
                    ],

                    rozsahStran: [
                        {text: '25 - 40 listů', value: 3},
                        {text: '41 - 55 listů', value: 4},
                        {text: '56 - 75 listů', value: 5},
                        {text: '76 - 100 listů', value: 6},
                        {text: '101 - 130 listů', value: 7},
                        {text: '101 - 130 listů', value: 8},
                        {text: '131 - 160 listů', value: 9},
                        {text: '161 - 190 listů', value: 10},
                    ],

                    typTisku: [
                        {text: 'Jednostranny', value: 11, price: 10},
                        {text: 'Oboustranny', value: 12, price: 15},
                        {text: 'Kombinovany', value: 13, price: 20},
                    ],

                    barevnost: [
                        {text: 'Cernobile', value: 14, price: 1.5},
                        {text: 'Dle soubou (cernobile / barevne)', value: 15, price: 7.49},
                    ],

                    skoly: [
                        {text: 'ZÁPADOČESKÁ UNIVERZITA V PLZNI', value: 16},
                        {text: 'UNIVERZITA JANA AMOSE KOMENSKÉHO PRAHA', value: 17},
                        {text: 'JIHOČESKÁ UNIVERZITA V ČESKÝCH BUDĚJOVICÍCH', value: 18},
                        {text: 'UNIVERZITA KARLOVA V PRAZE', value: 19},
                        {text: 'Střední zdravotnická škola a Vyšší odborná škola zdravotnická Plzeň, Karlovarská 99, 323 17 Plzeň', value: 20},
                        {text: 'Vyšší odborná škola zdravotnická, managementu a veřejnosprávních studií, s.r.o. Ledecká 35,  Plzeň', value: 21},
                        {text: 'jiná ...', value: 0},
                    ],

                    fakulty: [
                        {text: 'FAKULTA ELEKTROTECHNICKÁ', value: 23},
                        {text: 'FAKULTA EKONOMICKÁ', value: 24},
                        {text: 'FAKULTA PEDAGOGICKÁ', value: 25},
                        {text: 'FAKULTA APLIKOVANÝCH VĚD', value: 26},
                        {text: 'FAKULTA FILOZOFICKÁ', value: 27},
                        {text: 'FAKULTA PRÁVNICKÁ', value: 28},
                        {text: 'FAKULTA ZDRAVOTNICKÝCH STUDIÍ', value: 29},
                        {text: 'FAKULTA STROJNÍ', value: 30},
                        {text: 'FAKULTA DESIGNU A UMĚNÍ LADISLAVA SUTNARA', value: 31},
                        {text: 'jiná ...', value: 0},
                    ],

                    typPrace: [
                        {text: 'DIPLOMOVÁ PRÁCE', value: 33},
                        {text: 'BAKALÁŘSKÁ PRÁCE', value: 34},
                        {text: 'ABSOLVENTSKÁ PRÁCE', value: 35},
                        {text: 'DISERTAČNÍ PRÁCE', value: 36},
                        {text: 'HABILITAČNÍ PRÁCE', value: 37},
                        {text: 'ZÁVĚREČNÁ PRÁCE', value: 38},
                        {text: 'jiná ...', value: 0},
                    ],

                    barvaDesek: [
                        {text: 'MODRÁ', value: 40},
                        {text: 'ČERNÁ', value: 41},
                    ],

                    barvaPisma: [
                        {text: 'ZLATÉ', value: 42},
                        {text: 'STŘÍBRNÉ', value: 43},
                    ],

                    dobaZhotoveni: [
                        {text: 'Základ - 239 Kč ( do 4 pracovních dnů )', value: 44, price: 239},
                        {text: 'Expres - 399 Kč ( do 24 hodin )', value: 45, price: 399},
                        {text: 'Super expres - 600 Kč ( na počkání )', value: 46, price: 399},
                    ]
                },
                priceList: [],
                nextStep: null,
                thesisCreated: false,
            }
        },

        created() {
           this.setPrices();
        },

        mounted() {
            this.setPrices();
            this.selectedData.user_id = this.currentUser.id;
        },

        methods: {
            createThesis() {
                this.getTotalPrice();
                    this.loading = true;
                axios.post(this.$laroute.route('thesis.api.store'),this.getFormattedObjectToSubmit(this.selectedData)).then((response) => {
                    this.loading = false;
                    console.log('bc id');
                    console.log(response.data.id);
                    this.bcId = response.data.id;

                    this.thesisCreated = true;
                    this.goToNextPage();
                    //this.eventBus.$emit('go-to-next-page', {page_id: this.nextStep, bc_id: response.data.id})
                }).catch((error) => {
                    this.loading = false;
                    console.log(error);
                });
            },

            updateThesis() {
                this.loading = true;
                axios.put(this.$laroute.route('thesis.api.update', {'id': this.bcId}),this.getFormattedObjectToSubmit(this.selectedData)).then((response) => {
                    this.loading = false;
                    this.thesisCreated = true;
                    this.goToNextPage();

//                    this.eventBus.$emit('go-to-next-page', {page_id: this.nextStep, bc_id: response.data.id})
                }).catch((error) => {
                    this.loading = false;
                    console.log(error);
                });
            },

            setPrices() {
                this.priceList[0] = 49; // potisk hrbetu
                this.priceList[1] = 40; // cena za krouzkove desky
                this.priceList[2] = 30; // cena za kapsa pro cd
                this.priceList[3] = 30; // cena za kapsu pro posudek
            },

            getTotalPrice() {
                console.log('calculating price');
                this.setNextStep();
                this.price = 0;
                this.price += this.getListyPrice();
                this.price += this.getPotiskHrbetuPrice();
                this.price += this.getPevneDeskyPrice();
                this.price += this.getKrouzkoveDeskyPrice();
                this.price += this.getKapsaCDPrice();
                this.price += this.getKapsaPosudekPrice();
            },

            setNextStep() {
                this.nextStep = 2; // go to upload
                if (this.selectedData.typZadani.value == 2) {
                    this.nextStep = 3; // go to review
                }
            },

            getListyPrice() {
                var price = 0;

                if (this.selectedData.typZadani.value == 1) { // prace a desky
                    price = this.selectedData.barevnost.price * this.selectedData.presnyPocetStran;
                }
                return price;
            },

            getPotiskHrbetuPrice() {
                var price = 0;
                if (this.potiskHrbetu) {
                    price = this.selectedData.pocetPevnychDesek * this.priceList[0];
                }

                return price;
            },

            getPevneDeskyPrice() {
                var price = 0;
                if (this.selectedData.pocetPevnychDesek >= 0) {
                    price = this.selectedData.dobaZhotoveni.price * this.selectedData.pocetPevnychDesek;
                }

                return price;
            },

            getKrouzkoveDeskyPrice() {
                var price = 0;
                if (this.selectedData.pocetKrouzkovychDesek >= 0) {
                    price = this.priceList[1] * this.selectedData.pocetKrouzkovychDesek;
                }

                return price;
            },

            getKapsaCDPrice() {
                var price = 0;
                if (this.kapsaProCD) {
                    price = this.priceList[2] * this.selectedData.pocetKapesProCD
                }

                return price;
            },

            getKapsaPosudekPrice() {
                var price = 0;
                if (this.kapsaProPosudek) {
                    price = this.priceList[3] * this.selectedData.pocetKapesProPosudek
                }

                return price;
            },

            getFormattedObjectToSubmit(object) {
                this.formatedDataForSubmit.user_id = object.user_id;
                this.formatedDataForSubmit.typZadani = object.typZadani.text;
                this.formatedDataForSubmit.pribliznyPocetListu = object.pribliznyPocetListu.text;
                this.formatedDataForSubmit.presnyPocetStran = object.presnyPocetStran;
                this.formatedDataForSubmit.typTisku = object.typTisku.text;
                this.formatedDataForSubmit.barevnost = object.barevnost.text;
                this.formatedDataForSubmit.skoly = object.skoly.text;
                this.formatedDataForSubmit.jinaSkola = object.jinaSkola;
                this.formatedDataForSubmit.fakulty = object.fakulty.text;
                this.formatedDataForSubmit.jinaFakulta = object.jinaFakulta;
                this.formatedDataForSubmit.typPrace = object.typPrace.text;
                this.formatedDataForSubmit.jinyTypPrace = object.jinyTypPrace;
                this.formatedDataForSubmit.spodniTextVlevo = object.spodniTextVlevo;
                this.formatedDataForSubmit.spodniTextVpravo = object.spodniTextVpravo;
                this.formatedDataForSubmit.potiskNahore = object.potiskNahore;
                this.formatedDataForSubmit.potiskDole = object.potiskDole;
                this.formatedDataForSubmit.pocetPevnychDesek = object.pocetPevnychDesek;
                this.formatedDataForSubmit.pocetKrouzkovychDesek = object.pocetKrouzkovychDesek;
                this.formatedDataForSubmit.barvaDesek = object.barvaDesek.text;
                this.formatedDataForSubmit.barvaPisma = object.barvaPisma.text;
                this.formatedDataForSubmit.pocetKapesProCD = object.pocetKapesProCD;
                this.formatedDataForSubmit.pocetKapesProPosudek = object.pocetKapesProPosudek;
                this.formatedDataForSubmit.kapsaCdVpredu = object.kapsaCdVpredu;
                this.formatedDataForSubmit.kapsaPosudekVpredu = object.kapsaPosudekVpredu;
                this.formatedDataForSubmit.dobaZhotoveni = object.dobaZhotoveni.text;
                this.formatedDataForSubmit.poznamky = object.poznamky;
                this.formatedDataForSubmit.price = this.price;

                return this.formatedDataForSubmit;
            },

            goToNextPage() {
                this.setNextStep();
                if (this.bcId != null) {
                    this.eventBus.$emit('go-to-next-page', {page_id: this.nextStep, bc_id: this.bcId})
                }
            }
        },

        watch: {
            selectedData: {
                handler() {
                    this.getTotalPrice();
                },
                deep: true,
            },

            potiskHrbetu() {
                this.getTotalPrice();
            },

            kapsaProCD() {
                this.getTotalPrice();
            },

            kapsaProPosudek() {
                this.getTotalPrice();
            },

            price(val) {
                this.accessUpload = false;

                if (val > 0) {
                    this.accessUpload = true;
                    this.eventBus.$emit('form-is-valid', true);
                }
                this.eventBus.$emit('form-is-valid', false);
            }
        }
    }
</script>