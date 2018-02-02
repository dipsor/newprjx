<template>
    <div>
        <v-breadcrumbs>
            <v-icon slot="divider">chevron_right</v-icon>
            <v-breadcrumbs-item
                    v-for="item in breadcrumbsItems" :key="item.text"
                    :disabled="item.disabled"
                    :href="item.link"
            >
                {{item.text}}
            </v-breadcrumbs-item>
        </v-breadcrumbs>
        <v-divider v-if="divider"></v-divider>
    </div>
</template>
<script>
    export default {
        props: {
            breadcrumbsItems: null,
        },

        data:() => {
            return {
                divider: true
            }
        }
    }
</script>