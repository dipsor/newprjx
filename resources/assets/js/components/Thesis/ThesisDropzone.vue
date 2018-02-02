<template>
    <div>
        <dropzone
                  :options="customOptions"
                  id="dropzone"
                  url="/api/v1/upload"
                  :useFontAwesome="true"
                  :maxFileSizeInMB="50"
                  v-on:vdropzone-success="showSuccess"
                  :headers="csrfHeader">
            <input type="hidden" name="csrf-token" :value="csrfToken">
            ></dropzone>
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
        data() {
            return {
                csrfToken: document.head.querySelector('meta[name="csrf-token"]').content,
                csrfHeader: {
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                },
                loading: false,
                customOptions: {
                    url: 'https://httpbin.org/post',
                    thumbnailWidth: 150,
                    previewTemplate: this.template(),
                    maxFilesize: 0.5,
                    headers: { "My-Awesome-Header": "header value" },
                    dictDefaultMessage: '<i class="material-icons">file_upload</i><p>NAHRAJTE PDF</p>'
                }
            }
        },

        methods: {
            showSuccess() {

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
            }
        }
    }
</script>