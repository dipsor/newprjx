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
                                    <td class="text-xs-left">{{ props.item.first_name }} {{ props.item.last_name }}</td>
                                    <td class="text-xs-left"><a @click="generateCsv(props.item.id)">Generovat Csv</a></td>
                                    <td class="text-xs-left"><a :href="'/objednavky/'+props.item.id">Zobrazit</a></td>
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
                        text: 'Uživatel',
                        align: 'left',
                        sortable: false,
                        value: 'action'
                    },
                    {
                        text: 'Generovat Csv',
                        align: 'left',
                        sortable: false,
                        value: 'action'
                    },
                    {
                        text: 'Zobrazit',
                        align: 'left',
                        sortable: false,
                        value: 'action'
                    },
                ],
                items2: [],
                fileUrl: '',
            }
        },

        props: {
            currentUser: null,
        },

        mounted() {
            this.items = this.getBreadCrumbs();
            this.getUsersOrders();
        },

        watch: {
            fileUrl(val) {
                this.openFile(val);
            }
        },

        methods: {
            getBreadCrumbs() {
                return [
                    {
                        text: 'Admin',
                        disabled: false,
                        link: this.$laroute.route('users.index')
                    },
                    {
                        text: 'Objednávky',
                        disabled: false,
                    }
                ]
            },

            getUsersOrders() {
                axios.get(this.$laroute.route('orders.api.index'))
                    .then((response) => {
                        this.loading = false;
                        this.items2 = response.data;
                    }).catch((error) => {
                    this.loading = false;
                    this.error = error.response.data.errors;
                    console.log(error.response);
                });
            },

            generateCsv(id) {
                axios.post(this.$laroute.route('admin.generate.csv', {id: id}))
                    .then((response) => {
                        this.fileUrl = response.data;
                    }).catch((error) => {
                        this.loading = false;
                        this.error = error.response.data.errors;
                        console.log(error.response);
                });
            },

            openFile(val)
            {
                window.location = this.fileUrl;
                console.log(this.fileUrl);
            }


        }
    }
</script>