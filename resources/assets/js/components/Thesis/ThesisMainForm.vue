<template>
    <div>
        <v-container fluid>
            <v-layout row wrap>
                <v-flex xs4>
                    <v-subheader v-text="'Typ zadání'"></v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-select
                            v-bind:items="formItemsData.typZadani"
                            v-model="selectedData.typaZadani"
                            label=""
                            light
                            item-value="value"
                    ></v-select>
                </v-flex>
            </v-layout>

            <v-layout row wrap v-show="selectedData.typaZadani == 2">
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

            <v-layout row wrap v-show="selectedData.typaZadani == 1">
                <v-flex xs4>
                    <v-subheader v-text="'Přesný počet listů'"></v-subheader>
                </v-flex>
                <v-flex xs6>
                    <v-slider v-model="selectedData.presnyPocetStran" thumb-label v-bind:max="1000"></v-slider>
                </v-flex>
                <v-flex xs2>
                    <v-text-field
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
                            item-value="value"
                    ></v-select>
                </v-flex>
                <v-flex xs4>
                    <v-select
                            v-bind:items="formItemsData.barevnost"
                            v-model="selectedData.barevnost"
                            label="Barevnost"
                            light
                            item-value="value"
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
                            item-value="value"
                    ></v-select>
                </v-flex>
            </v-layout>

            <v-layout row wrap v-show="selectedData.skoly == 0">
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
                        item-value="value"
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
                            item-value="value"
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
                            item-value="value"
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
                            item-value="value"
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
                            item-value="value"
                    ></v-select>
                </v-flex>
            </v-layout>

            <v-layout row wrap>
            <v-flex xs4>
                    <v-subheader v-text="'Poznamky k objednavce'"></v-subheader>
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
        </v-container>    </div>
</template>
<script>
    export default {
        data () {
            return {
                isFormValid: false,

                potiskHrbetu: false,
                kapsaProCD: false,
                kapsaProPosudek: false,

                selectedData: {
                    typaZadani: 1,
                    pribliznyPocetListu: 3,
                    presnyPocetStran: 0,
                    typTisku: 11,
                    barevnost: 14,
                    skoly: 16,
                    jinaSkola: null,
                    fakulty: 23,
                    jinaFakulta: null,
                    typPrace: 33,
                    jinyTypPrace: null,
                    spodniTextVlevo: null,
                    spodniTextVpravo: null,
                    potiskNahore: null,
                    potiskDole: null,
                    pocetPevnychDesek: 0,
                    pocetKrouzkovychDesek: 0,
                    barvaDesek: 40,
                    barvaPisma: 42,
                    pocetKapesProCD: 0,
                    pocetKapesProPosudek: 0,
                    kapsaCdVpredu: null,
                    kapsaPosudekVpredu: null,
                    dobaZhotoveni: 44,
                    poznamky: null,
                    price: 0,
                },

                formItemsData: {
                    typZadani: [
                        {text: 'Vytisknout praci a vyrobit desky', value: 1},
                        {text: 'Vyrobit pouze desky', value: 2},
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
                        {text: 'Jednostranny', value: 11},
                        {text: 'Oboustranny', value: 12},
                        {text: 'Kombinovany', value: 13},
                    ],

                    barevnost: [
                        {text: 'Dle soubou (cernobile / barevne)', value: 14},
                        {text: 'Cernobile', value: 15},
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
                        {text: 'Základ - 239 Kč ( do 4 pracovních dnů )', value: 44},
                        {text: 'Expres - 399 Kč ( do 24 hodin )', value: 45},
                        {text: 'Super expres - 600 Kč ( na počkání )', value: 46},
                    ]
                },
            }
        }
    }
</script>