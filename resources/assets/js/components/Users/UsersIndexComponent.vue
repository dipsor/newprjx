<template>
    <div>
        <v-content>
            <v-container grid-list-xs text-xs-center>
                        <v-layout row wrap>
                            <v-flex xs12>
                                <breadcrumbs
                                        :breadcrumbs-items="items"
                                ></breadcrumbs>
                            </v-flex>
                            <v-flex xs12>

                                    <v-alert type="success" :value="status == 'PAID'">
                                        {{messages[status]}}
                                    </v-alert>

                                    <v-alert type="info" :value="status == 'PAYMENT_METHOD_CHOSEN' || status == 'REFUNDED' || status == 'PARTIALLY_REFUNDED'">
                                        {{messages[status]}}
                                    </v-alert>

                                    <v-alert type="error" :value="status == 'CANCELED' || status == 'TIMEOUTED'">
                                        {{messages[status]}}
                                    </v-alert>
                                    <v-card>
                                        <v-toolbar color="purple darken-3">
                                            <v-toolbar-title class="white--text">Objednávky uživatele {{currentUser.name}}</v-toolbar-title>
                                        </v-toolbar>
                                        <v-data-table
                                                v-bind:headers="headers"
                                                :items="items2"
                                                hide-actions
                                                class="elevation-1"
                                        >
                                            <template slot="items" slot-scope="props">
                                                <td class="text-xs-left">{{ props.item.orderName }}</td>
                                                <td class="text-xs-left">{{ props.item.created_at }}</td>
                                                <td class="text-xs-left">{{ props.item.price }}</td>
                                                <td class="text-xs-left">{{ props.item.status }}</td>
                                                <td class="text-xs-left"><a :href="$laroute.route('users.order.show', {'orderId': props.item.id})">Zobrazit</a></td>
                                            </template>
                                        </v-data-table>
                                    </v-card>
                            </v-flex>
                        </v-layout>
            </v-container>
        </v-content>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                items: [
                    {
                        text: 'Dashboard',
                        disabled: false
                    }

                ],
                divider: true,
                status: '',
                messages: {
                    'PAID' : 'Objednávka byla zaplacena.',
                    'PAYMENT_METHOD_CHOSEN' : 'Metoda byla vybrána.',
                    'REFUNDED' : 'Platba byla vrácena.',
                    'PARTIALLY_REFUNDED' : 'Platba byla částečnê zrušena.',
                    'CANCELED' : 'Platba byla zrušena.',
                    'TIMEOUTED' : 'Platební proces vypršel.',
                },
                headers: [
                    {
                        text: 'Objednávka',
                        align: 'left',
                        sortable: false,
                        value: 'orderName'
                    },
                    {
                        text: 'Zadáno',
                        align: 'left',
                        sortable: true,
                        value: 'created_at'
                    },
                    {
                        text: 'Cena',
                        align: 'left',
                        sortable: true,
                        value: 'price'
                    },
                    {
                        text: 'Zaplaceno',
                        align: 'left',
                        sortable: true,
                        value: 'status'
                    },
                    {
                        text: 'Zobrazit',
                        align: 'left',
                        sortable: false,
                        value: 'action'
                    },
                ],
                items2: []
            }
        },

        props: {
            currentUser: null,
            gopayOrderId: 0,
        },

        mounted() {
            this.items = this.getBreadCrumbs();
            this.getStatus(this.gopayOrderId);
            this.getUsersOrders();
        },

        watch: {
            gopayOrderId: (val) => {
                this.getStatus(val);
            },

            status() {
                this.getUsersOrders();
            }
        },

        methods: {
            getBreadCrumbs() {
                return [
                    {
                        text: this.currentUser.name,
                        disabled: false,
                        link: this.$laroute.route('users.index')
                    },
                    {
                        text: 'Objednávky',
                        disabled: false,
                    }
                ]
            },

            getStatus(id) {
                if (id > 0) {
                    axios.get(this.$laroute.route('gopay.api.status', {'id': id})).then((response) => {
                        this.loading = false;
                        this.status = response.data;
                        console.log(response.data);
                    }).catch((error) => {
                        this.loading = false;
                        this.error = error.response.data.errors;
                        console.log(error.response);
                    });
                }
            },

            getUsersOrders() {
                axios.get(this.$laroute.route('users.api.orders', {'id': this.currentUser.id}))
                .then((response) => {
                    this.loading = false;
                    this.items2 = response.data;
                }).catch((error) => {
                    this.loading = false;
                    this.error = error.response.data.errors;
                    console.log(error.response);
                });
            }


        }
    }
</script>