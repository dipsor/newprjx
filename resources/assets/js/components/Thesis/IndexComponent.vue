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
                                        <v-card color="grey lighten-3" class="mb-5">
                                            <thesis-main-form :current-user="currentUser"></thesis-main-form>
                                        </v-card>
                                    </v-stepper-content>
                                    <v-stepper-content step="2">
                                        <v-card color="grey lighten-3" class="mb-5">
                                            <thesis-dropzone :current-user="currentUser" :thesis-id="bcId"></thesis-dropzone>
                                        </v-card>
                                    </v-stepper-content>
                                    <v-stepper-content step="3">
                                        <v-card color="grey lighten-3" class="mb-5">
                                            <thesis-review :current-user="currentUser" :thesis-id="bcId"></thesis-review>
                                        </v-card>
                                    </v-stepper-content>
                                    <v-stepper-content step="4">
                                        <v-card color="grey lighten-3" class="mb-5"></v-card>
                                        <v-btn color="primary" @click.native="e1 = 1">Continue</v-btn>
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
        props:['currentUser'],
        data () {
            return {
                e1: 1,
                items: [],
                accessUpload: false,
                bcId: null,
                bcCreated: false,
            }
        },

        mounted() {
            this.items = this.getBreadCrumbs();

            this.eventBus.$on('form-is-valid', () => {
               this.accessUpload = true;
            });

            this.eventBus.$on('go-to-next-page', (payload) => {
                this.bcId = payload.bc_id;
                this.e1 = payload.page_id;
                this.bcCreated = true;

            });
        },

        methods: {
            getBreadCrumbs(){
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
            },
        }
    }
</script>