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
                        <v-card color="grey lighten-3">
                            <v-card-text>
                            <v-layout row wrap>
                                    <v-flex :class="status !== null && status == 'PAID' ? 'xs12' : 'xs8'">
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
                                                <v-list-tile @click="">
                                                    <v-list-tile-content>Cena:</v-list-tile-content>
                                                    <v-list-tile-content class="align-end">{{order.price}} Kč</v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile @click="">
                                                    <v-list-tile-content>Status:</v-list-tile-content>
                                                    <v-list-tile-content class="align-end">{{order.status}}</v-list-tile-content>
                                                </v-list-tile>
                                            </v-list>
                                        </v-card>
                                    </v-flex>
                                    <v-flex xs4 v-if="status !== null && status !== 'PAID'">
                                        <v-card>
                                            <v-toolbar color="purple darken-3" dark>
                                                <v-toolbar-title>Akce</v-toolbar-title>
                                                <v-spacer></v-spacer>
                                            </v-toolbar>
                                            <v-list>
                                                <v-list-tile @click="">
                                                    <v-list-tile-content>Platit:</v-list-tile-content>
                                                    <v-list-tile-content class="align-end"><form :action="gw_url" method="post" id="gopay-payment-button">
                                                        <button class="btn primary" name="pay" type="submit">
                                                            <div class="btn__content">
                                                                Zaplatit
                                                            </div>
                                                        </button>
                                                    </form></v-list-tile-content>
                                                </v-list-tile>
                                            </v-list>
                                        </v-card>
                                    </v-flex>
                            </v-layout>
                            </v-card-text>
                        </v-card>
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
                items: [],
                status: null,
            }
        },

        mounted() {
            this.items = this.getBreadCrumbs();
            this.getOrder();

            if (this.status !== 'PAID') {
                this.createPayment();
            }
        },
        watch: {
            order(val) {
                console.log('watcher');
                console.log(val);
                this.status = val.status;
            }
        },

        methods: {
            createPayment() {
                this.loading = true;
                axios.post(this.$laroute.route('gopay.api.create.payment', {orderId: this.gopayOrderId})).then((response) => {
                    this.loading = false;
                    this.gw_url = response.data.gw_url;
                }).catch((error) => {
                    this.loading = false;
                    this.errors = error.response.data.errors;

                });
            },

            getOrder() {
                axios.get(this.$laroute.route('orders.api.show', {id: this.gopayOrderId})).then((response) => {
                    this.loading = false;
                    this.order = response.data;
                }).catch((error) => {
                    this.loading = false;
                    this.error = error.response.data.errors;
                    console.log(error.response);
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
                        text: 'objednavka',
                        disabled: true,
                        link: this.$laroute.route('thesis.index')
                    }
                ]
            },
        }
    }
</script>