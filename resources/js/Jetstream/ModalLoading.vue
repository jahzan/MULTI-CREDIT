<template>
    <portal to="modal">
        <transition leave-active-class="duration-200">
            <div v-show="show" class="fixed inset-0 overflow-y-auto px-4 sm:px-0 z-50">
                <transition enter-active-class="ease-out duration-300"
                        enter-class="opacity-0"
                        enter-to-class="opacity-100"
                        leave-active-class="ease-in duration-200"
                        leave-class="opacity-100"
                        leave-to-class="opacity-0">
                    <div v-show="show" class="fixed inset-0 transform transition-all" @click="close">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                </transition>

                <transition enter-active-class="ease-out duration-300"
                        enter-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to-class="opacity-100 translate-y-0 sm:scale-100"
                        leave-active-class="ease-in duration-200"
                        leave-class="opacity-100 translate-y-0 sm:scale-100"
                        leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <div class="h-screen flex items-center">
                        <div v-show="show" class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full mx-auto" :class="maxWidthClass">
                            <slot></slot>
                        </div> 
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
