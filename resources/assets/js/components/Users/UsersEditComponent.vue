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
                        <v-toolbar color="blue lighten-2">
                            <v-toolbar-title class="white--text">Edit Users</v-toolbar-title>
                        </v-toolbar>

                        <v-flex xs12>
                            <v-tabs v-model="active"
                                    fixed
                            >
                                <v-tabs-bar>
                                    <v-tabs-item
                                            v-for="tab in tabs"
                                            :key="tab.id"
                                            :href="'#' + tab.id"
                                            ripple
                                    >
                                        {{ tab.text }}
                                    </v-tabs-item>
                                    <v-tabs-slider color="primary"></v-tabs-slider>
                                </v-tabs-bar>
                                <v-tabs-items>
                                    <v-tabs-content
                                            v-for="tab in tabs"
                                            :key="tab.id"
                                            :id="tab.id"
                                    >
                                        <v-card flat>
                                            <v-container grid-list-sm class="pa-4">
                                                <v-layout row wrap>
                                                    <v-flex xs12>
                                                        <div v-if="tab.id=='tab1'">
                                                            <users-edit-generals :current-user="currentUser"></users-edit-generals>
                                                        </div>
                                                        <div v-if="tab.id=='tab2'">
                                                            <users-edit-billings :current-user="currentUser"></users-edit-billings>
                                                        </div>
                                                        <div v-if="tab.id=='tab3'">
                                                            <users-change-pass :current-user="currentUser"></users-change-pass>
                                                        </div>
                                                    </v-flex>
                                                </v-layout>
                                            </v-container>
                                        </v-card>
                                    </v-tabs-content>
                                </v-tabs-items>
                            </v-tabs>
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
                items: [],
                divider: true,
                tabs: [
                    {text: 'Základní údaje', id: 'tab1'},
                    {text: 'Fakturační údaje', id: 'tab2'},
                    {text: 'Změna hesla', id: 'tab3'}],
                active: null,
                tabsItems: [
                    { name: 'Sandra Adams', group: 'Group 1', price: 13 },
                    { name: 'Miroslav', group: 'Group 1', price: 25 }
                ],

                selectItems: null,
                business: null,
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
                    },
                    {
                        text: 'upravit',
                        disabled: true
                    }
                ]
            }
        }
    }
</script>