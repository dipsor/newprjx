<template>
    <v-app>
        <v-btn
                fab
                bottom
                left
                color="red accent-3"
                dark
                fixed
                @click.stop="myDialog = !myDialog"
        >
            <v-icon>add</v-icon>
        </v-btn>
        <v-dialog v-model="myDialog" width="800px">
            <v-card>
                <v-card-title
                        class="grey lighten-4 py-4 title"
                >
                    Create Something
                </v-card-title>
                <v-container grid-list-sm class="pa-4">
                    <v-layout row wrap>
                        <v-flex xs12>
                            <v-text-field
                                    prepend-icon="business"
                                    placeholder="Company"
                            ></v-text-field>
                            <v-select
                                    label="Item"
                                    item-text="name"
                                    item-value="price"
                                    v-model="select"
                                    :items="items"
                                    :rules="[v => !!v || 'Item is required']"
                                    required
                            ></v-select>
                            <v-card-actions>
                                <v-btn flat color="primary">More</v-btn>
                                <v-spacer></v-spacer>
                                <v-btn flat color="primary" @click="myDialog = false">Cancel</v-btn>
                                <v-btn flat @click="handleFormData">Save</v-btn>
                            </v-card-actions>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-card>
        </v-dialog>
    </v-app>
</template>
<script>
    export default {
        data: () => ({
            myDialog: false,
            select: null,
            items: [
                { name: 'Sandra Adams', group: 'Group 1', price: 13 },
                { name: 'Miroslav', group: 'Group 1', price: 25 }
            ],
        }),

        methods: {
            handleFormData() {

            }
        }

    }
</script>