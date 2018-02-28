<template>
    <v-content>
        <v-container grid-list-md text-xs-center>
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
                        <v-toolbar color="primary">
                            <v-toolbar-title class="white--text">Uzivatele</v-toolbar-title>
                        </v-toolbar>

                        <v-flex xs12>
                            Dashboard pro uzivatele
                        </v-flex>
                    </v-card>

                </v-flex>
            </v-layout>
        </v-container>
    </v-content>
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
                }
            }
        },

        props: {
            currentUser: null,
            gopayOrderId: 0,
        },

        mounted() {
            this.items = this.getBreadCrumbs();
            this.getStatus(this.gopayOrderId);
        },

        watch: {
            gopayOrderId: (val) => {
                console.log('gopayOrderId changed');
                console.log(val);
                this.getStatus(val);
            },
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
                        link: this.$laroute.route('users.index')
                    }
                ]
            },

            getStatus(id) {
                if (id > 0) {
                    axios.get(this.$laroute.route('gopay.api.status', {'id': id})).then((response) => {
                        this.loading = false;
                        this.status = response.data.state;
                        console.log(this.status);
                    }).catch((error) => {
                        this.loading = false;
                        this.error = error.response.data.errors;
                        console.log(error.response);
                    });
                }
            },


        }
    }
</script>