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
            }
        },

        props: {
            currentUser: null
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
                        link: this.$laroute.route('users.index')
                    }
                ]
            }
        }
    }
</script>