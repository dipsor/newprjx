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
                        <a href="#!" class="body-2 black--text">EDIT</a> edit
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
            <v-divider v-if="isAdmin"></v-divider>
            <template v-if="isAdmin" v-for="(item, i) in adminItems">
                <v-layout
                        row
                        v-if="item.heading"
                        align-center
                        :key="i"
                >
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
                <a :href="$laroute.route('home')" class="hidden-xs-only nav-link">Hlavní strana</a>
            </v-toolbar-title>

            <div class="d-flex align-center" style="margin-left: auto">
                <v-btn light @click="logout">
                    <v-icon>person_outline</v-icon>
                    Odhlásit
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
            items: [],
            adminItems: [],
            isAdmin: false,
        }),
        props: {
            source: String,
            currentUser: null,
        },

        mounted() {
            this.isItAdmin();
            this.items = this.setMenu();
            this.adminItems = this.setAdminMenu();

            console.log(this.currentUser.roles);

        },

        methods: {
            setMenu() {
                return [
                    {
                        icon: 'keyboard_arrow_up',
                        'icon-alt': 'keyboard_arrow_down',
                        text: 'Uživatel',
                        model: false,
                        children: [
                            { text: 'Objednávky', link:  this.$laroute.route('users.index')},
                            { text: 'Změna údajů', link:  this.$laroute.route('users.show', {id: this.currentUser.id})},
                        ]
                    },
                    { icon: 'shopping_cart', text: 'Vytvořit objednávku','link':  this.$laroute.route('thesis.index')},
                ];
            },

            setAdminMenu() {
                return [
                    { icon: 'dashboard', text: 'Admin', link: this.$laroute.route('admin.orders.index'), forAdmin: true},
                ]
            },

            logout() {
                axios.get(this.$laroute.route('users.logout'))
                    .then((response) =>{
                        window.location.href = this.$laroute.route('home');
                    }, (error) => {
                        console.log(error);
                    });
            },

            isItAdmin() {
                this.isAdmin = false;
                this.currentUser.roles.forEach( (role) => {
                    console.log(role.name);
                    if (role.name === 'admin') {
                        this.isAdmin = true;
                    }
                });
            }
        }

    }
</script>