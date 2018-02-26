<template>
    <div>
        <v-container fluid>
            <v-layout row>
                <v-flex xs12 sm6>
                    <v-card>
                        <v-toolbar color="indigo" dark>
                            <v-toolbar-title>Shrnutí</v-toolbar-title>
                            <v-spacer></v-spacer>
                        </v-toolbar>
                        <v-list>
                            <v-list-tile @click="">
                                <v-list-tile-content>Typ zadání:</v-list-tile-content>
                                <v-list-tile-content class="align-end"></v-list-tile-content>
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
                                <v-list-tile-content class="align-end">Kč</v-list-tile-content>
                            </v-list-tile>
                        </v-list>
                    </v-card>
                </v-flex>
            </v-layout>

        </v-container>
        <v-alert v-if="errors !== null" type="error" :value="true">
            <div v-for="error in errors">{{error}}</div>
        </v-alert>
        <v-btn color="primary" @click.native="goToNextPage(2)">
            Zpět
        </v-btn>
        <v-btn color="primary" @click.native="goToNextPage(4)">
            Vytvořit objednávku &nbsp<v-progress-circular v-show="loading" indeterminate color="white"></v-progress-circular>
        </v-btn>

        <v-btn color="primary" @click="createOrder()">
            Vytvořit objednávku &nbsp<v-progress-circular v-show="loading" indeterminate color="white"></v-progress-circular>
        </v-btn>
        <v-container fluid>
            <v-layout row>
                <v-flex xs12>
                    <v-card>
                        <form :action="gw_url" method="post" id="gopay-payment-button">
                            <button name="pay" type="submit">Zaplatit</button>
                        </form>
                    </v-card>
                </v-flex>
            </v-layout>

        </v-container>
    </div>
</template>
<script>
    export default {
        props:['currentUser', 'thesisId'],
        data () {
            return {
                items: [],
                accessUpload: false,
                bcId: null,
                orderId: 1,
                thesis: null,
                loading: false,
                errors: null,
                embedJs: null,
                gw_url: null,
            }
        },

        mounted() {
            this.createPayment();
            this.getOrder();
            this.eventBus.$on('order-created', (val) => {
                this.createPayment();
            });

        },

        methods: {
            createPayment() {
                this.loading = true;
                axios.post(this.$laroute.route('gopay.api.create.payment', {orderId: this.orderId})).then((response) => {
                    this.loading = false;
                    console.log(response.data);
                    this.gw_url = response.data.gw_url;
//                    this.eventBus.$emit('go-to-next-page', {page_id: this.nextStep, bc_id: response.data.id})
                }).catch((error) => {
                    this.loading = false;
                    this.errors = error.response.data.errors;

                });
            },

            getOrder() {
                axios.get(this.$laroute.route('orders.api.show', {id: this.orderId})).then((response) => {
                    this.loading = false;
                    console.log(response.data);
                }).catch((error) => {
                    this.loading = false;
                    this.error = error.response.data.errors;
                    console.log(error.response);
                });
            },

            goToNextPage(pageId) {
                this.eventBus.$emit('go-to-next-page', {page_id: pageId, bc_id: this.thesisId});
            },
        }
    }
</script>