<template>
    <div>
        <v-container grid-list-xs text-xs-center>

            <v-layout row wrap v-if="order != null">

                <v-flex xs12 md12>
                    <v-card >
                        <v-toolbar color="purple darken-3" dark>
                            <v-toolbar-title>Shrnutí objednávky</v-toolbar-title>
                            <v-spacer></v-spacer>
                        </v-toolbar>
                            <v-list v-if="order !== null">
                                <v-list-tile @click="">
                                    <v-list-tile-content>Jméno:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{order.first_name}}</v-list-tile-content>
                                </v-list-tile>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Příjmení:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{order.last_name}}</v-list-tile-content>
                                </v-list-tile>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Ulice:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{order.street}}</v-list-tile-content>
                                </v-list-tile>
                            </v-list>
                    </v-card>
                </v-flex>
                <v-flex xs12 md12>
                    <v-card >
                        <v-toolbar color="purple darken-3" dark>
                            <v-toolbar-title>Cena</v-toolbar-title>
                            <v-spacer></v-spacer>
                        </v-toolbar>
                            <v-list>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Název:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{order.orderName}}</v-list-tile-content>
                                </v-list-tile>
                                <v-list-tile @click="">
                                    <v-list-tile-content>Cena:</v-list-tile-content>
                                    <v-list-tile-content class="align-end">{{order.price}} Kč</v-list-tile-content>
                                </v-list-tile>
                            </v-list>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>
        <v-divider class="mt-5"></v-divider>
        <v-card-actions>
            <v-spacer></v-spacer>
                <form :action="gw_url" method="post" id="gopay-payment-button">
                <button class="btn primary" name="pay" type="submit">
                    <div class="btn__content">
                        Zaplatit
                    </div>
                </button>
                </form>
        </v-card-actions>
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
                orderId: null,
                thesis: null,
                loading: false,
                errors: null,
                embedJs: null,
                gw_url: null,
                order: null,
            }
        },

        mounted() {
            this.eventBus.$on('order-created', (val) => {
                this.orderId = val;
                this.getOrder();
                this.createPayment();
            });

        },

        methods: {
            createPayment() {
                this.loading = true;
                axios.post(this.$laroute.route('gopay.api.create.payment', {orderId: this.orderId})).then((response) => {
                    this.loading = false;
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
                    this.order = response.data;
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