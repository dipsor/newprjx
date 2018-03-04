<template>
    <v-card>
        <v-card-text>
            <v-text-field
                    label="Křestní jméno"
                    placeholder="Josef"
                    v-model="user.first_name"
                    required
                    ref="first_name"
                    :rules="[() => !!user.first_name || 'Prosím výplňte křestní jméno']"
                    :error-messages="errorMessages"
            ></v-text-field>
            <v-text-field
                    label="Příjmení"
                    placeholder="Novák"
                    :rules="[
                        () => !!user.last_name || 'Prosím výplňte příjmení'
                    ]"
                    v-model="user.last_name"
                    ref="last_name"
                    required
            ></v-text-field>
            <v-text-field
                    label="Telefon"
                    placeholder="774123456"
                    :rules="[() => !!user.phone_number || 'Prosím výplňte telefonní číslo']"
                    v-model="user.phone_number"
                    ref="phone"
                    required
            ></v-text-field>
            <v-text-field
                    label="Město"
                    placeholder="Praha"
                    :rules="[() => !!user.city || 'Prosím výplňte město']"
                    v-model="user.city"
                    ref="city"
                    required
            ></v-text-field>
            <v-text-field
                    label="Ulice"
                    v-model="user.street"
                    :rules="[() => !!user.street || 'Prosím výplňte ulici']"
                    required
                    ref="state"
                    placeholder="Alej Svobody 100"
            ></v-text-field>
            <v-text-field
                    label="PSČ"
                    required
                    :rules="[() => !!user.postal_code || 'Prosím výplňte psč']"
                    v-model="user.postal_code"
                    ref="zip"
                    placeholder="32300"
            ></v-text-field>
            <v-select
                    autocomplete
                    label="Kód země"
                    placeholder="Vyberte..."
                    :rules="[() => !!user.country_code || 'Prosím výplňte ulici kód země']"
                    :items="countries"
                    v-model="user.country_code"
                    ref="country"
                    required
            ></v-select>
        </v-card-text>
        <v-divider class="mt-5"></v-divider>
        <v-card-actions>
            <v-btn color="primary" @click="updateBillings">Uložit</v-btn>
        </v-card-actions>
    </v-card>
</template>
<script>
    export default {
        data: () => ({
            countries: ['Česká Republika', 'Slovenko'],
            errorMessages: [],
            formHasErrors: false,
            user: {
                'first_name': null,
                'last_name': null,
                'phone_number': null,
                'city': null,
                'street': null,
                'postal_code': null,
                'country_code': null,
            },
            isLoading: false,
        }),
        props: {
            currentUser: null
        },

        computed: {
        },

        watch: {
            name () {
                this.errorMessages = []
            }
        },

        mounted() {
            this.getDetails();
        },

        methods: {
            updateBillings() {
                this.isLoading = true;
                axios.put(this.$laroute.route('users.api.update.billing',{id: this.currentUser.id}), this.user).
                then((response) => {
                    console.log(response);
                    this.eventBus.$emit('billing-updated');
                }).catch((error) => {
                    this.isLoading = false;
                    console.log(error);
                });
            },

            getDetails() {
                axios.get(this.$laroute.route('users.api.show', {id: this.currentUser.id})).then((response) => {
                    this.user.first_name = response.data.first_name;
                    this.user.last_name = response.data.last_name;
                    this.user.phone_number = response.data.phone_number;
                    this.user.city = response.data.city;
                    this.user.street = response.data.street;
                    this.user.postal_code = response.data.postal_code;
                    this.user.country_code = response.data.country_code;
                }).catch((error) => {
                    console.log(error);
                });
            },

            resetForm () {
                this.errorMessages = []
                this.formHasErrors = false

                Object.keys(this.form).forEach(f => {
                    this.$refs[f].reset()
                })
            },
            submit () {
                this.formHasErrors = false

                Object.keys(this.form).forEach(f => {
                    if (!this.form[f]) this.formHasErrors = true

                    this.$refs[f].validate(true)
                })
            }
        },

    }
</script>