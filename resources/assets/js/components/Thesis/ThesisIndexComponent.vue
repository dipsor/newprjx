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
                            <v-stepper v-model="e1">
                                <v-stepper-header>
                                    <v-stepper-step step="1" :complete="e1 > 1">Vyplnte formular</v-stepper-step>
                                    <v-divider></v-divider>
                                    <v-stepper-step step="2" :complete="e1 > 2">Nahrat soubor</v-stepper-step>
                                    <v-divider></v-divider>
                                    <v-stepper-step step="3" :complete="e1 > 2">Potvrzeni Objednavky</v-stepper-step>
                                    <v-divider></v-divider>
                                    <v-stepper-step step="4">Platba</v-stepper-step>
                                </v-stepper-header>
                                <v-stepper-items>
                                    <v-stepper-content step="1">
                                        <v-card color="grey darken-3" class="mb-5">
                                            <thesis-main-form></thesis-main-form>
                                        </v-card>
                                        <v-btn color="primary" @click.native="e1 = 2">Continue</v-btn>
                                        <v-btn flat>Cancel</v-btn>
                                    </v-stepper-content>
                                    <v-stepper-content step="2">
                                        <v-card color="grey lighten-2" class="mb-5">
                                            <thesis-dropzone></thesis-dropzone>
                                        </v-card>
                                        <v-btn color="primary" @click.native="e1 = 3">Continue</v-btn>
                                        <v-btn flat>Cancel</v-btn>
                                    </v-stepper-content>
                                    <v-stepper-content step="3">
                                        <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
                                        <v-btn color="primary" @click.native="e1 = 4">Continue</v-btn>
                                        <v-btn flat>Cancel</v-btn>
                                    </v-stepper-content>
                                    <v-stepper-content step="4">
                                        <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
                                        <v-btn color="primary" @click.native="e1 = 1">Continue</v-btn>
                                        <v-btn flat>Cancel</v-btn>
                                    </v-stepper-content>
                                </v-stepper-items>
                            </v-stepper>
                        </v-flex>

                </v-layout>
            </v-container>
        </v-content>
    </div>
</template>
<script>
    export default {
        data () {
            return {
                e1: 0,
                items: [
                    {
                        text: 'Dashboard',
                        disabled: false,
                        link: this.$laroute.route('dashboard.index')

                    },
                    {
                        text: 'Tvorba Bakalarky',
                        disabled: false
                    }

                ]
            }
        },

        mounted() {
            this.items = this.getBreadCrumbs();
        },

        methods: {
            getBreadCrumbs() {
                return [
                    {
                        text: 'Dashboard',
                        disabled: false,
                        link: this.$laroute.route('dashboard.index')
                    },
                    {
                        text: this.currentUser.name,
                        disabled: false,
                        link: this.$laroute.route('thesis.index')
                    }
                ]
            }
        }
    }
</script>