<template>
    
        <inertia-link :href="href" :class="classes">
                <slot></slot>
        </inertia-link>
</template>

<script>
    export default {
        props: ['href', 'active'],

        computed: {
            classes() {
                return this.active
                            ? 'text-2xl block py-1 md:py-3 pl-1 align-middle text-blue-600 no-underline text-blue-600'
                            : 'text-2xl block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-blue-500'
            }
        }
    }
</script>
