<template>
    <portal to="modal">
        <transition leave-active-class="duration-200">
            <div v-show="show" class="fixed inset-0 z-50 px-4 py-6 overflow-y-auto sm:px-0">
                <transition enter-active-class="duration-300 ease-out"
                        enter-class="opacity-0"
                        enter-to-class="opacity-100"
                        leave-active-class="duration-200 ease-in"
                        leave-class="opacity-100"
                        leave-to-class="opacity-0">
                    <div v-show="show" class="fixed inset-0 transition-all transform" @click="close">
                        <div class="absolute inset-0 bg-black opacity-75"></div>
                    </div>
                </transition>

                <transition enter-active-class="duration-300 ease-out"
                        enter-class="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
                        enter-to-class="translate-y-0 opacity-100 sm:scale-100"
                        leave-active-class="duration-200 ease-in"
                        leave-class="translate-y-0 opacity-100 sm:scale-100"
                        leave-to-class="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95">
                    <div v-show="show" class="overflow-hidden transition-all transform bg-white rounded-lg shadow-xl sm:w-full sm:mx-auto" :class="maxWidthClass">
                        <slot></slot>
                    </div>
                </transition>
            </div>
        </transition>
    </portal>
</template>

<script>
    export default {
        props: {
            show: {
                default: false
            },
            maxWidth: '',
            closeable: {
                default: true
            },
        },

        methods: {
            close() {
                if (this.closeable) {
                    this.$emit('close')
                }
            }
        },

        watch: {
            show: {
                immediate: true,
                handler: (show) => {
                    if (show) {
                        document.body.style.overflow = 'hidden'
                    } else {
                        document.body.style.overflow = null
                    }
                }
            }
        },

        created() {
            const closeOnEscape = (e) => {
                if (e.key === 'Escape' && this.show) {
                    this.close()
                }
            }

            document.addEventListener('keydown', closeOnEscape)

            this.$once('hook:destroyed', () => {
                document.removeEventListener('keydown', closeOnEscape)
            })
        },

        computed: {
            maxWidthClass() {
                return  'sm:max-w-'+this.maxWidth;
            }
        }
    }
</script>
