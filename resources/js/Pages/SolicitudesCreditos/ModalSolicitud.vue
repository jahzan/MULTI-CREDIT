<template>
    <modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="px-6 py-4">
            <div class="text-lg">
            </div>

            <div class="mt-4">
                <vue-pdf-app
                style="height: 70vh"
                class=""
                pdf="https://file-examples-com.github.io/uploads/2017/10/file-example_PDF_1MB.pdf"
                >
                </vue-pdf-app>
            </div>
        </div>

        <div class="px-6 py-4 bg-gray-100 text-right">
            <slot name="footer">
            </slot>
        </div>
    </modal>
</template>

<script>
    import Modal from '@/Jetstream/ModalCenter'

    export default {
        components: {
            Modal,
        },

        props: {
            show: {
                default: true
            },
            maxWidth: {
                default: '2xl'
            },
            closeable: {
                default: true
            },
        },

        methods: {
            close() {
                this.$emit('close')
            },
        }
    }
</script>
