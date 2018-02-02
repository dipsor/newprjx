<template>
    <div>
        <v-container fluid>
            <v-layout row wrap>
                <v-flex xs4>
                    <v-subheader class="grey--text text--lighten-1" v-text="'Typ'"></v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-select
                            v-bind:items="items"
                            v-model="e1"
                            label="Select"
                            dark
                            item-value="text"
                    ></v-select>
                </v-flex>
                <v-flex xs4>
                </v-flex>
                <v-flex xs8>
                    <v-select
                            v-bind:items="items"
                            v-model="e2"
                            label="Pocet Listu"
                            dark
                            item-value="text"
                    ></v-select>
                </v-flex>
                <v-flex xs4>
                </v-flex>
                <v-flex xs4>
                    <v-select
                            v-bind:items="items"
                            v-model="e3"
                            label="Typ tisku"
                            dark
                            item-value="text"
                    ></v-select>
                </v-flex>
                <v-flex xs4>
                    <v-select
                            v-bind:items="items"
                            v-model="e4"
                            label="Barevnost"
                            dark
                            item-value="text"
                    ></v-select>
                </v-flex>
                <v-flex xs4>
                    <v-subheader class="grey--text text--lighten-1" v-text="'Skola'"></v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-select
                            v-bind:items="items"
                            v-model="e1"
                            label="Vyberte"
                            dark
                            item-value="text"
                    ></v-select>
                </v-flex>
                <v-flex xs4>
                </v-flex>
                <v-flex xs8>
                    <v-text-field
                            name="input-1"
                            label="Zde uvedte jmeno jine skoly"
                            id="testing"
                    ></v-text-field>
                </v-flex>
                <v-flex xs4>
                    <v-subheader class="grey--text text--lighten-1" v-text="'Fakulta'"></v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-select
                            v-bind:items="items"
                            v-model="e1"
                            label="Select"
                            dark
                            item-value="text"
                    ></v-select>
                </v-flex>
                <v-flex xs4>
                </v-flex>
                <v-flex xs8>
                    <v-select
                            v-bind:items="items"
                            v-model="e2"
                            label="Pocet Listu"
                            dark
                            item-value="text"
                    ></v-select>
                </v-flex>
                <v-flex xs4>
                    <v-subheader>Katedra</v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-text-field
                            name="input-1"
                            label="Label Text"
                            id="testing"
                    ></v-text-field>
                </v-flex>
                <v-flex xs4>
                    <v-subheader>Nazev Prace</v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-text-field
                            name="input-1"
                            label="Label Text"
                            id="testing"
                    ></v-text-field>
                </v-flex>












            </v-layout>
        </v-container>    </div>
</template>
<script>
    export default {
        data () {
            return {
                e1: null,
                e2: null,
                e3: null,
                e4: null,
                items: [
                    { text: 'State 1' },
                    { text: 'State 2' },
                    { text: 'State 3' },
                    { text: 'State 4' },
                    { text: 'State 5' },
                    { text: 'State 6' },
                    { text: 'State 7' }
                ]
            }
        }
    }
</script>