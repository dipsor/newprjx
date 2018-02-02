<template>
    <div>
        <v-navigation-drawer
            fixed
            clipped
            app
            dark
            v-model="drawer"
    >
        <v-list dense>
            <template v-for="(item, i) in items">
                <v-layout
                        row
                        v-if="item.heading"
                        align-center
                        :key="i"
                >
                    <v-flex xs6>
                        <v-subheader v-if="item.heading">
                            {{ item.heading }}
                        </v-subheader>
                    </v-flex>
                    <v-flex xs6 class="text-xs-center">
                        <a href="#!" class="body-2 black--text">EDIT</a>
                    </v-flex>
                </v-layout>
                <v-list-group v-else-if="item.children" v-model="item.model" no-action>
                    <v-list-tile slot="item" @click="">
                        <v-list-tile-action>
                            <v-icon>{{ item.model ? item.icon : item['icon-alt'] }}</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                {{ item.text }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile
                            v-for="(child, i) in item.children"
                            :key="i"
                            @click=""
                    >
                        <v-list-tile-action v-if="child.icon">
                            <v-icon>{{ child.icon }}</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                <a :href="child.link" class="menu-item">{{ child.text }}</a>
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list-group>
                <v-list-tile v-else @click="" :href="item.link">
                    <v-list-tile-action>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>
                                <a :href="item.link" class="menu-item">{{ item.text }}</a>

                        </v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </template>
        </v-list>
    </v-navigation-drawer>
    <v-toolbar
                color="primary"
                dark
                app
                clipped-left
                fixed
        >
            <v-toolbar-title :style="$vuetify.breakpoint.smAndUp ? 'width: 300px; min-width: 250px' : 'min-width: 72px'" class="ml-0 pl-3">
                <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
                <a :href="$laroute.route('home')" class="hidden-xs-only nav-link">Landing Page</a>
            </v-toolbar-title>
            <v-text-field
                    light
                    solo
                    prepend-icon="search"
                    placeholder="Search"
                    style="max-width: 500px; min-width: 128px"
            ></v-text-field>
            <div class="d-flex align-center" style="margin-left: auto">
                <v-btn icon>
                    <v-icon>apps</v-icon>
                </v-btn>
                <v-btn icon>
                    <v-icon>notifications</v-icon>
                </v-btn>
                <v-btn icon large>
                    <v-avatar size="32px" tile>
                        <img
                                src="https://vuetifyjs.com/static/doc-images/logo.svg"
                                alt="Vuetify"
                        >
                    </v-avatar>
                </v-btn>
            </div>
        </v-toolbar>
    </div>
</template>
<style>
    a, a.nav-link {
        text-decoration: none;
    }
    a.nav-link {
        color: white;
    }
    a.menu-item {
        display: block;
        width: 100%;
        height: 100%;
    }
</style>
<script>
    export default {
        data: () => ({
            drawer: null,
            dashboardUrl: 'ddd',
            items: []
        }),

        props: {
            source: String,
            currentUser: null,
        },

        mounted() {
            this.items = this.setMenu();
        },

        methods: {
            setMenu() {
                return [
                    { icon: 'dashboard', text: 'Dashboard', link: this.$laroute.route('dashboard.index'), forAdmin: false},
                    {
                        icon: 'keyboard_arrow_up',
                        'icon-alt': 'keyboard_arrow_down',
                        text: 'User',
                        model: false,
                        children: [
                            { text: 'Profil', link:  this.$laroute.route('users.index')},
                            { text: 'Edit Details', link:  this.$laroute.route('users.show', {id: this.currentUser.id})},
                        ]
                    },
                    { icon: 'shopping_cart', text: 'Vytvorit objednavku','link':  this.$laroute.route('thesis.index')},
                ];
            }
        }

    }
</script>