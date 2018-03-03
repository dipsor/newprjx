<template>
    <div>
        <v-card color="grey lighten-3">
            <v-card-text>
                <v-layout row>
                    <v-flex xs12>
                        <v-card :class="'pb-1'">
                            <v-toolbar color="purple darken-3" dark>
                                <v-toolbar-title>Nahrani souboru</v-toolbar-title>
                                <v-spacer></v-spacer>
                            </v-toolbar>
                            <dropzone
                                    :options="customOptions"
                                    id="dropzone"
                                    url="/api/v1/thesis/upload"
                                    :useFontAwesome="true"
                                    :maxFileSizeInMB="50"
                                    v-on:vdropzone-success="showSuccess"
                                    v-on:vdropzone-error="handleError"
                                    :headers="csrfHeader">
                                <input type="hidden" name="csrf-token" :value="csrfToken">
                                ></dropzone>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-card-text>
            <v-divider class="mt-5"></v-divider>
            <v-card-actions>
                <v-btn color="primary" @click.native="goToNextPage(1)">Zpět</v-btn>
                <v-spacer></v-spacer>
                <v-btn color="primary" @click.native="goToNextPage(3)">Další</v-btn>
            </v-card-actions>
        </v-card>
    </div>
</template>
<style>
    #dropzone {
        min-height: 200px;
        border: 1px dashed black;
        margin: 20px;
        padding: 20px;
        cursor: pointer;
    }
    .dz-preview {
        max-width: 150px !important;
        max-height: 100px !important;
        display: inline-block;
        margin: 10px;
        background-color: #00b0ff;
        border-radius: 2px;
        border: 1px solid grey;

    }

    .dz-filename {
        max-width: 150px !important;
        word-break: break-all;

    }
    .dz-details {
        height: 100%;
    }
</style>
<script>
    export default {
        props: ['currentUser', 'thesisId'],
        data() {
            return {
                csrfToken: document.head.querySelector('meta[name="csrf-token"]').content,
                csrfHeader: {
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                },
                loading: false,
                customOptions: {
                    url: '/api/v1/thesis/upload',
                    thumbnailWidth: 150,
                    previewTemplate: this.template(),
                    maxFilesize: 0.5,
                    headers: {
                        thesisid: null
                    },
                    dictDefaultMessage: '<i class="material-icons">file_upload</i><p>NAHRAJTE PDF</p>'
                },
                url: '',

            }
        },

        mounted() {
            this.url = this.$laroute.route('thesis.api.upload');
            console.log(this.thesisId);
        },

        watch: {
            thesisId(val) {
                this.customOptions.headers.thesisid = val;
            }
        },

        methods: {
            showSuccess() {
                this.eventBus.$emit('go-to-next-page', {bc_id: this.thesisId, page_id: 3});
                this.eventBus.$emit('load-bc');
            },
            handleError() {

            },
            template: function () {
                return `<div class="dz-preview dz-file-preview">
                <div class="dz-image">
                    <div data-dz-thumbnail-bg></div>
                </div>
                <div class="dz-details">
                    <div class="dz-size"><span data-dz-size></span></div>
                    <div class="dz-filename"><span data-dz-name></span></div>
                </div>
                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                <div class="dz-error-message"><span data-dz-errormessage></span></div>
                <div class="dz-success-mark"><i class="fa fa-check"></i></div>
                <div class="dz-error-mark"><i class="fa fa-close"></i></div>
            </div>
        `;
            },

            goToNextPage(pageId) {
                this.eventBus.$emit('go-to-next-page', {page_id: pageId, bc_id: this.thesisId});
                if (pageId = 3) {
                    this.eventBus.$emit('load-thesis', {thesisI: this.thesisId});
                }
            },
        }
    }
</script>