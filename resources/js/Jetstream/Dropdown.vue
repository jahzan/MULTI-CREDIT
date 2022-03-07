<template>
    <div class="relative">
        <div class="my-4 md:my-0" @click="open = ! open">
            <slot name="trigger"></slot>
        </div>

        <!-- Full Screen Dropdown Overlay -->
        <div v-show="open" class="fixed inset-0 z-40" @click="open = false">
        </div>

        <!-- Full Screen responsive mode -->
        <div v-show="open" class="fixed inset-0 z-40 w-screen mt-16 bg-white border-t md:hidden">
                <slot name="content"></slot>
        </div>

        <transition
            enter-active-class="transition duration-200 ease-out"
            enter-class="transform scale-95 opacity-0"
            enter-to-class="transform scale-100 opacity-100"
            leave-active-class="transition duration-75 ease-in"
            leave-class="transform scale-100 opacity-100"
            leave-to-class="transform scale-95 opacity-0">
            <div v-show="open"
                    class="absolute z-50 hidden mt-2 rounded-md shadow-lg md:block"
                    :class="[widthClass, alignmentClasses]"
                    style="display: none;"
                    @click="open = false"
            >
                <div
                    class="absolute right-0 z-20 overflow-hidden bg-white rounded-md shadow-2xl ring-2 ring-black ring-opacity-5"
                    style="width: 20rem"
                >
                    <slot name="content"></slot>
                </div>

            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        props: {
            align: {
                default: 'right'
            },
            width: {
                default: '48'
            },
            contentClasses: {
                default: () => ['py-1', 'bg-white']
            }
        },

        data() {
            return {
                open: false
            }
        },

        created() {
            const closeOnEscape = (e) => {
                if (this.open && e.keyCode === 27) {
                    this.open = false
                }
            }

            this.$once('hook:destroyed', () => {
                document.removeEventListener('keydown', closeOnEscape)
            })

            document.addEventListener('keydown', closeOnEscape)
        },

        computed: {
            widthClass() {
                return {
                    '48': 'w-48',
                    '52': 'w-52',
                    '56': 'w-56',
                    '60': 'w-60',
                    '64': 'w-64',
                    '72': 'w-72',
                    '80': 'w-80',
                    '96': 'w-96',
                }[this.width.toString()]
            },

            alignmentClasses() {
                if (this.align === 'left') {
                    return 'origin-top-left left-0'
                } else if (this.align === 'right') {
                    return 'origin-top-right right-0'
                } else {
                    return 'origin-top'
                }
            },
        }
    }
</script>
