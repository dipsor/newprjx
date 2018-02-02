<template>
    <div>
        <v-tabs v-model="active"
                fixed
                >
            <v-tabs-bar>
                <v-tabs-item
                        v-for="tab in tabs"
                        :key="tab"
                        :href="'#' + tab"
                        ripple
                >
                    {{ tab }}
                </v-tabs-item>
                <v-tabs-slider color="yellow"></v-tabs-slider>
            </v-tabs-bar>
            <v-tabs-items>
                <v-tabs-content
                        v-for="tab in tabs"
                        :key="tab"
                        :id="tab"
                >
                    <v-card flat>
                        <v-container grid-list-sm class="pa-4">
                            <v-layout row wrap>
                                <v-flex xs12>
                                    <v-text-field
                                            prepend-icon="business"
                                            placeholder="Company"
                                            v-model="business"
                                    ></v-text-field>
                                    <v-select
                                            label="Item"
                                            item-text="name"
                                            item-value="price"
                                            v-model="selectItems"
                                            :items="items"
                                            :rules="[v => !!v || 'Item is required']"
                                            required
                                    ></v-select>
                                    <v-card-actions>
                                        <v-btn flat color="primary">More</v-btn>
                                        <v-spacer></v-spacer>
                                        <v-btn flat color="primary" @click="myDialog = false">Cancel</v-btn>
                                        <v-btn flat @click="">Save</v-btn>
                                    </v-card-actions>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-card>
                </v-tabs-content>
            </v-tabs-items>
        </v-tabs>
    </div>
</template>
<script>
    export default {
        data () {
            return {
                tabs: ['General Details', 'Billing Details', 'Change Password'],
                active: null,
                text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                items: [
                    { name: 'Sandra Adams', group: 'Group 1', price: 13 },
                    { name: 'Miroslav', group: 'Group 1', price: 25 }
                ],

                selectItems: null,
                business: null,
            }
        },

    }
</script>