<template>
    <modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div>
            <div class="text-lg">
                <slot name="title">
                </slot>
            </div>

            <div>
                <slot name="content">
                </slot>
            </div>
        </div>

        <div class="px-1 py-2 text-right bg-gray-100 md:px-6 md:py-4">
            <slot name="footer">
            </slot>
        </div>
    </modal>
</template>

<script>
    import Modal from './Modal'

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
